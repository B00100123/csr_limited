<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use DB;
use App\User;
use App\Shop;
use DateTime;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('admin');
  }

  //////////////// dashboard ///////////////////

  public function admin_dashboard()
  {
      return view('admins.dashboard');
  }

  //////////////// dashboard end ///////////////////

  //////////////// users ///////////////////

  public function view_users()
  {
    // $users = User::orderBy('updated_at','DESC')->paginate(10);
    $users = DB::table('users')->orderBy('updated_at', 'DESC')->paginate(10);

    if (request()->ajax()) {
      $view = view('admins.users_listing', ['users' => $users]);
      return Response()->json(['status' => 'ok', 'listing' => $view->render()]);
    }
    return view('admins.view_users', compact('users'));
  }

  public function store_user_info(Request $request){
    $rules = array(
      'name' => 'required|string',
      'email' => 'required|string|email|max:191|unique:users',
      'password' => ['required', 'min:4']
    );

    $error = Validator::make($request->all(), $rules);
    if($error->fails()){
      return response()->json(['errors' => $error->errors()->all()]);
    }else{
      $id = uniqid();

      $form_data = array(
        'id' => $id,
        'name' => $request->name,
        'lname' => $request->lname,
        'username' => 'user',
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'status' => $request->status,
        'user_type' => $request->user_type,
        'user_created_at' => date("Y-m-d H:i:s")
      );

      $user = User::create($form_data);
      return response()->json($user);
    }
  }

  public function update_user_info(Request $request){
    $rules = array(
      'edit_name' => 'required|string',
      'edit_email' => 'required|string|email|max:191'
    );
    $error = Validator::make($request->all(), $rules);
    if($error->fails()){
      return response()->json(['errors' => $error->errors()->all()]);
    }
    else{
      $user = User::find($request->edit_fid);
      $user->name = $request->edit_name;
      $user->lname = $request->edit_lname;
      $user->email = $request->edit_email;
      $user->phone = $request->edit_phone;
      $user->user_type = $request->edit_user_type;
      $user->status = $request->edit_status;
      $user->save();

      return response()->json($user);
    }
  }

  public function delete_user_info(Request $request)
  {
    $deleted = User::find($request->id)->delete();
    return response()->json("User Deleted Succssfully", 200);
  }



  //////////////// users end ///////////////////
  //////////////// shops ///////////////////
  public function view_shops(){
    $id = Auth::user()->id;
    $shops = Shop::orderBy('updated_at','desc')->get();
    return view('admins.view_shops', compact('shops', 'id'));
  }

  public function view_reviews(){
    $reviews = DB::table('reviews')
    ->leftJoin('shops', 'shops.id', '=', 'reviews.shop_id')
    ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
    ->select('reviews.*', 'shops.shop_name', 'users.name', 'users.lname')
    ->orderBy('reviews.updated_at', 'desc')
    ->get();
    return view('admins.view_reviews', compact('reviews'));
  }
  //////////////// shops end ///////////////////
}
