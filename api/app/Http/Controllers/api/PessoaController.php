<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public readonly Pessoa $pessoa;
     public function __construct()
     {
        $this->pessoa = new Pessoa();
     }
    public function index()
    {

       $pessoas = $this->pessoa->all();
      //$pessoas= DB::table('pessoa')->get();
      return ['data'=>$pessoas];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
            $request->validate([
            'nome'=>'string',
            'telefone'=>'string',
            'email'=>'string',
            'cpf_cnpj'=>'string',
            'rua'=>'string',
            'cidade'=>'string',
            'estado'=>'string',
            'cep'=>'string',
            'pais'=>'string',
            'active'=>'string'
        ]);
/*
        $data =$request->all();
        $pessoa = Pessoa::create($data);

        return ["data"=>$pessoa];
  */
       $registrar = DB::table('pessoa')->insert([
        'nome'=>$request->input('nome'),
        'telefone'=>$request->input('telefone'),
        'email'=>$request->input('email'),
        'cpf_cnpj'=>$request->input('cpf_cnpj'),
        'rua'=>$request->input('rua'),
        'cidade'=>$request->input('cidade'),
        'estado'=>$request->input('estado'),
        'cep'=>$request->input('cep'),
        'pais'=>$request->input('pais'),
        'active'=>$request->input('active')
        ]);
    try{
        if ($registrar) {
            return response()->json(['message' => 'Usuário criado com sucesso']);
        } else {
            return response()->json(['message' => 'Falha ao criar o novo Usuário'], 500);
        
        }
    }catch(\Exception $e){
            return response()->json(['message'=>'Erro ao criar o usuário: '.$e->getMessage()],500);
         }

         $response = [
            'json'=>$request->input(),
            'success'=>true
         ];
         return response($response, 200);
    
    }

    /**
     * Display the specified resource.
     */
    public function show($nome)
    {
        $mostrar = DB::table('pessoa')->where('nome', 'like', '%'.$nome .'%')->get();

        if($mostrar->isEmpty()){
            return response()->json(['message'=>'Nenhum usuário encontradao'], 404);
        }else{
            

        }
        return response()->json($mostrar);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       $pessoa = DB::table('pessoa')->where('id', $id)->first();

       if(!$pessoa){
        return response()->json(['message'=>'Usuário não encontrado!'], 404);
       }else{
           DB::table('pessoa')->where('id', $id)->delete();
           return response()->json(['message'=>'Usuário excluido com sucesso!']);
        }
    }
}
