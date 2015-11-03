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

class UsersController extends Controller {
    
    public function login() {
        return view(Config('constants.frontendLoginView') . '.login');
    }
     public function register() {
       $country = Country::all();
       $state = State::all();
       return view(Config('constants.frontendLoginView') . '.register',  compact('country','state'));
    }
    
    public function saveCustomer(){
      // dd('sdfasfsf');
      //     dd(Input::all());
       $user = User::create(Input::except('password'));
       
       $user->password=Hash::make(Input::get('password'));
       $user->update();
	return view(Config('constants.frontendLoginView') . '.login');
    }
	
    public function isUniqueValue() {
 
    $id = Input::get('id');
 
    $property = Input::get('property');
   
    $value = Input::get('value');
    
 
    //$user = DB::table($id)->where($property, $value)->get();
    $user = User::where('email', '=' , $value)->get();
   
    $result = count($user);
    if($result == 1)
        return 1;
    else
        return 0;
 
  }
	public function checkLogin()
	{
             $email = Input::get('email'); 
             $userDetails = User::where('email', "=", $email)->get()->first();
          //  dd($user_type); 
             $userData = [
                 'email' => Input::get('email'),
                'password' => Input::get('password')
            ];
             
              if(Auth::attempt($userData, true)) {
            
           
            $user = User::with('roles')->find($userDetails->id);
            Session::put('loggedinUserId', $userDetails->id);
            Session::put('userName', $userDetails->first_name." ".$userDetails->last_name);
            

            return redirect()->route('home'); 
        } else {
            
            //echo "false";
            Session::flash('invalidUser', 'Invalid username or Password');
            return redirect()->route('/login');
        }
	}
        
        
        public function logout()
        {
         Auth::logout();
         Session::flush();
         return redirect()->route('/logout');
    }

}
?>