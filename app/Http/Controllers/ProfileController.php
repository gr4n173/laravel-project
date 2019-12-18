<?php

 namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\User;

class ProfileController extends Controller
{


    public function index(User $user)

    {
      $follows= (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index',compact('user','follows'));
    }


    // public function search(User $user)
    // {
    //   $q = Input::get('q');
    //   dd($q);
    // }

    public function edit(User $user){

      // $this->authorize('update',$user->profile);
      return view('profiles.edit',compact('user',));
    }

    public function update(User $user){

      // $this->authorize('update',$user->profile);



      $data = request()->validate([
        'title' =>'required',
        'description' =>'required',
        'url'=> 'url',
        'image'=>'',



      ]);

      if(request('image')){
        $imagePath = request('image')->store('profile','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $imageArray = ['image'=> $imagePath];
        $image->save();


      }




        $user->profile->update(array_merge(
        $data,
        $imageArray ?? [],


      )); //flag


    

      return redirect ("/profile/{$user->id}");

    }


}
