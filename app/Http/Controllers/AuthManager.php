<?php

namespace App\Http\Controllers;

use App\Models\Permission_assigned;
use App\Models\Role;
use App\Models\User;
use App\Models\permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
     function login(){
        return view('login');
    }

    function signup(){
        $roles = Role::all();
        return view('signup',compact('roles'));
    }
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) 
        { 
            if ((strtolower(auth()->user()->userType)== 'admin')||(strtolower(auth()->user()->userType) == 'manager')||(strtolower(auth()->user()->userType) == 'sub-admin')) 
            {
                return redirect()->route('home');
            } 
            else if ((auth()->user()->userType) == 'user') {
                return redirect()->route('website');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    function signupPost(Request $request){
        $request->validate([
            'user_type'=>'required',
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'mobile'=>'required',
            'gender'=>'required',
            'dob'=>'required'
        ]);
        $fileName=time()."dev.".$request->file('image')->getClientOriginalExtension();
        $path=$request->file('image')->storeAS('public/uploads',$fileName);
        $data['userType']=$request->user_type;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['dob']=$request->dob;
        $data['mobile']=$request->mobile;
        $data['gender']=$request->gender;
        $data['image']=$path;
        $user=User::create($data);
        if($user){
            return redirect(route('login'))->with('success', 'SignUp Successful. Please login to continue.');
        } else {
            return redirect(route('signup'))->with('error', 'Signup Failed. Please try again.');
        }
    }
    function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
    function addRole(Request $request){
        $data['role_id'] = $request->role_id;
        $data['role_name']=$request->role_name;
        Role::create($data);
        return response()->json(['message' => 'Role added successfully']);
    }
    function addPermission(Request $request){
        $data['permission_id'] = $request->permission_id;
        $data['permission_name'] = $request->permission_name;
        $data['role_name']=$request->role_name;
        permissions::create($data);
        return response()->json(['message' => 'Role added successfully']);
    }
    public function getUserDetails(Request $request)
    {
        try {
            $id = $request->user_id;
            $user = User::find($id); 
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while retrieving user details'], 500);
        }
    }
    public function getUserPermissions(Request $request)
    {
        $role_name=$request->role_name;
        $permissions = permissions::where('role_name', $role_name)->get();
        return response()->json($permissions);
    }
    public function update_permissions(Request $request){
        $data['permission_id']=$request->permission_Id;
        $data['role_id']=$request->role_id;
        $permissions=Permission_assigned::create($data);
        if(!$permissions){
            return response()->json('Sorry Permission cant be assigned');
        }
        else{
            return response()->json($permissions);
        }
    }
}
