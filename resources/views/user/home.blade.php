@extends('layouts.user_master')
@section('title','HOME')
@section('konten')
<section class="hero spad set-bg" data-setbg="https://www.redaksi24.com/wp-content/uploads/2020/03/smk.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__text">
                    <span>New single</span>
                    <h1>Feel the heart beats</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod <br />tempor
                        incididunt ut labore et dolore magna aliqua.</p>
                    <a href="https://www.youtube.com/watch?v=K4DyBUG242c" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="linear__icon">
        <i class="fa fa-angle-double-down"></i>
    </div>
</section>
<!-- Hero Section End -->

<!-- Event Section Begin -->
<section class="event spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Upcoming Events</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="countdown spad set-bg" data-setbg="{{ asset('/img') }}/countdown-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="countdown__text">
                    <h1>Tomorrowland 2020</h1>
                    <h4>Music festival start in</h4>
                </div>
                <div class="countdown__timer" id="countdown-time">
                    <div class="countdown__item">
                        <span>20</span>
                        <p>days</p>
                    </div>
                    <div class="countdown__item">
                        <span>45</span>
                        <p>hours</p>
                    </div>
                    <div class="countdown__item">
                        <span>18</span>
                        <p>minutes</p>
                    </div>
                    <div class="countdown__item">
                        <span>09</span>
                        <p>seconds</p>
                    </div>
                </div>
                <div class="buy__tickets">
                    <a href="#" class="primary-btn">Buy tickets</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
