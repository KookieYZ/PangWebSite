@extends('includes.app')

@section('content')
<!-- <section class="search-sec pt-5">
    <div class="container">
        <form action="{{ route('search.index') }}" method="GET">
            {{ csrf_field() }}
            <div class="row d-flex justify-content-center align-items-center p-3">
                <div class="col-9">
                    <input type="text" id="search_text" name="search_text"
                        class="form-control search-slt border border-dark" value="{{ request('search_text') }}"
                        style="border-radius: 20px" placeholder="輸入名字">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn border border-dark text-black bg-white"
                        style="border-radius: 20px">搜索</button>
                </div>
            </div>
        </form>
    </div>
</section> -->
@inject('theme', 'App\Http\Controllers\User\ThemeController')
<section class="content pt-5">
    <div class="container mt-3 mb-3 p-2 d-flex">
        <div class="row d-flex justify-content-start">
            @foreach($search_persons as $search_person)
            <div class="col-xl-3 col-md-4 col-12 p-2">
                <a href="/chart/{{$search_person->id}}" class="text-decoration-none">
                    <div class="card p-3 text-white" style="background-color:  {{ $theme->secondColor()->value }};">
                        <div class="image d-flex flex-column justify-content-center align-items-center"> <img
                                src="{{ asset('image/avatar/'.$search_person->avatar) }}" height="100" width="100" />
                            <div class="container bg-white text-dark mt-2" style="border-radius: 20px">
                                <div class="row d-flex justify-content-center p-2">
                                    <div>{{ $search_person->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="container bg-white text-dark mt-2">
                            <div class="row text-justify p-2">
                                <div>
                                    @if($search_person->gender == 1)
                                    <b>性别 :</b> 男
                                </div>
                                @else
                                <b>性别 :</b> 女
                            </div>
                            @endif
                        </div>
                        <div class="row text-justify p-2">
                            <div><b>代序 :</b> {{ $search_person->era }}</div>
                        </div>
                        <div class="row text-justify p-2">
                            <div><b>州属 :</b> {{ $search_person->state }}</div>
                        </div>
                        <div class="row text-justify p-2">
                            <div><b>年份 :</b> {{ $search_person->dob_date }} ～ {{ $search_person->dead_date }}</div>
                        </div>
                    </div>
            </div>
            </a>
        </div>
        @endforeach
        {{-- <div>{{ $search_persons->render() }}</div> --}}
    </div>
    </div>
</section>

<style>
    a:hover {
        text-decoration: none;
    }
</style>
@endsection