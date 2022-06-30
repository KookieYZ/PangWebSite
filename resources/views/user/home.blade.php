@extends('includes.app')

@section('content')
@inject('theme', 'App\Http\Controllers\User\ThemeController')
    <div class="container-fluid px-0">
        <div class="row m-0">
            <div class="col-md-12 mt-5 p-0">
                <img src="{{ $theme->bannerImage() }}" class="img-fluid w-100"/>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0">
        <div class="row m-0">
            <div class="col-md-12 m-0 p-0">
                <img src="{{ $theme->bgImage() }}" class="img-fluid w-100"/>
            </div>
        </div>
    </div>
@endsection