<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
use Redirect;
use Validator;
use App\User;
use App\Role;
use DateTime;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/home';
    public $path='';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      $Input = $request->all();
      $roles = Role::where('role', $Input['role'])->first();
      $arr = array('username' => $request->username, 'password' => $request->password, 'role_id' => $roles->id);
      $credentials = $arr;

      $rules = array(
        'username' => 'required',
        'password' => 'required|min:4'
      );

      $validator = Validator::make($Input, $rules);

      if ($validator->fails()) {
        return Redirect::back()->withErrors($validator);
      }
      else {
        $role         = $Input['role'];
        $username         = $Input['username'];
        $password      = $Input['password'];
        $password      = Hash::make($password);

        $role = Role::where('role', $role)->first();

        $user_detail = User::where('username', $username)->where('role_id', $role->id)->first();
        // dd($user_detail);
        if(!$user_detail){
          return Redirect::back()->with('error','Invalid Username');
        }
        else
        {
          $hash1 = $user_detail->password; // A hash is generated
          $hash2 = Hash::make($Input['password']);
          $password_check = Hash::check($Input['password'], $hash1) && Hash::check($Input['password'], $hash2);
          if($password_check === false){
            return Redirect::back()->with('error','Invalid Password');
          }
          else {
            $user = User::where('username', $username)->where('role_id', $role->id)->where('status', 'activated')->first();
            if(!$user) {
              return Redirect::back()->with('error','Invalid Account');
            }
            else {
              $auth = Auth::attempt($credentials);
              if($user->role_id == 1){
                return Redirect::to('admin/dashboard');
              }elseif($user->role_id == 2){
                return Redirect::to('member/dashboard');
              }elseif($user->role_id == 3){
                return Redirect::to('owner/dashboard');
              }
            }
          }
          return Redirect::back()->with('error','Invalid Username / Password');
        }
      }
    }
}
