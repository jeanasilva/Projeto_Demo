<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ListaItens;

class ListaItensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user_id = $request.auth()->user();
        // $dados = ListaItens::where(['user_id'] == $user_id);
        // return $dados;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      return ListaItens::create($request->all());


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ListaItens::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return ListaItens::edit($id);
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
        // return ListaItens::find($id);
        return ListaItens::update($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user_id = $request.auth()->user();

        // $task = ListaItens::find($id);
        // if ($task->user_id == $user_id) {
        //     $result = ListaItens::destroy($id);
        //     if ($result == 1) {
        //         return response()->json(['msg' => 'deletado com sucesso'], 203);
        //     } else {
        //         return response()->json(['msg' => 'não foi possível deletar'], 500);
        //     }
        // } else {
        //     return response()->json(['msg' => 'voce não pode deletar esta tarefa'], 402);
        // }



    }
}
