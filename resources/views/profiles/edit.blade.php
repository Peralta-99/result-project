@extends('layouts.app')
<script type="text/javascript">
    function limitText(limitField, limitCount, limitNum) {
        if (limitField.value.length > limitNum) {
            limitField.value = limitField.value.substring(0, limitNum);
        } else {
            limitCount.value = limitNum - limitField.value.length;
        }
    }
</script>
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
                                <textarea class="form-control" name="about" cols="40" rows="13" required id="about" onKeyDown="limitText(this.form.about,this.form.countdown,255);" onKeyUp="limitText(this.form.about,this.form.countdown,255);">{{ __($info->about) }}</textarea>
                                <p style="font-size: 1em; cursor: default">
                                    (Maximum characters: 255)
                                    <br>
                                    You have <input readonly type="text" style="cursor: default" name="countdown" size="2" value="255"> characters left.
                                </p>
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
