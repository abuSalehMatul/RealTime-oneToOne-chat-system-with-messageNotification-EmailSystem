<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use Session;
use App\HomePageSetup;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\verifymail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
   public function registeruser(Request $request){
    $user=new User;         
    $user->name=$request->name;
    $user->email=$request->email;              
    $user->avatar=$request->email;
    $user->location=$request->location;
    $user->phone_no=$request->phone;
    $user->paypal_email=$request->paypal_email;
    $user->password=bcrypt($request->password);
    $user->verify_tokekn=Str::random(40);
    $user->verify_status=0;
     $user->save();
    $thisuser=User::find($user->id);
   // return $thisuser['email'];
    $this->sendverifyemail($thisuser);
    return $user;

  }
   public function sendverifyemail($thisuser){
    Mail::to($thisuser['email'])->send(new verifymail($thisuser));
  }
 
  public function verified_email($email,$verify_tokekn){
      $user=User::where(['email'=>$email,'verify_tokekn'=>$verify_tokekn])->first();
      if($user){
      $t=time();
      $date = date("Y-m-d",$t);
      User::where(['email'=>$email,'verify_tokekn'=>$verify_tokekn])->update(['verify_status'=>1,'verify_tokekn'=>NULL,'email_verified_at'=>$date]);
      Session::flush();
      return Redirect::to('/home');
      }else{
        return 'user NOT found';
      }
  }
   public function registeruserwithout(Request $request){
    $user=new User;         
    $user->name=$request->name;
    $user->email=$request->email;              
    $user->avatar=$request->email;
    $user->location=$request->location;
    $user->phone_no=$request->phone;
    $user->paypal_email=$request->paypal_email;
    $user->password=bcrypt($request->password);
    $user->verify_tokekn=Str::random(40);
    $user->verify_status=0;
    $user->save();
    return $user;
  }
  public function showProfile()
  {
    return view('pages.profile.index', array('user' => Auth::User()) );
  }
  public function showProfilewithid($id){
    $user=User::find($id);
    return view('pages.profile.index', array('user' => $user) );
  }
    public function userProfile()
    {
        return view('pages.showprofile.index', array('user' => Auth::User()) );
    }

  public function updatePic(Request $request)
  {
      // Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

        // save data to the database.
    		$user = Auth::user();
    		$user->avatar = $filename;

    		$user->save();
      }
      //Rizwan Changes Start Here
      if($request->hasFile('photo_id')){
    		$photo_id = $request->file('photo_id');
    		$filename = time() . '.' . $photo_id->getClientOriginalExtension();
    		Image::make($photo_id)->resize(300, 300)->save( public_path('/uploads/photoId/' . $filename ) );

        // save data to the database.
    		$user = Auth::user();
    		$user->photo_id = $filename;

    		$user->save();
      }
      
      
      if($request->has('webcam_image')){
        $png_url = time().".png";
        $path = public_path('uploads/webcam/').$png_url;

        Image::make(file_get_contents($request->webcam_image))->save($path);   

    	   // save data to the database.
    		$user = Auth::user();
    		$user->webcam_image = $png_url;
    		$user->save();
      }
      //Rizwan Changes End Here
      
      Session::flash('success', 'Profile Image Updated');
    	return redirect()->route('profile')->with(array('user' => Auth::User()));
    }

    public function updateUser(Request $request)
    {
      $this->validate($request, [
        // 'location' => 'required|string|max:255',
        // 'phone_no' => 'required|numeric',
        // 'paypal_email' => 'required|string|email|max:255',
          ]);

      $user = Auth::user();

      $user->location          = $request->input('location');
      $user->phone_no          = $request->input('phone_no');
      $user->paypal_email      = $request->input('paypal_email');

      $user->save();
      Session::flash('success', 'Profile Updated');
      return redirect()->route('profile')->with(array('user' => Auth::User()));
    }
    //Waqas Changes
    public function emailVerification()
    {
        return view('pages.profile.email-verification');
    }
    public function homepageSetup(){

      $user = Auth::user();
      return view('pages.admin.homepage_setup',compact('user'));

    }

    public function setHomepageSetup(Request $request){

      $user = Auth::user();

      if (stripos(strtolower($request->homepage_link), 'www.hi5.center') !== false) {
        
        $link = $request->homepage_link;
        $data['user_id'] = $user->id;
        $data['homepage_link'] = $link;

        $page = HomePageSetup::create($data);

        Session::flash('success', 'Home Page URL Updated');
        return back();
        
      }else{
        Session::flash('failure', 'You are not Allowed to enter outside URL.');
        return back();
      }
     

    }
}
