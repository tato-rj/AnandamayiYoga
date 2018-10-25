@extends('layouts/raw')

@section('content')
    <section class="col-12 w-100 h-100vh bg-full" style="background-image:url({{cloud('app/images/backgrounds/main.jpg')}})">
        <div class="overlay w-100 h-100 bg-blue z-0"></div>
        <div class="container-fluid">
            <div class="row align-items-center h-100vh">
                <div class="col-lg-4 col-md-6 col-sm-8 col-xs-10 mx-auto text-center">
                    <div class="position-relative p-5">
                        <div class="overlay w-100 h-100 bg-white z-0 rounded" style="opacity: 0.85"></div>
                        <div class="z-10 position-relative">
                            <p class="lead mt-2">We are sorry to see you go!</p>
                            <h3>You have successfully deleted your account</h3>
                            <div class="line-shape"></div>
                            <p class="mt-2">If you have a moment, we'd like to hear about your experience at our website to know what we can improve.</p>
                            <a href="" class="btn-bold btn-red mx-auto">Take our survey</a>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
@endsection