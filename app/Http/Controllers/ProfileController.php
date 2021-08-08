<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user())
        {
            $user = Auth::user();
            $profile = $user->profile;
            return view('profile.index', compact('profile'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile; 
        return view('profile.create',compact('profile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {

        $this->validateRequest($request);
        $user_id = Auth::user()->id;
        if (Profile::where('user_id', '=', $user_id)->exists())
        {
        $data=$request->all();
        $profile=  Profile::where('user_id',$user_id)->first();

        if($request->hasFile('avatar'))
        {
            $file=$request->file('avatar');
            $new_avatar_name = time().'_'.$request->name . '.' . $request->avatar->extension();
            $file->move(public_path('assets\img'), $new_avatar_name);
            $data['avatar']= $new_avatar_name;
            $profile->update($data);
           
        }
        else{
            $profile->update($data);
        }   
        }
        else{
          //  $data=$request->all();

            $profile= new Profile();
            $profile->user_id=$request->user()->id;
            if($request->hasFile('avatar'))
            {

                $file=$request->file('avatar');
                $new_avatar_name = time().'_'.$request->name . '.' . $request->avatar->extension();
                $file->move(public_path('assets\img'), $new_avatar_name);
                $profile->user_id=$request->user()->id;
                $profile->first_name=$request->post('first_name');
                $profile->last_name=$request->post('last_name');
                $profile->avatar=$new_avatar_name;
                $profile->birthday=$request->post('birthday');
                $profile->mobile=$request->post('mobile');
                $profile->country=$request->post('country');
                $profile->address=$request->post('address');
                $profile->zip_code=$request->post('zip_code');
                $profile->gender=$request->post('gender');
                $profile->save();
               
            }
            else{
                $profile->user_id=$request->user()->id;
                $profile->first_name=$request->post('first_name');
                $profile->last_name=$request->post('last_name');
                $profile->birthday=$request->post('birthday');
                $profile->mobile=$request->post('mobile');
                $profile->country=$request->post('country');
                $profile->address=$request->post('address');
                $profile->zip_code=$request->post('zip_code');
                $profile->gender=$request->post('gender');
                $profile->save();
            }           
            }
                return redirect('profile/index')->with('success','Saved!');
            }   

          
        
    
    

    protected function validateRequest(Request $request)
    {
        
        $error= $request->validate([
            'first_name'=>'required|string|max:255|min:3',
            'last_name'=>'required|string|max:255|min:3',
            'avatar'=>['image'],'dimensions:min_width=250',
            'description'=>'nullable|min:6|max:255',
            'mobile'=> ['regex:/^(059|056)([0-9]{7})$/'],
            'zip_code'=> 'nullable|min:3|max:6',
            'country'=> 'required', 
            'gender'=>'required|in:male,female'  
        ]);
    }
}
