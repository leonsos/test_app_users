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

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
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
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'dni'=>'required',
            'code_of_city'=>'required',
            // 'date_of_birth'=>'required',
            'password'=>'required|confirmed',
        ]);
        $users= New User();
        $users->name=$request->input('name');
        $users->email=$request->input('email');
        $users->phone=$request->input('phone');
        $users->dni=$request->input('dni');
        $users->code_of_city=$request->input('code_of_city');
        $users->date_of_birth= $request->input('date_of_birth');
        $users->password=Hash::make($request->input('password'));
        $users->save();
        return redirect()->back()->with('success', 'User created succesfully');
    }
    public function getDataUserMail()
    {
        $getData = DB::table('mails')
            ->leftjoin('users','mails.user_id','=','users.id')
            ->select('users.name','mails.contact','mails.subject','mails.body')
            ->get();
        //dd($getData);
        return view('users.usersEmails', compact('getData'));
    }
}
