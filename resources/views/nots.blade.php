@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-center">Notifications</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <ul class="list-group">
                            @foreach($nots as $not)
                                <li class="list-group-item">
                                    {{$not->data['message']}}<span class="float-right">{{$not->created_at->diffForHumans()}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
