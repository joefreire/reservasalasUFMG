<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departamento;
use Yajra\Datatables\Datatables;
use Session;
use App\Http\Requests\UserFormRequest;
class UsersController extends Controller
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
        return view('users.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::forget('_old_input');
        return view('users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        if(empty($request->_id)){
            $user = User::create([
                'nome' => $request->nome,
                'login' => $request->login,
                'email' => $request->email,
                'tipo' => $request->tipo,
                'departamento' => Departamento::find($request->departamento)->toArray(),
                'preferencia_quadro' => $request->preferencia_quadro,
            ]);
            if ($request->ajax()) {
                return response()->json(['id' => $user->_id, 'login'=> $user->login]);
            }
            return redirect()->route('users.index')->with('success','Criado com sucesso');
        }else{

            $user = User::findOrFail($request->_id);
            $user->nome = $request->nome;
            $user->login = $request->login;
            $user->tipo = $request->tipo;
            $user->preferencia_quadro = $request->preferencia_quadro;
            $user->departamento = Departamento::find($request->departamento)->toArray();
            $user->save(); 

            return redirect()->route('users.index')->with('success','Atualizado com sucesso');
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
        $user = User::find($id);
        if(!empty($user)){
            foreach ($user->toArray() as $key => $value) {
                Session::flash('_old_input.'.$key, $value);
            }  
            return view('users.create'); 
        }else{
            return redirect()->route('users.index')->with('error','Erro ao editar');
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
        $user = User::find($id);
        if(!empty($user)){
            $user->delete();
        }else{
            return redirect()->route('users.index')->with('error','Erro ao deletar');
        }
        return redirect()->route('users.index')->with('success','Deletado com sucesso');
    }    
    /**
     * Pega valores por ajax
     *
     * @param  Request \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function getData(Request $request)
    {   
        //test return response()->json(User::get());
        $query  = User::query()->get();
        return Datatables::of($query)->make(true);
    }
}
