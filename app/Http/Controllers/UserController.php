<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\ContactForm;
use App\Models\Mails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {        
        return view('users.index');
    }
    public function create()
    {   
        $data['country']=DB::table('countries')->get();
        return view('users.create',$data);
    }
    public function SendData(Request $request)
    {
        $this->validate($request,[
            'contact'=>'required|email',
            'subject'=>'required',
            'body'=>'required|min:5',
        ]);        
        $mails = New Mails();
        $mails->contact=$request->input('contact');
        $mails->subject=$request->input('subject');
        $mails->body=$request->input('body');
        $mails->user_id=Auth::user()->id;
        $mails->save();
        dispatch(new SendEmail($mails))->delay(now()->addMinutes(1));       
        return redirect()->back()->with('success', 'Thanks for send Email!');
    }
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required|email',
        //     'phone'=>'required',
        //     'dni'=>'required',
        //     //'code_of_city'=>'required',
           // 'date_of_birth'=>'required',
        //     'password'=>'required|confirmed',
        // ]);
        dd($request->all());
        $users= New User();
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->phone=$request->input('phone');
        $users->dni=$request->input('dni');
        $users->code_of_city=$request->input('code_of_city');
        $users->date_of_birth= $request->input('date_of_birth');
        $users->password=Hash::make($request->input('password'));
        $users->save();
        return redirect()->route('users.index')->with('success', 'User created succesfully.');
        //return redirect()->back()->with('success', 'User created succesfully');
    }
    public function getDataUserMail()
    {
        $getData = DB::table('mails')
            ->leftjoin('users','mails.user_id','=','users.id')
            ->select('users.name','mails.contact','mails.subject','mails.body')
            ->get();       
        return view('users.usersEmails', compact('getData'));
    }
    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //     'name'=>'required',           
        //     'phone'=>'required',            
        //     'code_of_city'=>'required',
        //     // 'date_of_birth'=>'required',
        //     'password'=>'required|confirmed',
        // ]);
        // $user->update($request->all());  
        $users = User::find($id);   
        $users->name        = $request->input('name');
        $users->phone        = $request->input('phone');
        $users->code_of_city       = $request->input('code_of_city');
        $users->password = Hash::make($request->input('password'));
        $users->save();  
        // return redirect('users')->with('success', 'Profile updated.'); 
        return redirect()->route('users.index')->with('success', 'Profile updated.');
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('users.edit',compact('users'));
    }
    public function datatables()
    {        
        return Datatables::of(User::select('id','name','email','dni','phone','code_of_city','date_of_birth'))
            ->editColumn('date_of_birth',function(User $user){                
                return Carbon::parse($user->date_of_birth)->age;
            })     
            ->addColumn('btn','users.datatable.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }
    public function datatablesMails()
    {        
        return Datatables::of(DB::table('mails')
            ->leftjoin('users','mails.user_id','=','users.id')
            ->select('mails.id','users.name','mails.contact','mails.subject','mails.body'))               
            ->addColumn('btn','users.datatable.btnMails')
            ->rawColumns(['btn'])
            ->toJson();
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success', 'User Delete!');
    }
    public function getstate(Request $request)
    {
        $cid=$request->post('cid');
        $state=DB::table('states')->where('country_id',$cid)->get();
        $html='<option value=""></option>';
        foreach ($state as $list) {
            $html.='<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }
    public function getcity(Request $request)
    {
        $sid=$request->post('sid');
        $city=DB::table('cities')->where('state_id',$sid)->get();
        $html='<option value=""></option>';
        foreach ($city as $list) {
            $html.='<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;
    }
}
