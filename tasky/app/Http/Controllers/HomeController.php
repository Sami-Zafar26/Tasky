<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
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

    // function all() {
    //     return view('user.home');
    // }

    public function index(Request $request)
    {
        // $user=auth()->user()->id;
        // $tasks=Task::all();
        // $findTask=DB::table('task_completions')->join('tasks','tasks.id','=','task_completions.task_id')->where('task_completions.user_id',$user)->get();


        // $userID = auth()->user()->id;

        // $tasks = DB::table('tasks')
        //     ->leftJoin('task_completions', function ($join) use ($userID) {
        //     $join->on('tasks.id', '=', 'task_completions.task_id')
        //     ->where('task_completions.user_id', '=', $userID);
        //     })
        //     ->whereNull('task_completions.task_id')
        //     ->whereNull('tasks.deleted_at')
        //     ->get();

        // $tasks = DB::table('tasks')->where('tasks.completed', '=', 0)
        //     ->whereNull('tasks.deleted_at')
        //     ->get();
        $search=$request['search'] ?? "";
        if ($search != "") {
            $userID = auth()->user()->id;

            // $tasks = Task::select('tasks.task_title', 'tasks.task_description', 'tasks.created_at AS tasks_created_at', 'tasks.token', 'tasks.id')
            // ->leftJoin('task_completions', 'tasks.id', '=', 'task_completions.task_id')
            // ->where('task_completions.user_id', $userID)
            // ->orWhereNull('task_completions.user_id')
            // ->where('tasks.completed', 0)
            // ->where('tasks.control', 0)
            // ->where('tasks.task_title', $search)
            // ->whereNull('tasks.deleted_at')
            // ->paginate(6);

            $tasks = Task::select('tasks.task_title','tasks.task_description','tasks.created_at AS tasks_created_at','tasks.token','tasks.id')
                ->leftJoin('task_completions', function ($join) use ($userID) {
                $join->on('tasks.id', '=', 'task_completions.task_id')
                ->where('task_completions.user_id', '=', $userID);
            })
            ->where('tasks.completed', '=', 0)
            ->where('tasks.control', '=', 0)
            ->where('tasks.task_title', '=', $search)
            ->whereNull('tasks.deleted_at')
            ->whereNull('task_completions.task_id')
            ->paginate(6); 

            $data=compact('tasks','search');
            return view('user.home')->with($data);
        } else {
            $userID = auth()->user()->id;
            $tasks = Task::select('tasks.task_title','tasks.task_description','tasks.created_at AS tasks_created_at','tasks.token','tasks.id')
                ->leftJoin('task_completions', function ($join) use ($userID) {
                $join->on('tasks.id', '=', 'task_completions.task_id')
                ->where('task_completions.user_id', '=', $userID);
            })
            ->where('tasks.completed', '=', 0)
            ->where('tasks.control', '=', 0)
            ->whereNull('tasks.deleted_at')
            ->whereNull('task_completions.task_id')
            ->paginate(6);

            // $tasks = Task::select('tasks.task_title', 'tasks.task_description', 'tasks.created_at AS tasks_created_at', 'tasks.token', 'tasks.id')
            // ->leftJoin('task_completions', 'tasks.id', '=', 'task_completions.task_id')
            // ->where('task_completions.user_id', $userID)
            // ->orWhereNull('task_completions.user_id')
            // ->whereNull('task_completions.task_id')
            // ->where('tasks.completed', 0)
            // ->where('tasks.control', 0)
            // ->whereNull('tasks.deleted_at')
            // ->paginate(6);
            
            $data=compact('tasks');
            return view('user.home')->with($data);
        }
        
    }
    
    public function admin()
    {
        $user=auth()->user()->id;
        // dd($user);
        $taskcreated=User::join('tasks','tasks.user_id','=','users.id')->count();

        $admin=User::find($user);
        $data=compact('admin','taskcreated');
        // dd(0);
        return view('admin.admin-expense')->with($data);
    }
}
