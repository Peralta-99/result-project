@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h5 class="text-center">{{$user->name}}</h5></div>
                <div class="card-body">
                    <center>
                    <img src="{{$user->avatar}}" width="175px" height="263px" style="border-radius: 15px" alt="">
                    </center>
                </div>

                <span style="margin-bottom: 10px; font-weight: bold" class="text-center">{{ $user->profile->location }}</span>
                <p class="text-center">
                    @if(Auth::id() == $user->id)
                        <a href="{{ route('profile.edit') }}" class="btn btn-lg btn-info">Edit your profile</a>
                    @endif
                </p>

                @if(Auth::id() !== $user->id)
                    <div class="card">
                        <div class="card-body">
                            <friend :profile_user_id = "{{$user->id}}"></friend>
                        </div>
                    </div>
                @endif

            </div>
            <div class="card">
                <span class="card-header text-center">
                    About me
                </span>
                    <p class="card-body"> <span class="text-center"> {{ $user->profile->about }} </span> </p>
            </div>
        </div>
    </div>

@endsection
