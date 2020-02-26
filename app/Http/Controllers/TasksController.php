<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\Tasks;
use Illuminate\Http\Request;
// use Http\Middleware\apiProtectdRoute;
// use Closure;

class TasksController extends Controller
{
     /**
     * @var
     */
     protected $user;

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = $this->user->tasks()->get(['titulo','descricao'])->toArray();
        return $tasks;

        if ($tasks) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task could not be updated.'
            ], 500);
        }


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
        // return Tasks::create($request->all());

        $this->validate($request,[
            'titulo'    => 'required',
            'descricao' => 'required'
        ]);

        $task = new Tasks();
        $task->titulo    = $request->titulo;
        $task->descricao = $request->descricao;

        if ($this->user->tasks()->save($task))
            return response()->json([
                'sucess' => true,
                'task'   => $task
            ]);
        else
            return response()->json([
                'sucess'    => false,
                'message'   => 'Desculpe, task não adicionada'
            ],500);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $task = $this->user->tasks()->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task with id ' . $id . ' cannot be found.'
            ], 400);
        }

        return $task;

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
        $tasks = $this->user->tasks()->find($id);

        if (!$task) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task with id ' . $id . ' cannot be found.'
            ], 400);
        }

        $updated = $task->fill($request->all())->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, task could not be updated.'
            ], 500);
        }

        // $tasks->titulo          = $request->input('titulo');
        // $tasks->descricao       = $request->input('descricao');
        // $tasks->data_vencimento = $request->input('data_vencimento');
        // $tasks->data_realizado  = $request->input('data_realizado');
        // $tasks->realizado       = $request->input('realizado');

        // $tasks->save();
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
