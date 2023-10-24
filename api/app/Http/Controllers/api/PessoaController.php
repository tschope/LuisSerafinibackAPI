<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public readonly Pessoa $pessoa;

    public function index()
    {

        $pessoas = Pessoa::all();

        return ['data' => $pessoas];
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
            'nome' => 'string',
            'telefone' => 'string',
            'email' => 'string',
            'cpf_cnpj' => 'string',
            'rua' => 'string',
            'cidade' => 'string',
            'estado' => 'string',
            'cep' => 'string',
            'pais' => 'string',
            'active' => 'string'
        ]);

        $data = $request->all();
        $registrar = Pessoa::create($data);

        try {
            if ($registrar){
                return response()->json(['message' => 'Usuário criado com sucesso']);
            } else {
                return response()->json(['message' => 'Falha ao criar o novo Usuário'], 500);
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'Erro ao criar o usuário: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($nome)
    {
        $mostrar = Pessoa::where('nome', 'like', '%' . $nome . '%')->get();

        if ($mostrar->isEmpty()){
            return response()->json(['message' => 'Nenhum usuário encontradao'], 404);
        }

        return response()->json(['data'=> $mostrar]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pessoa = Pessoa::where('id',$id)->get();

        return response()->json(['data'=>$pessoa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'string',
            'telefone' => 'string',
            'email' => 'string',
            'cpf_cnpj' => 'string',
            'rua' => 'string',
            'cidade' => 'string',
            'estado' => 'string',
            'cep' => 'string',
            'pais' => 'string',
            'active' => 'string'
        ]);

        $data = $request->all();

        $alteracao = Pessoa::where('id', $id)->update($data);

        if($alteracao === 0){
            return response()->json(['message'=>'Registro não encontrado ou nenhum campo alterado !'], 404);
        }else{
            return response()->json(['message'=>'Registro alterado com sucesso!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pessoa = Pessoa::where('id', $id)->first();

        if (!$pessoa){
            return response()->json(['message' => 'Usuário não encontrado!'], 404);
        } else {
            $pessoa->delete();
            return response()->json(['message' => 'Usuário excluido com sucesso!']);
        }
    }
}
