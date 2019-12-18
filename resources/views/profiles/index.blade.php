


@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">



    <div class="col-3 pl-5 pb-3">


 <img  class="rounded-circle w-100" src="{{ $user->profile->profileImage()}}">

</div>




    <div class="col-9" >

      <div class= "pt-3 d-flex justify-content-between align-items-baseline pb-3" >




         <div class="d-flex align-items-center pb-3">
           <div class="h4 pr-3"> {{ $user -> username}}</div>


         </div>

        <button class="btn btn-primary pr-3"> follow</button>


        <div class="">

          <form action="/sql" method="POST" role="search">
         @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default" onclick="post()">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>





              <br><br>
                <a href="/p/create">Add New Posts</a>

        </div>


       </div>


          <a href="/profile/{{$user->id}}/edit">Edit Profile</a>


   <div class="d-flex">


      <div class ="pr-4 ">
        <strong>{{$user->posts->count() }}</strong> posts
      </div>
        <div class="pr-4" >
          <strong>{{$user->profile->followers->count() }}</strong> follower
        </div>

        <div class="pr-4">
        <strong>{{  $user->following->count()}}</strong> following
        </div>




        </div>
        <div >



        </div>
        <div class="pt-4">



  <strong> {{  $user->profile->title }} </strong>



        </div>

        <div >



          <? php


        if (isset($_POST['update']))
        {

        //if button clicked run this php

        echo "the_new_flag";


        } else {


        }

        ?>





        </div>

        <div >

        {{  $user->profile->description }}

        </div>


        <div > <a href="#">{{  $user->profile->url  }}</a>
        </div>
        <div class="row pt-5">


@foreach($user->posts as $post)
<div class="col-4 pb-4">

<a href="/p/{{$post->id}}">
   <img src="/storage/{{ $post->image  }}" class="w-100">
</a>
</div>

@endforeach


<!-- This is the flag VECTOR_CTF_FLAG ^THIS is a FIRST FLAG ^ -->





        </div>
         </div>


    </div>

  </div>
</div>
@endsection
