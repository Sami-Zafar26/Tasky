<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\WithdrawalRecord;
use App\Models\ContactUs;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class TaskController extends Controller
{
    function add_task() {
        return view('admin.add-task');
    }

    function  upload_task(Request $request) {
        if (isset($request['optional'])==1) {
            $task= new Task;
            $task->task_title= $request['title'];
            $task->task_description=$request['textarea'];
            $task->task_link=$request['task_link'];
            $task->optional=$request['optional'];
            $task->task_amount= $request['amount'];
            $task->quantity= $request['quantity'];
            $task->total_expense= $request['expense'];
            $task->user_id=auth()->user()->id;
            $task->save();
            $task->token= md5(($task->id.$task->created_at));
            $task->save();
    
            $user=User::find(auth()->user()->id);
            $prevexpense=$user->amount;
            $total_expense=$prevexpense+ $request['expense'];
            $user->amount=$total_expense;
            $user->save();
        }else{
            $task= new Task;
            $task->task_title= $request['title'];
            $task->task_description=$request['textarea'];
            $task->task_link=$request['task_link'];
            $task->task_amount= $request['amount'];
            $task->quantity= $request['quantity'];
            $task->total_expense= $request['expense'];
            $task->user_id=auth()->user()->id;
            $task->save();
            $task->token= md5(($task->id.$task->created_at));
            $task->save();
    
            $user=User::find(auth()->user()->id);
            $prevexpense=$user->amount;
            $total_expense=$prevexpense+ $request['expense'];
            $user->amount=$total_expense;
            $user->save();
        }
        // echo "<pre>";
        // dd($request->all());
        // $task= new Task;
        // $task->task_title= $request['title'];
        // $task->task_description=$request['textarea'];
        // $task->task_amount= $request['amount'];
        // $task->quantity= $request['quantity'];
        // $task->total_expense= $request['expense'];
        // $task->user_id=auth()->user()->id;
        // $task->save();
        // $task->token= md5(($task->id.$task->created_at));
        // $task->save();

        // $user=User::find(auth()->user()->id);
        // $prevexpense=$user->amount;
        // $total_expense=$prevexpense+ $request['expense'];
        // $user->amount=$total_expense;
        // $user->save();

        session()->flash('task-uploaded','Task has been Uploaded Successfully');
        return redirect()->back();
    }

    function view_task($id) {

        $task = Task::where('token', $id)->first();
        if (is_null($task)) {
            return redirect()->back();
        }else{
            $taskQuantity = Task::where('id', $task->id)->value('quantity');
            $task_completed_count=TaskCompletion::where('task_id','=',$task->id)->count();  
            
            if ($taskQuantity==$task_completed_count) {
                session()->flash('task-completed','Sorry! This task\'s Requirement is Completed You can not do this task.');
                return redirect('home');
            }else{
                $data = compact('task');
                return view('user.view-task')->with($data);
            }
        }
            
    }

    function send_task(Request $request) {
        $optional=Task::find($request['task_id']);
        if ($optional->optional==1) {
            if ($request->hasFile('task_image')) {
                $filename= time().'_tasky.'.$request->file('task_image')->getClientOriginalExtension();
                $file= $request->file('task_image')->storeAs('public/'.$filename);
                $image_name=$filename;
    
                $task= new TaskCompletion;
                $task->task_image=$image_name;
                $task->task_id=$request['task_id'];
                $task->user_id=auth()->user()->id;
                $task->save();
                
                $task_amount_refercence=Task::find($request['task_id']);
                $task_amount=$task_amount_refercence->task_amount;
    
                $user=auth()->user()->id;
                $earn=User::find($user);
                $prevamount=$earn->amount;
                $newamount=$prevamount+$task_amount;
                $earn->amount=$newamount;
                $earn->save();
    
                $taskQuantity = Task::where('id', $request['task_id'])->value('quantity');
                $task_completed_count=TaskCompletion::where('task_id','=',$request['task_id'])->count();
                if ($taskQuantity==$task_completed_count) {
                    $completed=Task::find($request['task_id']);
                    $completed->completed=1;
                    $completed->save();
                    session()->flash('task-sended','Task image has been sended Successfully');
                    return redirect('all-tasks');
                }else{
                    session()->flash('task-sended','Task image has been sended Successfully');
                    return redirect('all-tasks');
                }
            } 
            else {
                $task= new TaskCompletion;
                $task->task_id=$request['task_id'];
                $task->user_id=auth()->user()->id;
                $task->save();
                
                $task_amount_refercence=Task::find($request['task_id']);
                $task_amount=$task_amount_refercence->task_amount;
    
                $user=auth()->user()->id;
                $earn=User::find($user);
                $prevamount=$earn->amount;
                $newamount=$prevamount+$task_amount;
                $earn->amount=$newamount;
                $earn->save();
    
                $taskQuantity = Task::where('id', $request['task_id'])->value('quantity');
                $task_completed_count=TaskCompletion::where('task_id','=',$request['task_id'])->count();
                if ($taskQuantity==$task_completed_count) {
                    $completed=Task::find($request['task_id']);
                    $completed->completed=1;
                    $completed->save();
                    session()->flash('task-image-optional','Your Task has been completed Successfully');
                    return redirect('all-tasks');
                }else{
                    session()->flash('task-image-optional','Your Task has been completed Successfully');
                    return redirect('all-tasks');
                }
            }
        } 
        else {
        $request->validate([
            'task_image' => 'required|file|mimes:jpeg,jpg,png',
        ]);
        if ($request->hasFile('task_image')) {
            $filename= time().'_tasky.'.$request->file('task_image')->getClientOriginalExtension();
            $file= $request->file('task_image')->storeAs('public/'.$filename);
            $image_name=$filename;

            $task= new TaskCompletion;
            $task->task_image=$image_name;
            $task->task_id=$request['task_id'];
            $task->user_id=auth()->user()->id;
            $task->save();
            
            $task_amount_refercence=Task::find($request['task_id']);
            $task_amount=$task_amount_refercence->task_amount;

            $user=auth()->user()->id;
            $earn=User::find($user);
            $prevamount=$earn->amount;
            $newamount=$prevamount+$task_amount;
            $earn->amount=$newamount;
            $earn->save();

            $taskQuantity = Task::where('id', $request['task_id'])->value('quantity');
            $task_completed_count=TaskCompletion::where('task_id','=',$request['task_id'])->count();
            if ($taskQuantity==$task_completed_count) {
                $completed=Task::find($request['task_id']);
                $completed->completed=1;
                $completed->save();
                session()->flash('task-sended','Task image has been sended Successfully');
                return redirect('all-tasks');
            }else{
                session()->flash('task-sended','Task image has been sended Successfully');
                return redirect('all-tasks');
            }
        }
        }
        session()->flash('error',"No image Uploaded.");
        return redirect('view-task');
    }

    function show_tasks() {
        $tasks=Task::withCount('taskscompletion')->get();

        $data=compact('tasks');
        return view('admin.show-tasks')->with($data);   
    }

    function edit_task($id) {
        $task=Task::find($id);
        if (is_null($task)) {
            return redirect('show-tasks');
        }else{
            $data=compact('task');
            return view('admin.edit-task')->with($data);
        }
    }

    function update_task(Request $request) {
        // dd($request->all());
        if (isset($request['optional'])==1) {
            $update_task=Task::find($request['task_id']);
            $update_task->task_title=$request['title'];
            $update_task->task_description=$request['textarea'];
            $update_task->task_link=$request['task_link'];
            $update_task->optional=$request['optional'];
            $update_task->task_amount=$request['amount'];
            $update_task->quantity=$request['quantity'];
            $update_task->total_expense=$request['expense'];
            $update_task->save();

            session()->flash('updated','Task has been Updated Successfully!');
            return redirect(Route('tasks'));
        }
        else{
            $update_task=Task::find($request['task_id']);
            $update_task->task_title=$request['title'];
            $update_task->task_description=$request['textarea'];
            $update_task->task_link=$request['task_link'];
            $update_task->optional=0;
            $update_task->task_amount=$request['amount'];
            $update_task->quantity=$request['quantity'];
            $update_task->total_expense=$request['expense'];
            $update_task->save();

            session()->flash('updated','Else Task has been Updated Successfully!');
            return redirect(Route('tasks'));
        }

    }

    public function delete_task(Request $request)
    {
        Task::find($request['sno'])->delete();
        session()->flash('deleted','Task has been Deleted Successfully!');
        return redirect()->back();
    }

    function review_tasks() {

        $taskCompletions= TaskCompletion::select('users.id AS users_id','users.name','tasks.id','tasks.task_title','tasks.task_description','tasks.task_amount','task_completions.task_completion_id','task_completions.task_image','task_completions.approved','task_completions.task_id','task_completions.issue')
        ->join('tasks','tasks.id','=','task_completions.task_id')
        ->join('users','users.id','=','task_completions.user_id')
        ->where('task_completions.approved',0)
        ->where('task_completions.issue',0)
        ->get();
        // dd($taskCompletions);

        return view('admin.review-task',['task'=>$taskCompletions]);
    }

    function task_approved(Request $request) {
        $approved=TaskCompletion::find($request['approved']);
        $approved->approved=1;
        $approved->save();

        session()->flash('approved','Task has been approved Successfully.');
        return redirect()->back();
    }

    function task_rejected(Request $request) {
        // dd($request->all());
        $user_earning=User::find($request['user_id']);
        $updated_user_earning=$user_earning->amount-$request['task_amount'];
        $user_earning->amount=$updated_user_earning;
        $user_earning->save();

        $task=TaskCompletion::find($request['task_completion_id']);
        $task->issue=1;
        $task->save();
        
        session()->flash('rejected','Task has been rejected Successfully.');
        return redirect()->back();
    }

    function myearnings() {

        $user=auth()->user()->id;
        $task_count = User::
            join('task_completions', 'task_completions.user_id', '=', 'users.id')->where('user_id',$user)->count();
        $earning=User::find($user);
        $issue=TaskCompletion::where('user_id',$user)->where('issue',1)->first();
        $bank_accounts=PaymentMethod::where('user_id',auth()->user()->id)->get();
        $data=compact('earning','task_count','issue','bank_accounts');

        return view('user.myearnings')->with($data);
    }

    function withdrawal_cash(Request $request) {
        $earning=User::find(auth()->user()->id);
        $request->validate([
            'withdrawal_amount'=>"required|numeric|min:0.01|max:$earning->amount",
            'payment_method_id'=>'required',
        ]);

        $withdrawal_record=WithdrawalRecord::create([
            'withdrawal_amount'=> $request['withdrawal_amount'],
            'payment_method_id'=> $request['payment_method_id'],
            'user_id' => auth()->user()->id,
        ]);

        // $user=User::find(auth()->user()->id);
        // $remaining_amount=$user->amount-$request['withdrawal_amount'];
        // $user->amount=$remaining_amount;
        // $user->save();

        if ($withdrawal_record) {
            session()->flash('withdrawal','Your cash withdrawal Successfully Wait for the verification');
            return redirect()->back();
        }
        session()->flash('withdrawal_error','Your cash not withdrawal.');
        return redirect()->back();
    }

    function completed_tasks() {
        $user_id=auth()->user()->id;
        $user_task_completed= TaskCompletion::
            join('tasks','tasks.id','=','task_completions.task_id')
            ->where('task_completions.user_id',$user_id)
            ->where('issue',0)
            ->get();
       return view('user.completed_tasks',['data'=>$user_task_completed]);
    }

    function resolve_task(Request $request) {
        $resolve_task=TaskCompletion::find($request['id']);

        $task=Task::find($resolve_task->task_id);
        $user=User::find($resolve_task->user_id);
        // dd($user);

        if ($task->optional==1) {
            if ($request->hasFile('task_image')) {
                $filename= time().'_tasky.'.$request->file('task_image')->getClientOriginalExtension();
                $file= $request->file('task_image')->storeAs('public/'.$filename);
                $image_name=$filename;
                $resolve_task=TaskCompletion::find($request['id']);
                $resolve_task->task_image=$image_name;
                $resolve_task->issue=0;
                $resolve_task->save();

                $amount=$user->amount+$task->task_amount;
                $user->amount=$amount;
                $user->save();
    
                session()->flash('task-resolved','Your image has been reuploaded Successfully!');
                return redirect()->back();
            }
            else{
                $resolve_task->issue=0;
                $resolve_task->save();

                $amount=$user->amount+$task->task_amount;
                $user->amount=$amount;
                $user->save();

                session()->flash('task-optional','Your task has been reuploaded Successfully!');
                return redirect()->back();
            }
        }
        else{
            $request->validate([
                'task_image' => 'required|file|mimes:jpeg,jpg,png',
            ]);
            if ($request->hasFile('task_image')) {
                $filename= time().'_tasky.'.$request->file('task_image')->getClientOriginalExtension();
                $file= $request->file('task_image')->storeAs('public/'.$filename);
                $image_name=$filename;
                $resolve_task=TaskCompletion::find($request['id']);
                $resolve_task->task_image=$image_name;
                $resolve_task->issue=0;
                $resolve_task->save();

                $amount=$user->amount+$task->task_amount;
                $user->amount=$amount;
                $user->save();
    
                session()->flash('task-resolved','Your image has been reuploaded Successfully!');
                return redirect()->back();
            }
        }
        session()->flash('task-not-resolve','Your image has not been reuploaded Successfully!');
        return redirect()->back();
        
    }

    function resume_task($id) {
        $task=Task::find($id);
        $task->control=0;
        $task->save();
        
        session()->flash('resume','The task has been resumed Successfully');
        return redirect()->back();
    }

    function pause_task($id) {
        $task=Task::find($id);
        $task->control=1;
        $task->save();

        session()->flash('pause','The task has been paused Successfully');
        return redirect()->back();
    }

    function task_issue() {
        $userid=auth()->user()->id;
        $issue=TaskCompletion::join('tasks','tasks.id','=','task_completions.task_id')->where('task_completions.user_id',$userid)->Where('task_completions.issue',1)->get();
        // dd($issue);
        $data=compact('issue');
        return view('user.task-issue')->with($data);
    }

    function find_task_completion($id) {
       $task= TaskCompletion::select('users.id AS users_id','users.name','tasks.id','tasks.task_title','tasks.task_description','tasks.task_amount','task_completions.task_completion_id','task_completions.task_image','task_completions.approved','task_completions.task_id','task_completions.issue')->join('tasks','tasks.id','=','task_completions.task_id')->join('users','users.id','=','task_completions.user_id')->where('task_completions.task_id',$id)->where('task_completions.approved',0)->where('task_completions.issue',0)->get();
       $task_title=Task::find($id);
        
        $data=compact('task','task_title');
        return view('admin.find-task-completion')->with($data);
    }

    function find_user($id) {
        $user=User::find($id);
        $taskCompletions= TaskCompletion::select('users.id AS users_id','users.name','tasks.id','tasks.task_title','tasks.task_description','tasks.task_amount','task_completions.task_completion_id','task_completions.task_image','task_completions.approved','task_completions.task_id','task_completions.issue')
        ->join('tasks','tasks.id','=','task_completions.task_id')
        ->join('users','users.id','=','task_completions.user_id')
        ->where('task_completions.user_id',$user->id)
        ->where('task_completions.approved',0)
        ->where('task_completions.issue',0)
        ->get();

        $transactions=WithdrawalRecord::select('payment_methods.*','withdrawal_records.*','users.*','withdrawal_records.id AS withdrawal_record_id')
        ->join('users','users.id','=','withdrawal_records.user_id')
        ->join('payment_methods','payment_methods.id','=','withdrawal_records.payment_method_id')
        ->where('withdrawal_records.user_id',$user->id)
        ->where('withdrawal_records.status',0)
        ->where('withdrawal_records.issue',0)
        ->get();
        // dd($taskCompletions);
        $total_task_completed=TaskCompletion::where('user_id',$id)->count();
        // dd($total_task_completed);
        $count_withdrawals = WithdrawalRecord::sum('withdrawal_amount');
        $total_withdrawal_requests=WithdrawalRecord::where('user_id',$id)->count();
        $current_task_issue=TaskCompletion::where('user_id',$id)->sum('issue');
        // dd($current_task_issue);
        return view('admin.find-user',['taskCompletions'=>$taskCompletions, 'user'=>$user,'transactions'=>$transactions,'count_withdrawals'=>$count_withdrawals,'total_withdrawal_requests'=>$total_withdrawal_requests,'total_task_completed'=>$total_task_completed,'current_task_issue'=>$current_task_issue]);
    }

    function withdrawal_request($id) {
        $withdrawal_records=WithdrawalRecord::join('payment_methods','payment_methods.id','=','withdrawal_records.payment_method_id')
        ->join('users','users.id','=','withdrawal_records.user_id')
        ->where('withdrawal_records.user_id',$id)
        ->get();
        // ->where('withdrawal_records.status',1)
        // ->where('withdrawal_records.issue',0)
        // dd($withdrawal_records);
        // $count_withdrawals = WithdrawalRecord::sum('withdrawal_amount');
        // dd($count_withdrawals);
        return view('admin.user-withdrawal-requests',['withdrawal_records'=>$withdrawal_records]);
    }

    function tasky_users() {
        $tasky_users=User::all();
        // dd(0);
        return view('admin.tasky-users',['tasky_users'=>$tasky_users]);
    }

    function role_admin($id) {
        $change_role=User::find($id);
        $change_role->is_admin=0;
        $change_role->save();
        return redirect()->back();
    }

    function role_user($id) {
        $change_role=User::find($id);
        $change_role->is_admin=1;
        $change_role->save();
        return redirect()->back();
    }

    function payment_method() {

        $bank_accounts=PaymentMethod::where('user_id',auth()->user()->id)->get();

        $data=compact('bank_accounts');
        return view('user.payment-methods')->with($data);
    }

    function add_payment_method(Request $request) {
        $request->validate([
            'bank_name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|min:9|max:15',
        ]);

        $payment_method= new PaymentMethod;
        $payment_method->bank_name=$request['bank_name'];
        $payment_method->account_name=$request['account_name'];
        $payment_method->account_number=$request['account_number'];
        $payment_method->user_id=auth()->user()->id;
        $payment_method->save();
        
        session()->flash('payment-method-added','The payment method has been added Successfully');
        return redirect()->back();
    }

    function Withdrawals() {
        $transactions=WithdrawalRecord::select('payment_methods.*','withdrawal_records.*','users.*','withdrawal_records.id AS withdrawal_record_id')->join('users','users.id','=','withdrawal_records.user_id')->join('payment_methods','payment_methods.id','=','withdrawal_records.payment_method_id')->where('withdrawal_records.status',0)->where('withdrawal_records.issue',0)->get();
        return view('admin.Withdrawals',['transactions'=>$transactions]);
    }

    function withdrawal_records() {
        $user=auth()->user()->id;
        $task_completion_issue=TaskCompletion::where('user_id',$user)->get();
        $withdrawal_records=WithdrawalRecord::select('payment_methods.*','withdrawal_records.*','withdrawal_records.created_at AS withdrawal_date')->join('payment_methods','payment_methods.id','=','withdrawal_records.payment_method_id')->where('withdrawal_records.user_id',$user)->get();

        return view('user.withdrawal-records',['withdrawal_records'=>$withdrawal_records]);
    }

    function Withdrawal_done(Request $request) {
        $withdrawal_record=WithdrawalRecord::find($request['withdrawal_id']);
        $withdrawal_record->status=1;
        $withdrawal_record->save();

        $user=User::find($withdrawal_record->user_id);
        $user_updated_amount=$user->amount-$withdrawal_record->withdrawal_amount;
        $user->amount=$user_updated_amount;
        $user->save();

        session()->flash('Withdrawals_done','Withdrawal has been done Successfully');
        return redirect()->back();
    }

    function Withdrawal_issue(Request $request) {
        $withdrawal_record=WithdrawalRecord::find($request['withdrawal_id']);
        $withdrawal_record->issue=1;
        $withdrawal_record->save();

        session()->flash('Withdrawals_issue','Withdrawal has been done Successfully');
        return redirect()->back();
    }

    function resend_request($id) {
        $withdrawal_record=WithdrawalRecord::find($id);
        $withdrawal_record->issue=0;
        $withdrawal_record->save();

        return redirect()->back();
    }

    function card_edit($id) {
        $payment_method=PaymentMethod::find($id);
        $data=compact('payment_method');

        return view('user.card-edit')->with($data);
    }

    function card_update(Request $request) {
        $request->validate([
            'bank_name'=>'required',
            'account_name'=>'required',
            'account_number'=>'required|max:24',
        ]);

        $payment_method=PaymentMethod::find($request['method_id']);
        $payment_method->fill($request->only(['bank_name', 'account_name','account_number']));
        $payment_method->save();

        session()->flash('card_updated','Your card details has been updated Succssfully.');
        return redirect()->back();
    }

    function restriction_bann($id) {
        $user_bann=User::find($id);
        $user_bann->restriction=1;
        $user_bann->save();

        session()->flash('user-banned','Your User has been Banned Succssfully.');
        return redirect()->back();
    }

    function restriction_unbann($id) {
        $user_bann=User::find($id);
        $user_bann->restriction=0;
        $user_bann->save();

        session()->flash('user-unbanned','Your User has been Unbanned Succssfully.');
        return redirect()->back();
    }

    function review_user_withdrawal($id) {
        $user=User::find($id);
        $review_user_withdrawals=WithdrawalRecord::select('payment_methods.*','withdrawal_records.*','users.*','withdrawal_records.id AS withdrawal_record_id')
        ->join('users','users.id','=','withdrawal_records.user_id')
        ->join('payment_methods','payment_methods.id','=','withdrawal_records.payment_method_id')
        ->where('withdrawal_records.user_id',$user->id)
        ->where('withdrawal_records.status',0)
        ->where('withdrawal_records.issue',0)
        ->get();

        return view('admin.review-user-withdrawal',['review_user_withdrawals'=>$review_user_withdrawals]);
    }

    function contact_us(Request $request) {
        // dd($request->all());
        ContactUs::create($request->all());

        // session()->flash('query','Your Message has been deliver Successfully.');
        return redirect()->back();
    }

    function contactus() {
        // echo "hello WOrld";
        // die;
        $queries=ContactUs::all();
        // dd($queries);
        return view('admin.queries',['queries'=>$queries]);
    }

    // function user_withdrawal_records_with_task_completions() {
    //     $withdrawal_record=WithdrawalRecord::with('user_withdrawal_records_with_task_completions')->get();
    //     dd($withdrawal_record);
    // }
}
