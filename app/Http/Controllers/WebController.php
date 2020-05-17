<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;
use App\Shop;
use App\Review;
use DateTime;

class WebController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest')->except('logout');
  }

  public function index(){
    $shops = Shop::orderBy('updated_at','desc')->get();
    return view('website.home', compact('shops'));
  }

  public function login($type){
    return view('auth.login', compact('type'));
  }

  public function add_review($id){
    $shop = Shop::find($id);
    $reviews = DB::table('reviews')
    ->leftJoin('shops', 'shops.id', '=', 'reviews.shop_id')
    ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
    ->select('reviews.*', 'shops.shop_name', 'shops.coffee_price', 'users.name', 'users.lname', 'users.email')
    ->where('shops.id', $id)
    ->where('reviews.review_status', 'approved')
    ->orderBy('reviews.updated_at', 'desc')
    ->get();

    return view('website.add_review', compact('shop', 'reviews'));
  }

  public function store_review(Request $request){
    $rules = array(
      'star_rating' => 'required',
      'review_details' => 'required'
    );

    $error = Validator::make($request->all(), $rules);
    if($error->fails()){
      return response()->json(['errors' => $error->errors()->all()]);
    }else{

      $email_address = $request->email_address;
      $user = User::where('email', $email_address)->first();
      if($user != null){
        $form_data = array(
          'user_id' => $user->id,
          'shop_id' => $request->shop_id,
          'star_rating' => $request->star_rating,
          'review_details' => $request->review_details,
          'review_member_type' => 'paid',
          'review_date' => date("Y-m-d H:i:s")
        );
      }else {
        $form_data = array(
          'user_id' => null,
          'shop_id' => $request->shop_id,
          'star_rating' => $request->star_rating,
          'review_details' => $request->review_details,
          'review_member_type' => 'unpaid',
          'review_date' => date("Y-m-d H:i:s")
        );
      }

      $review = Review::create($form_data);
      return response()->json($review);
    }
  }

  public function all_reviews(){
    $reviews = DB::table('reviews')
    ->leftJoin('shops', 'shops.id', '=', 'reviews.shop_id')
    ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
    ->select('reviews.*', 'shops.id as shop_id', 'shops.shop_name', 'shops.coffee_price', 'users.name', 'users.lname', 'users.email')
    ->where('reviews.review_status', 'approved')
    ->orderBy('reviews.updated_at', 'desc')
    ->get();
    return view('website.all_reviews', compact('reviews'));
  }
}
