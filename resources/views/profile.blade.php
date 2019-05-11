@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div> <p style="float: left;margin-right:15px">
                                @if($profile->user->avatar == false)
                                    <img src="https://www.logolynx.com/images/logolynx/d4/d4a80a1f2a0d79a8783d2910f69680cf.png"  height="40" width="40">
                                @endif
                                @if($profile->user->avatar == true)
                                    <img src="{{$profile->user->avatar}}" height="40" width="40">
                                @endif
                            </p>
                        <p>My Profile</p>
                    </div>
                </div>


                    <div class="card-body ">
                        <span class="font-weight-bold">First Name:</span> {{$profile->fname}}</br>
                        <span class="font-weight-bold">Last Name: </span>{{$profile->lname}}</br>
                        <span class="font-weight-bold">Body: </span>{{$profile->body}}</br>
                    </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success float-right" href="{{ route('profile.edit', ['profile_id' => $profile->id,'user_id' => $profile->user->id]) }}">
                            Edit
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection