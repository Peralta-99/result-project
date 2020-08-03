@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit your profile.') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" enctype="multipart/form-data" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="avatar">Upload avatar</label>
                                <input type="file" id="avatar" name="avatar" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" required id="location" name="location" value="{{ $info->location }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="about">About me</label>
                                <textarea required id="about" name="about" cols="40" rows="13" class="form-control">{{ $info->about }}</textarea>
                            </div>
                            <div class="form-group">
                                <p class="text-center">
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        Save your information
                                    </button>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
