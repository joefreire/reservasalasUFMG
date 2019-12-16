<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Sala;
use App\Models\Disciplina;
use App\Models\Reserva;
use Yajra\Datatables\Datatables;
use Session;

class ReservaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('reservas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(empty($request->_id)){
            $validatedData = $request->validate([
                'tipo' => 'required',
                'usuario_responsavel' => 'required',
                'data_reserva' => 'required',
            ]);
            $reserva = Reserva::create([
                'tipo' => $request->tipo,
                'data_reserva' => $request->data_reserva,
                'data_final' => $request->data_reserva,
                'usuario_responsavel' => $request->usuario_responsavel,
                'usuario_criador' => Auth::id(),
            ]);
            return redirect()->route('reservas.index')->with('success','Criado com sucesso');
        }else{
            $reserva = Reserva::findOrFail($request->_id);
            $validatedData = $request->validate([
                'tipo' => 'required',
                'usuario_responsavel' => 'required',
            ]);
            $reserva->responsavel = Auth::id();
            $reserva->usuario_editor = Auth::id();
            $reserva->save(); 

            return redirect()->route('reservas.index')->with('success','Atualizado com sucesso');
        }


        

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reserva = Reserva::find($id);
        if(!empty($reserva)){

            foreach ($reserva->toArray() as $key => $value) {
                if($key == 'departamentos' && gettype($value) == 'array'){
                    $ids = array_column($value, '_id');
                    Session::flash('_old_input.'.$key, $ids);
                }else{
                    Session::flash('_old_input.'.$key, $value);
                }                
            }  
            return view('reservas.create'); 
        }else{
            return redirect()->route('reservas.index')->with('error','Erro ao editar');
        }
        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id);
        if(!empty($reserva)){
            $reserva->delete();
        }else{
            return redirect()->route('reservas.index')->with('error','Erro ao deletar');
        }
        return redirect()->route('reservas.index')->with('success','Deletado com sucesso');
    }    
    /**
     * Pega valores por ajax
     *
     * @param  Request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $query  = Reserva::query()->get();
        return Datatables::of($query)      
        ->addColumn('departamentos', function ($dados) {
            if(!empty($dados->departamentos)){
                return implode(', ',array_column($dados->departamentos, 'codigo'));
            }

        })->make(true);
    }

}
