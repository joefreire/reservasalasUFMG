<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Sala;
use App\Models\Disciplina;
use Yajra\Datatables\Datatables;
use Session;

class DisciplinaController extends Controller
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
        return view('disciplinas.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disciplinas.create');
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
                'nome' => 'required|unique:App\Models\Disciplina,nome, departamento',
                'departamentos' => 'required|exists:App\Models\Departamento,_id',
                'codigo' => 'required',
            ]);
            $disciplina = Disciplina::create([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'departamentos' => Departamento::whereIn('_id',$request->departamentos)->get()->toArray(),
            ]);
            return redirect()->route('disciplinas.index')->with('success','Criado com sucesso');
        }else{
            $disciplina = Disciplina::findOrFail($request->_id);
            $validatedData = $request->validate([
                'nome' => 'required',
                'departamentos' => 'required|exists:App\Models\Departamento,_id',
                'codigo' => 'required',
            ]);
            $disciplina->nome = $request->nome;
            $disciplina->codigo = $request->codigo;
            $disciplina->departamentos = Departamento::whereIn('_id',$request->departamentos)->get()->toArray();
            $disciplina->save(); 

            return redirect()->route('disciplinas.index')->with('success','Atualizado com sucesso');
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
        $disciplina = Disciplina::find($id);
        if(!empty($disciplina)){

            foreach ($disciplina->toArray() as $key => $value) {
                if($key == 'departamentos' && gettype($value) == 'array'){
                    $ids = array_column($value, '_id');
                    Session::flash('_old_input.'.$key, $ids);
                }else{
                    Session::flash('_old_input.'.$key, $value);
                }                
            }  
            return view('disciplinas.create'); 
        }else{
            return redirect()->route('disciplinas.index')->with('error','Erro ao editar');
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
        $disciplina = Disciplina::find($id);
        if(!empty($disciplina)){
            $disciplina->delete();
        }else{
            return redirect()->route('disciplinas.index')->with('error','Erro ao deletar');
        }
        return redirect()->route('disciplinas.index')->with('success','Deletado com sucesso');
    }    
    /**
     * Pega valores por ajax
     *
     * @param  Request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $query  = Disciplina::query()->get();
        return Datatables::of($query)      
        ->addColumn('departamentos', function ($dados) {
            if(!empty($dados->departamentos)){
                return implode(', ',array_column($dados->departamentos, 'codigo'));
            }

        })->make(true);
    }

}
