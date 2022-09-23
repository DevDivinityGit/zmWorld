<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use DB;
//use Carbon\Carbon;
class UserTaskController extends Controller
{



    public function getHistory()
    {


        $data = [];

      $week =    DB::table('tasks')
        ->whereBetween('updated_at', [
        \Carbon\Carbon::parse('last monday')->startOfDay(),
        \Carbon\Carbon::parse('next friday')->endOfDay(),
    ])
          ->where('user_id', request()->user()->id)
          ->where('status', 'accepted')

          ->get();












        $yesterday = DB::table('tasks')
            ->whereDay('updated_at', date('d',   strtotime("-1 day")))
            ->where('status', 'accepted')
            ->where('user_id', request()->user()->id)
            ->get();












        $today = DB::table('tasks')
            ->whereDay('updated_at', date('d'))
            ->where('status', 'accepted')
            ->where('user_id', request()->user()->id)
            ->get();






        $collectedToday = DB::table('tasks')
            ->where('user_id', request()->user()->id)


            ->whereDay('updated_at', date('d'))
            ->get();















        $month = DB::table('tasks')
            ->whereMonth('updated_at', date('m'))
            ->where('status', 'accepted')
            ->where('user_id', request()->user()->id)
            ->get();




        $last_month = DB::table('tasks')
            ->whereMonth('updated_at', date('m',strtotime("-1 month")) )
            ->where('status', 'accepted')
            ->where('user_id', request()->user()->id)
            ->get();





//        $today_remaiining = (int)request()->user()->plan()->limit - count($collectedToday);




         $data['month'] = $month;
         $data['last_month'] = $last_month;
         $data['today'] = $today;
         $data['yesterday'] = $yesterday;
         $data['collected_today'] = $collectedToday;
         $data['week'] = $week;
         $data['total_reven'] = Task::where('user_id', request()->user()->id)->get();
         $data['today_remaining'] = (int)request()->user()->plan->limit - count($collectedToday);






        return $data;



    }


    public function submitTask()
    {





        $id = request()->task_id;
        $task = Task::find($id);
         $r = request();






         $errors = [];

         if(!$task) {



             $errors[] = 'task not found';
             return json_encode(['errors' => true, 'data' => $errors]);




         }




         $userTasks = request()->user()->tasks;
         $ids = [];


         foreach($userTasks as $userTask) {
               array_push($ids, $userTask->id);


         }




         $userSubmittedTasks = Task::whereIn('id', $ids)
             ->whereDay('updated_at', date('d'))

             ->get();





         foreach($userSubmittedTasks as $uTask) {
             if($uTask->id === $task->id) {


                 $errors[] = 'task has already performed';
                 return json_encode(['errors' => true, 'data' => $errors]);





             }

         }




























//
//
//         if($userSubmittedTasks->count()>0) {
//             $errors[] = 'task has already performed';
//             return json_encode(['errors' => true, 'data' => $errors]);
//
//
//
//
//
//
//
//         }















//         if($task->status !== null && request()->user()->id === $task->user_id) {
//
//
//             $errors[] = 'task already performed';
//             return json_encode(['errors' => true, 'data' => $errors]);
//
//
//
//
//
//
//
//
//         }














//         $userTasks = DB::table('tasks')
//             ->whereDay('updated_at', date('d'))
//             ->where('status', 'accepted')
//             ->where('user_id', request()->user()->id)
//             ->get();



//         return $userTasks;




         if(request()->user()->tasks()->count()>=(int)$r->user()->plan->limit) {

                    $errors[] = 'User met submitting tasks limit';
             return json_encode(['errors' => true, 'data' => $errors]);



         }
































        //        IMAGE UPLOAD

        $request = request();

        if ($request->image) {
            $folderPath = "uploads/";

            $base64Image = explode(";base64,", $request->image);
            $explodeImage = explode("image/", $base64Image[0]);
            $imageType = $explodeImage[1];
            $image_base64 = base64_decode($base64Image[1]);
            $file = $folderPath . uniqid() . '.'.$imageType;

            file_put_contents($file, $image_base64);




        } else {
            $errors[] = 'image is required';
        }
        //END IMAGE UPLOAD


        if(count($errors)>0) {


            return json_encode(['errors' => true, 'data' => $errors]);



        } else {

            $task->update([
               'status' => 'inprogress',
//                'user_id' => request()->user()->id,

                'image' => $file,
//                'remaining' => (int) $task->remaining -=1,
            ]);


            $task->users()->attach(request()->user()->id);



            return json_encode(['errors' => false, 'data' => $task]);













        }






















    }

    public function getTasks()
    {


        $errors = [];
        if(empty(request()->category_id)) {
            $errors[] = 'category field is required';
        }


        if(count($errors)>0) {


            return json_encode([
                'errors' => true,
                'data' => $errors,
            ]);
        }









        $cId = request()->category_id;


        $ids = [];


        foreach(request()->user()->tasks as $tasks) {
             array_push($ids, $tasks->id);
        }




         $data = Task::whereNotIn('id', $ids)
             ->where('category_id', $cId)
             ->get();








        return json_encode([
            'errors' => false,
            'data' => $data,
        ]);
























    }

    public function getSubmittedTasks()
    {





        return json_encode([
            'errors' => false,
            'data' => request()->user()->tasks
        ]);




    }







}
