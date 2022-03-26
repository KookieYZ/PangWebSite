@extends('includes.app')

@section('content')
<section class="content" style="margin-top: 52px">
    <div class="row">
        <div class="col-2">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @for ($i = 2022; $i >= 1970; $i--)
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <div class="row d-flex align-items-center">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <span class="ml-2 w-75">
                                            {{ $i }} 
                                        </span>
                                        <i class="fas fa-angle-right m-auto"></i>
                                    </div>
                                </a>
                            </li>
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-10">
            <div class="d-flex align-items-center flex-column" id="scroll_container">
                <div class="h1 mt-5"><b><ins>事迹</ins></b></div>
                @for ($i = 0; $i < 4; $i++)
                    @if ($i < 2)
                        <div class="w-auto d-flex justify-content-start m-2">
                            <image class="image-blog" src="{{ asset('assets/images/profile.jpg') }}"
                                height="800" width="800" />
                        </div>
                    @else
                        <div class="w-auto d-flex justify-content-start m-2">
                            <iframe class="embed-responsive-item  video-blog" width="400" height="300"
                                src="{{ asset('assets/videos/video.mp4') }}" title="URL video player"
                                allowfullscreen="" controls="0" autoplay="0" sandbox="" frameborder="0"
                                scrolling="no"></iframe>
                        </div>
                    @endif
                    <div class="d-flex col-xl-8 col-md-8 col-12 p-1 mt-1 ">
                        <div>{{ $i < 2 ? '照片' : '视频' }} 解说: <br>
                            此页面能分享最好的文章，以阅读有关健康、幸福、创造力、生产力等主题的文章。推动我工作的核心问题是：“我们怎样才能生活得更好？”为了回答这个问题，我喜欢写一些基于科学的方法来解决实际问题。您会发现有趣的文章可以阅读，主题包括如何停止拖延以及个人建议，例如我的最佳阅读书籍清单和我的极简旅行指南。准备好潜水了吗？您可以使用下面的类别来浏览我最好的文章。
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>