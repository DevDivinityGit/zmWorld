<?php

namespace App\Http\Controllers;

use App\Http\Resources\User;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Resources\TaskCollection;
use App\User as AllUser;
use App\Classes\Helpers\CollectionHelper;
use App\UserTask;
use DB;

class TaskController extends Controller
{


    public function acceptance($id)
    {
        $task = Task::find($id);
        $remaining = (int) $task->demand -1;

        $task->update(['remaining' => $remaining]);
        $userId = request()->user_id;


        DB::table('user_task')
            ->where('user_id', $userId)
            ->where('task_id', $task->id)
//            ->whereDay('updated_at', date('d'))
            ->update(['task_status' => 'Accepted']);




        return 200;





















        return 0;




    }

    public function restore($id)
    {


        $task = Task::find($id);

        if($task) {
            $task->update([
                'status' => null,
            ]);



            UserTask::where('task_id', $id)
                ->where('user_id', request()->user_id)->first()->delete();








//            foreach(DB::table('user_task')->get() as $tasks) {
//
//                if($tasks->id === (int)$id) {
//
//                    $tasks->delete();
//
//
//                }
//
//
//
//            }






            return 200;
















        }



        return 0;




    }









    public function rejection($id)
    {
        $task = Task::find($id);
//        $remaining = (int) $task->demand -1;
        $userId = request()->user_id;


        DB::table('user_task')
            ->where('user_id', $userId)
            ->where('task_id', $task->id)
//            ->whereDay('updated_at', date('d'))
            ->update(['task_status' => 'Rejected']);




        return 200;





        return 0;




    }












    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




















        if(request()->category_id && request()->tasks_status) {
            if(request()->tasks_status === 'not taken') {
                request()->tasks_status = null;
            }



            $arr = [];



            foreach(AllUser::all() as $item) {

                $i = 1;
                foreach($item->tasks as $task) {


                    if($task->pivot->task_status === request()->tasks_status && $task->category_id == request()->category_id) {
                        $task->userData = $task->users()->find($item->id);
                        $i++;

                        array_push($arr, $task);


                    }








                }



            }

            $arr = collect($arr);



            $c = new CollectionHelper();
            $data =  $c->paginate($arr, request()->limit);















            return  new TaskCollection($data);


        }









        if(request()->category_id) {



            $arr = [];



            foreach(AllUser::all() as $item) {
                $i = 1;

                foreach($item->tasks as $task) {


                    if($task->category_id == request()->category_id) {
                        $task->userData = $task->users()->find($item->id);
                        $i++;

                        array_push($arr, $task);


                    }








                }



            }

            $arr = collect($arr);



            $c = new CollectionHelper();
            $data =  $c->paginate($arr, request()->limit);















            return  new TaskCollection($data);






        }

        if(request()->tasks_status) {

            if(request()->tasks_status === 'not taken') {
                request()->tasks_status = null;
            }



            $arr = [];



            foreach(AllUser::all() as $item) {

                $i = 1;
                foreach($item->tasks as $task) {


                    if($task->pivot->task_status === request()->tasks_status) {
                        $task->userData = $task->users()->find($item->id);
                        $i++;

                        array_push($arr, $task);


                    }








                }



            }

            $arr = collect($arr);



            $c = new CollectionHelper();
            $data =  $c->paginate($arr, request()->limit);















            return  new TaskCollection($data, request()->limit);


        }




// default data

//
//
//        $arr = [];
//
//
//        $i = 1;
//        foreach(AllUser::all() as $item) {
//
//
//            foreach($item->tasks as $task) {
//
//
//
//
//
//                $task->userData = $task->users()->first();
//                $i++;
//
//                array_push($arr, $task);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//            }
//
//
//
//        }
//
//        $arr = collect($arr);
//
//
//
//        $c = new CollectionHelper();
//        $data =  $c->paginate($arr, request()->limit);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//        return  new TaskCollection($data);









        $arr = [];



        foreach(AllUser::all() as $item) {

            $i = 1;
            foreach($item->tasks as $task) {

                    if($task->status !== null) {

                        $task->userData = $task->users()->find($item->id);
                        $i++;

                        array_push($arr, $task);


                    }











            }



        }

        $arr = collect($arr);



        $c = new CollectionHelper();
        $data =  $c->paginate($arr, request()->limit);















        return  new TaskCollection($data, request()->limit);
//





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
        $r = request();









        if(empty($r->name) || empty($r->category_id) || empty($r->name) || empty($r->description) || empty($r->demand)  || empty($r->link)) {

            return 500;

        }





        $task = Task::create([
            'name' => $r->name,

            'category_id' => $r->category_id,
            'description' => $r->description,
            'task_link' => $r->link,
            'demand' => $r->demand,
            'remaining' => $r->demand,
        ]);



        if($task) {
            return 200;
        }



















//        if($r->image) {
//            $imageName = time().'.'.$r->image->getClientOriginalExtension();
//            $r->image->move('uploads/tasks/', $imageName);
//
//        }



        $task = Task::create([
            'name' => $r->name,
            'price' => $r->price,
            'category_id' => $r->category_id,
        ]);



        if($task) {
            return 200;
        }





        return 500;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
