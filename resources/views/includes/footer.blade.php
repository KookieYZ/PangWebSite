@inject('theme', 'App\Http\Controllers\User\ThemeController')
<footer id="contact" class="">
    <div class="container-fluid" style="background-color:{{ $theme->SecondColor()->value }}">
        <div class="d-flex flex-row justify-content-center p-3" style="gap: 100px; font-size: 32">
            <div>
                <img class="img-fluid" src="{{ asset('assets/images/Facebook.png') }}" width="48">
                <a class="text-white" href="{{ $theme->facebook()['link'] }}">{{ $theme->facebook()['label'] }}</a>
            </div>
            <div>
                <img class="img-fluid" src="{{ asset('assets/images/Whatapps.png') }}" width="48">
                <a class="text-white" href="{{ $theme->facebook()['link'] }}">{{ $theme->facebook()['label'] }}</a>
            </div>
            <div>
                <img class="img-fluid" src="{{ asset('assets/images/Email.png') }}" width="48">
                <a class="text-white" href="{{ $theme->facebook()['link'] }}">{{ $theme->facebook()['label'] }}</a>
            </div>
        </div>
    </div>
</footer>