<!doctype html>
<html dir="{{ (App::isLocale('en') ? 'ltr' : 'rtl') }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('frontendLayout.header')

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('uploads/settings/'.getSettingValue('logo')) }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">{{ trans('common.PanelHome') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about"> {{ trans('common.aboutSettings') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#courses">{{ trans('common.courses') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#reviews">{{ trans('common.studentsReviews') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">{{ trans('common.contactUs') }}</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            <ul class="nav navbar-nav align-items-center ms-auto">
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        {{panelLangMenu()['selected']['text']}}
                                    </a>
                                    <div class="dropdown-menu">
                                      @foreach(panelLangMenu()['list'] as $singleLang)
                                      <a class="dropdown-item" href="{{url('/SwitchLang/'.$singleLang['lang'])}}" data-language="{{$singleLang['lang']}}">
                                          <i class="flag-icon flag-icon-{{$singleLang['flag']}}"></i> {{$singleLang['text']}}
                                      </a>
                                  @endforeach

                                    </div>
                                  </div>
                            </ul>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        <!-- Carousel wrapper -->
        <div id="home">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @for($i = 0; $i < count($videos); $i++)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="active"></li>
                    @endfor
                </ol>
                <div class="carousel-inner">
                    @foreach ($videos as $video)
                            <div class="carousel-item {{ ($video->id == $minVideoId) ? 'active' : '' }}">
                                    <video class="img-fluid" autoplay loop muted>
                                        <source src="{{$video->videoLink()}}" type="video/mp4">
                                    </video>
                            </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
              </div>
        </div>
        <!-- Carousel wrapper -->

       <!-- header hero -->
    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about_area pt-40" dir="ltr">
        <div class="about_wrapper">
        {{-- <div class="about_bg bg_cover d-none d-lg-block" style="background-image: url(assets/images/never-stop-learning.jpg)"></div> --}}
        <div class="about_bg bg_cover d-none d-lg-block" style="background-image: url(uploads/settings/{{ getSettingValue('aboutusPhoto') }} )"></div>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-10">
                        <div class="about_content">
                            <div class="about_content_wrapper">
                                <div class="section_title">
                                    <h3 class="title">{{ trans('common.AmaalTrainingAcademy') }}</h3>
                                    <span class="line"></span>
                                    @if(App::isLocale('en'))
                                        {!! getSettingValue('des_en') !!}
                                    @else
                                        {!! getSettingValue('des_ar') !!}
                                    @endif


                                </div> <!-- section title -->
                                <a href="#contact" class="main-btn"> {{ trans('common.contactUs') }} </a>
                            </div> <!-- about content wrapper -->
                        </div> <!-- about content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->

        </div> <!-- about wrapper -->

         <!-- other imgs in about -->
         <div class="owl-carousel owl-theme pt-40" id="about-carousel">
            @for($i=1 ; $i < 7; $i++)
                <div class="item">
                    <img src="{{ asset('uploads/settings/'.getSettingValue('home_slide'.$i.'img')) }}" alt="">
                </div>
            @endfor
        </div>
    </section>

    <!--====== ABOUT PART ENDS ======-->

    <!--====== COURSES PART START ======-->

    <section id="courses" class="courses_area pt-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section_title text-center pb-25">
                        <h3 class="title">{{ trans('common.courses') }}</h3>
                        <span class="line"></span>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                @for($i = 0; $i < count($courses); $i++)
                    @if($i <= 3 )
                        <div class="col-md-3">
                            <div class="single_courses mt-30">
                                <img src="{{$courses[$i]->photoLink()}}" alt="courses">
                                @if(App::isLocale('en'))
                                    <h4 class="title"><a href="javascript:void(0)">{{$courses[$i]-> title_en}}</a></h4>
                                    <p> {!! $courses[$i]-> des_en !!}</p>
                                @else
                                    <h4 class="title"><a href="javascript:void(0)">{{$courses[$i]-> title_ar}}</a></h4>
                                    <p> {!! $courses[$i]-> des_ar !!}</p>
                                @endif
                            </div> <!-- single courses -->
                        </div>
                    @else
                        <div class="col-md-3 MoreCourses" style="display: none">
                            <div class="single_courses mt-30">
                                <img src="{{$courses[$i]->photoLink()}}" alt="courses">
                                <h4 class="title"><a href="javascript:void(0)">{{$courses[$i]-> title_ar}}</a></h4>
                                <p> {!! $courses[$i]-> des_ar !!}</p>
                            </div> <!-- single courses -->
                        </div>
                    @endif
                @endfor
            </div> <!-- row -->
            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-outline-primary rounded-pill buttonShow" id="btnMoreCourses" onclick="myFunction()">{{ trans('common.ShowMore') }}</button>
            </div>
        </div> <!-- container -->
    </section>

    <!--====== COURSES PART ENDS ======-->

    <!--====== tistemonial PART START ======-->

    <section id="reviews" class="tistemonial_area mt-5" dir="ltr">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section_title text-center">
                        <h3 class="title">{{ trans('common.studentsReviews') }}</h3>
                        <span class="line"></span>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme pt-40" id="tistemonial-carousel">
                        @foreach ($reviews as $review)
                        <div class="item">
                            <img src="{{$review->photoLink()}}" alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--====== tistemonial PART ENDS ======-->


    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact_area mt-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section_title text-center pb-25">
                        <h3 class="title">{{ trans('common.BeInContactWithUs') }}</h3>
                        <span class="line"></span>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                        Thank You For Contact With Us!
                      </div>
                    <div class="contact_form">
                        <form method = "post" action="{{ route('message.store') }}" id="Message_Form">
                            @csrf
                            <div class="single_form">
                                <input type="text" name="name" id="name" placeholder="{{ trans('common.name') }}" class="form-control" value="{{ old('name') }}">
                                <span class="text-danger text-error name_error"></span>
                            </div> <!-- single form -->
                            <div class="single_form">
                                <input type="email" name="email" id="email" placeholder="{{ trans('common.email') }}" class="form-control" value="{{ old('email') }}">
                                <span class="text-danger text-error email_error"></span>
                            </div> <!-- single form -->
                            <div class="single_form">
                                <input type="text" name="phone" id="phone" placeholder="{{ trans('common.phone') }}" class="form-control" value="{{ old('phone') }}">
                                <span class="text-danger text-error phone_error"></span>

                            </div> <!-- single form -->
                            <div class="single_form">
                                <textarea name="content" id="content" placeholder="{{ trans('common.textMessage') }}" class="form-control">{{ old('content') }}</textarea>
                                <span class="text-danger text-error content_error"></span>
                            </div> <!-- single form -->
                            <p class="form-message"></p>
                            <div class="single_form">
                                <button class="main-btn" type="submit">{{ trans('common.send') }}</button>
                            </div> <!-- single form -->
                        </form>
                    </div> <!-- contact form -->
                </div>
                <div class="col-lg-6">
                    <div class="gmap_canvas">
                        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Mission%20District%2C%20San%20Francisco%2C%20CA%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div> <!-- contact map -->
            </div>  <!-- row -->
        </div> <!-- container -->

    </section>

    <!--====== CONTACT PART ENDS ======-->

    <!--====== FOOTER PART START ======-->

    @include('frontendLayout.footer')
