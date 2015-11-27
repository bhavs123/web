<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use App\Models\State;
use App\Models\Product;
use App\Models\CatalogImage;
use App\Http\Controllers\Controller;
use Route;
use Input;
use Auth;
use Session;
use Hash;
use DB;

class UsersController extends Controller {

    public function login() {
        return view(Config('constants.frontendLoginView') . '.login');
    }

    public function register() {
        $country = Country::all();
        $state = State::all();
        return view(Config('constants.frontendLoginView') . '.register', compact('country', 'state'));
    }

    public function saveCustomer() {
        // dd('sdfasfsf');
        // dd(Input::all());
        $register_home = Input::get('register_home');
        $user = User::create(Input::except('password'));

        $user->password = Hash::make(Input::get('password'));
        $user->update();
        if($register_home == 'register_home')
        {
            return redirect()->route('login');
        }  else {
        $email = Input::get('email');
        $userDetails = User::where('email', "=", $email)->get()->first();
            $userData = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        if (Auth::attempt($userData, true)) {


            $user = User::with('roles')->find($userDetails->id);
            Session::put('loggedinUserId', $userDetails->id);
            Session::put('userName', $userDetails->first_name . " " . $userDetails->last_name);


           return redirect()->back();
        }
            
        }
       // return view(Config('constants.frontendLoginView') . '.login');
    }

    public function isUniqueValue() {

        $id = Input::get('id');

        $property = Input::get('property');

        $value = Input::get('value');


        //$user = DB::table($id)->where($property, $value)->get();
        $user = User::where('email', '=', $value)->get();

        $result = count($user);
        if ($result == 1)
            return 1;
        else
            return 0;
    }

    public function checkLogin() {
        $email = Input::get('email');
        $userDetails = User::where('email', "=", $email)->get()->first();
        //  dd($user_type); 
        $userData = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        if (Auth::attempt($userData, true)) {


            $user = User::with('roles')->find($userDetails->id);
            Session::put('loggedinUserId', $userDetails->id);
            Session::put('userName', $userDetails->first_name . " " . $userDetails->last_name);


            return redirect()->route('home');
        } else {

            //echo "false";
            Session::flash('invalidUser', 'Invalid username or Password');
            return redirect()->route('login');
        }
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect()->route('home');
    }

    public function myProfile() {
        $userId = Session::get('loggedinUserId');
        $userDetails = User::where('id', "=", $userId)->get()->toArray();
        $country = Country::all();
        $state = State::all();
        return view(Config('constants.frontendLoginView') . '.myprofile', compact('userDetails', 'country', 'state'));
    }

    public function saveProfile() {
        $userId = Session::get('loggedinUserId');

        $userInfo = User::find($userId);
        $userInfo->first_name = Input::get('firstName');
        $userInfo->last_name = Input::get('lastName');
        $userInfo->email = Input::get('cemail');
        $userInfo->country = Input::get('country');
        $userInfo->state = Input::get('state');
        $userInfo->location = Input::get('address');
        $userInfo->contact_no = Input::get('mobile');
        $userInfo->update();

        return redirect()->back()->with('updateProfile', 'Profile Updated Successfully');
    }

    public function updatePassword() {

        $userId = Session::get('loggedinUserId');
        $userDetails = User::where('id', "=", $userId)->get()->toArray();

        return view(Config('constants.frontendLoginView') . '.updatepassword', compact('userDetails'));
    }

    public function saveUpdatePassword() {
        $userId = Session::get('loggedinUserId');
        $getExistingPwd = User::find($userId)->password;
        $oldPwd = Input::get('old_password');
        $newPwd = Input::get('new_password');
        $confPwd = Input::get('confirm_password');
        $chkPassword = Hash::check($oldPwd, $getExistingPwd);
        if ($newPwd == $confPwd) {
            if ($chkPassword == true) {
                $update = User::find($userId);
                $update->password = Hash::make($newPwd);
                $update->Update();
                Session::flash("ChangeSuccess", "Password Changed Successfully");
            } else {
                Session::flash("ChangeError", "Incorrect old password");
            }
        } else {
            Session::flash("notMatch", "New Password and Confirm Password does not match");
        }

        return redirect()->back();
    }

    public function orderDetails() {
        $userId = Session::get('loggedinUserId');
        $userDetails = User::where('id', "=", $userId)->get()->toArray();

        $orderDetails = DB::table('orders')
                        ->Join('has_products', 'orders.id', '=', 'has_products.order_id')
                        ->Join('products', 'has_products.prod_id', '=', 'products.id')
                        ->Join('order_status', 'orders.order_status', '=', 'order_status.id')
                        ->select('orders.id','orders.cart','order_status.order_status','order_status.id as statusId', 'orders.created_at', DB::raw('SUM(has_products.price) as totalOrderAmt'), DB::raw("group_concat(products.product) as productName"), DB::raw("group_concat(products.id) as productId"), DB::raw("group_concat(has_products.qty) as productQty"), DB::raw("group_concat(has_products.uprice) as productUprice"), DB::raw("group_concat(has_products.price) as productPrice"))
                        ->groupBy('orders.id')
                        ->where('user_id', "=", $userId)->get();

//dd($orderDetails);
        return view(Config('constants.frontendLoginView') . '.orderdetails', compact('orderDetails', 'userDetails'));
    }
    public function cancelOrder() {
        
        $orderId = Input::get("orderId");
       // dd($orderId);
        $orderInfo = Order::find($orderId);
        $orderInfo->order_status = '6';
        $orderInfo->update();
       return $orderInfo;
    }

}

?>