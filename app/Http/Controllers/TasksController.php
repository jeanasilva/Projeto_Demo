<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\Tasks;
use Illuminate\Http\Request;
// use Http\Controllers\Api\AuthController;
// use Http\Middleware\apiProtectdRoute;
use Auth;

class TasksController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = JWTAuth::parseToken()->authenticate();
        $tasks = Tasks::where('user_id',$user->id)->get();
        return $tasks;

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

        $user_id = Auth::user()->id;

        $task = new Tasks;
        $task->titulo    = 'titulo';
        $task->descricao = 'descricao';
        $task->user_id   = $user_id;
        $task->save();

        return $task;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = JWTAuth::parseToken()->authenticate();
        $tasks = Tasks::where('user_id',$user->id)->get();
        return $tasks;

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

        $user_id = Auth::user()->id;
        $task    = Tasks::find($id);

        if ($task->user_id == $user_id) {

            $task->titulo                = $request->titulo;
            $task->descricao             = $request->descricao;
            $task->data_vencimento       = $request->data_vencimento;
            $task->data_realizado        = $request->data_realizado;
            $task->realizado             = $request->realizado;
            $task->save();

        }else{
            return $task;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Tasks::destroy($id);
    }
}
