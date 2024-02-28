<?php

use App\Models\Role;
use App\Models\User;
use App\Models\permissions;
use App\Models\Permission_assigned;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthManager;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\contactController;
use Illuminate\Auth\AuthManager as AuthAuthManager;
use Illuminate\Auth\Middleware\Authorize;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return view('landing');
})->name('landing');

Route::get('/login',[AuthManager::class, 'login'])->name('login');

Route::post('/login',[AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/signup',[AuthManager::class,'signup'])->name('signup');

Route::post('/signup',[AuthManager::class, 'signupPost'])->name('signup.post');

Route::get('/logout',[AuthManager::class,'logout'])->name('logout');
Route::get('/home', function() {
    $roles = Role::all();
    $users = User::all();
    $permissions = permissions::all();
    $authenticatedUserId = Auth::id();
    $roleName = Auth::user()->userType;
    $roleId = Role::where('role_name', $roleName)->value('role_id');
    $assigned_permissions = Permission_assigned::where('role_id', $roleId)->get();
    return view('content', compact('roles', 'users', 'authenticatedUserId', 'permissions', 'assigned_permissions'));
})->name('home');

Route::get('/website',function (){
    $roles = Role::all();
    $users = User::all();
    $permissions = permissions::all();
    $authenticatedUserId = Auth::id();
    $roleName = Auth::user()->userType;
    $roleId = Role::where('role_name', $roleName)->value('role_id');
    $assigned_permissions = Permission_assigned::where('role_id', $roleId)->get();
    return view('website',compact('roles', 'users', 'authenticatedUserId', 'permissions', 'assigned_permissions'));
})->name('webiste');

Route::get('/seeder',function(){
    Artisan::call('db:seed', ['--class' => 'userseeder']);
    $credentials = [
        'email' => 'devkakkar82@gmail.com', 
        'password' => '123456',
    ];
    Auth::attempt($credentials);
    return 'TRUE';
})->name('seeder');
Route::get('/manageRole',function()
{
    $roles = Role::all();
    $users=User::all();
    $permissions=permissions::all();
    $authenticatedUserId = Auth::id();
    $permissionsGroupedByRole = permissions::with('role')->get()->groupBy('role_id');
    return view('manageRole',compact('roles','users','authenticatedUserId','permissions','permissionsGroupedByRole'));
})->name('manage-role');
Route::post('/addRole',[AuthManager::class,'addRole'])->name('addRole');
Route::post('/addPermission',[AuthManager::class,'addPermission'])->name('addPermission');
Route::get('/user',[AuthManager::class,'getUserDetails'])->name('getUserDetails');
Route::get('/show-permissions',[AuthManager::class,'getUserPermissions'])->name('getUserPermissions');
Route::any('/update_permissions',[AuthManager::class,'update_permissions'])->name('update_permissions');
Route::get('addPermission',[AuthManager::class,'addPermission'])->name('addPermission');