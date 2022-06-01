@extends('includes.app')

@section('content')
    <section style="width: 350px">
        <div class="jobRefer" style="width: 350px">
            <div class="" style="width: 350px; height: 400px; padding: 20px;">
                <image class="image-blog" src="{{ asset('image/job/' . $jobDetail->image_path) }}" height="200"
                    width="200" />

                <h1 class="w-75">
                    <h3><u>工作名称:</u></h3>
                    {{ $jobDetail->name }}
                </h1>
                <p class="w-75">
                <h3><u>工作种类:</u></h3>
                {{ $jobDetail->category }}
                </p>
                <p class="w-75">
                <h3><u>公司地址:</u></h3>
                {{ $jobDetail->address }}
                </p>
                <p class="w-75">
                <h3><u>薪水:</u></h3>
                {{ $jobDetail->salary }}
                </p>
                <p class="w-75">
                <h3><u>发布于:</u></h3>
                {{ $jobDetail->posted_on }}
                </p>
            </div>
            <div class="" style="width: 350px; height: 400px; padding: 20px; margin-top:300px">
                <p class="w-75">
                <h3><u>工作内容:</u></h3>
                {{ $jobDetail->description }}
                </p>
                <p class="w-75">
                <h3><u>注意事项:</u></h3>
                {{ $jobDetail->note }}
                </p>
            </div>
        </div>
    </section>
@endsection
