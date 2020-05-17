<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;
use App\Shop;
use App\Review;
use DateTime;

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
    public function index()
    {
        return view('home');
    }

    public function member_dashboard(){
      $users = array();
      return view('members.member_dashboard', compact('users'));
    }

    public function owner_dashboard(){
      $users = array();
      return view('owners.owner_dashboard', compact('users'));
    }

    public function member_view_shops($id){
      $shops = Shop::where('user_id', $id)->orderBy('updated_at','desc')->get();
      return view('members.member_view_shops', compact('shops', 'id'));
    }

    public function member_view_reviews($id){
      $reviews = DB::table('reviews')
      ->leftJoin('shops', 'shops.id', '=', 'reviews.shop_id')
      ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
      ->select('reviews.*', 'shops.shop_name', 'users.name', 'users.lname')
      ->where('shops.user_id', $id)
      ->orderBy('reviews.updated_at', 'desc')
      ->get();

      return view('members.member_view_reviews', compact('reviews'));
    }

    public function store_shop_info(Request $request){
      $rules = array(
        'user_id' => 'required',
        'shop_name' => 'required',
        'shop_details' => 'required',
        'coffee_price' => 'required',
        'status' => 'required',
        'shop_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
      );
      $error = Validator::make($request->all(), $rules);
      if($error->fails())
        return response()->json(['errors' => $error->errors()->all()]);
      else{
        if($request->hasFile('shop_image')){
         $image = $request->file('shop_image');
         $name = $image->getClientOriginalName();
         $imageName = time().'_'.$name;
         $image->move(public_path('images'), $imageName);
       }
       else{
         $imageName="";
       }

       $form_data = array(
         'user_id' => $request->user_id,
         'shop_name' => $request->shop_name,
         'shop_details' => $request->shop_details,
         'coffee_price' => $request->coffee_price,
         'status' => $request->status,
         'shop_image' => $imageName,
         'listing_date' => date("Y-m-d H:i:s"),
       );
       $shop = Shop::create($form_data);
       return response()->json($shop);
     }
   }

   public function update_shop_info(Request $request){
     $rules = array(
       'edit_shop_name' => 'required',
       'edit_shop_details' => 'required',
       'edit_coffee_price' => 'required',
       'edit_status' => 'required'
     );
     $error = Validator::make($request->all(), $rules);
     if($error->fails()){
       return response()->json(['errors' => $error->errors()->all()]);
     }else{
      if($request->hasFile('edit_course_image')){
        $file=$request->file('edit_course_image')->store('public');
        $image=Storage::get($file);
        Storage::put($file,$image);
        $image_path=explode('/', $file);
        $image_path=$image_path[1];
        $course = Course::find($request->edit_fid);
        $course->course_image = $image_path;
        $course->save();
      }
      if($request->hasFile('edit_shop_image')){
       $image = $request->file('edit_shop_image');
       $name = $image->getClientOriginalName();
       $imageName = time().'_'.$name;
       $image->move(public_path('images'), $imageName);
       $sh = Shop::find($request->edit_fid);
       $sh->shop_image = $imageName;
       $sh->save();
     }

      $shop = Shop::find($request->edit_fid);
      $shop->shop_name = $request->edit_shop_name;
      $shop->shop_details = $request->edit_shop_details;
      $shop->coffee_price = $request->edit_coffee_price;
      $shop->status = $request->edit_status;
      $shop->save();

      return response()->json($shop);
    }
   }

   public function delete_shop_info(Request $request)
   {
     $deleted = Shop::find($request->id)->delete();
     return response()->json("Shop Deleted Succssfully", 200);
   }

   public function delete_review(Request $request)
   {
     $deleted = Review::find($request->id)->delete();
     return response()->json("Review Deleted Succssfully", 200);
   }

   public function approve_link_review(Request $request)
   {
     $review = Review::find($request->id);
     $review->review_status = 'approved';
     $review->save();
     return response()->json("Review approved succssfully", 200);
   }
 }
