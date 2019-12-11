<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use Yajra\Datatables\Datatables;
use Session;
class DepartamentoController extends Controller
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
        return view('departamentos.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departamentos.create');
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
                'nome' => 'required|unique:App\Models\Departamento,nome',
                'codigo' => 'required|unique:App\Models\Departamento,codigo',
            ]);
            $departamento = Departamento::create([
                'nome' => $request->nome,
                'codigo' => $request->codigo,
                'descricao' => $request->descricao,
            ]);
            return redirect()->route('departamentos.index')->with('success','Departamento criado com sucesso');
        }else{
            $departamento = Departamento::findOrFail($request->_id);
            $validatedData = $request->validate([
                'nome' => 'required',
                'codigo' => 'required',
            ]);
            $departamento->nome = $request->nome;
            $departamento->codigo = $request->codigo;
            $departamento->descricao = $request->descricao;
            $departamento->save(); 

            return redirect()->route('departamentos.index')->with('success','Departamento atualizado com sucesso');
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
        $departamento = Departamento::find($id);
        if(!empty($departamento)){
            foreach ($departamento->toArray() as $key => $value) {
                Session::flash('_old_input.'.$key, $value);
            }  
            return view('departamentos.create'); 
        }else{
            return redirect()->route('departamentos.index')->with('error','Erro ao editar');
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
        $departamento = Departamento::find($id);
        if(!empty($departamento)){
            $departamento->delete();
        }else{
            return redirect()->route('departamentos.index')->with('error','Erro ao deletar');
        }
        return redirect()->route('departamentos.index')->with('success','Departamento deletado com sucesso');
    }    
    /**
     * Pega valores por ajax
     *
     * @param  Request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {
        $query  = Departamento::query()->get();
        return Datatables::of($query)->make(true);
    }
}
