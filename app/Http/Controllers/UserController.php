<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Session;
use DB;

class UserController extends Controller
{
    public function index(){

        $user_type = Auth::user()->user_type;
        $id = Auth::user()->id;

        if($user_type == '1'){
            $userList = User::all();
        }else{
            $userList = User::where('id', '=', $id)->get();  
        }  
        return view('users.user_list',['userList' => $userList]);
    }

    public function create(){
        return view('users.add_user'); 
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request){
        
        $user_info = new User();
        
        $user_info->name = $request->name;
        $email = $user_info->email = $request->email;
        $user_info->mobile = $request->mobile;
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        if($password == $confirm_password){

            $user_info->password = bcrypt($password);
            $user_info->user_type = $request->user_type;
        
            $value = User::where('email', '=', $email)->first();  

            if ($value === null) {
                $user_info->save();
                return redirect('/add-user')->with('successMsg', 'Save Successfully.'); 
            }else{
                return redirect('/add-user')->with('errorMsg', 'Sorry Duplicate entry.'); 
            }
        } else {
            return redirect('/add-user')->with('errorMsg', 'Sorry Password Not Matching.'); 
        } 

    }
}
