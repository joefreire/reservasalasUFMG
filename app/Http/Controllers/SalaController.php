<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Sala;
use Yajra\Datatables\Datatables;
use Session;

class SalaController extends Controller
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
        return view('salas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salas.create');
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
                'nome' => 'required|unique:App\Models\Sala,nome, departamento',
                'departamentos' => 'required|exists:App\Models\Departamento,_id',
                'capacidade' => 'required|integer',
                'tipo_quadro' => 'required',
                'tipo_assento' => 'required',
            ]);
            $sala = Sala::create([
                'nome' => $request->nome,
                'capacidade' => (int)$request->capacidade,
                'tipo_quadro' => $request->tipo_quadro,
                'tipo_assento' => $request->tipo_assento,
                'localizacao' => ['type' => 'Point', 'coordinates' => [(float)$request->longitude, (float)$request->latitude], 'descricao_local' => $request->descricao_local],
                'departamentos' => Departamento::whereIn('_id',$request->departamentos)->get()->toArray(),
            ]);
            return redirect()->route('salas.index')->with('success','Criado com sucesso');
        }else{
            $sala = Sala::findOrFail($request->_id);
            $validatedData = $request->validate([
                'nome' => 'required',
                'departamentos' => 'required|exists:App\Models\Departamento,_id',
                'capacidade' => 'required|integer',
                'tipo_quadro' => 'required',
                'tipo_assento' => 'required',
            ]);
            $sala->nome = $request->nome;
            $sala->capacidade = (int)$request->capacidade;
            $sala->tipo_quadro = $request->tipo_quadro;
            $sala->tipo_assento = $request->tipo_assento;
            $sala->localizacao = ['type' => 'Point', 'coordinates' => [(float)$request->longitude, (float)$request->latitude], 'descricao_local' => $request->descricao_local];
            $sala->departamentos = Departamento::whereIn('_id',$request->departamentos)->get()->toArray();
            $sala->save(); 

            return redirect()->route('salas.index')->with('success','Atualizado com sucesso');
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
        $sala = Sala::find($id);
        if(!empty($sala)){
            foreach ($sala->toArray() as $key => $value) {
                if($key == 'departamentos' && gettype($value) == 'array'){
                    $ids = array_column($value, '_id');
                    Session::flash('_old_input.'.$key, $ids);
                }else{
                    Session::flash('_old_input.'.$key, $value);
                }                
            }  
            return view('salas.create'); 
        }else{
            return redirect()->route('salas.index')->with('error','Erro ao editar');
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
        $sala = Sala::find($id);
        if(!empty($sala)){
            $sala->delete();
        }else{
            return redirect()->route('salas.index')->with('error','Erro ao deletar');
        }
        return redirect()->route('salas.index')->with('success','Deletado com sucesso');
    }    
    /**
     * Pega valores por ajax
     *
     * @param  Request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $query  = Sala::query()->get();
        return Datatables::of($query)      
        ->addColumn('departamentos', function ($dados) {
            if(!empty($dados->departamentos)){
                return implode(', ',array_column($dados->departamentos, 'codigo'));
            }

        })->make(true);
    }
    public function agenda($id)
    {
        return view('sala.agenda');
    }
}
