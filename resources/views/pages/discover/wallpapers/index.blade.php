@extends('layouts/app')

@section('head')

<link rel="stylesheet" href="{{asset('demo/lightgallery/dist/css/lightgallery.min.css')}}">
<link rel="stylesheet" href="{{asset('demo/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}">
<style type="text/css">
.lightbox > a {
  position: relative; }
  .lightbox > a:before, .lightbox > a:after {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: all 300ms; }
  .lightbox > a:before {
    content: '\f1ee';
    font-family: "Material-Design-Iconic-Font";
    font-size: 2.3rem;
    color: #FFFFFF;
    bottom: 0;
    right: 0;
    margin: auto;
    width: 25px;
    height: 25px;
    line-height: 25px;
    z-index: 2;
    -webkit-transform: scale(2);
            transform: scale(2); }
  .lightbox > a:after {
    content: '';
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    z-index: 1; }
  .lightbox > a:hover:before, .lightbox > a:hover:after {
    opacity: 1; }
  .lightbox > a:hover:before {
    -webkit-transform: scale(1);
            transform: scale(1); }
.photos {
  margin: 0 -3px 1rem; }
  .photos > a {
    padding: 0;
    border: 3px solid transparent; }
    .photos > a img {
      border-radius: 2px;
      width: 100%; }
.lg-thumb-item {
	border: 0!important;
}
.lg-outer .lg-thumb-outer.lg-grab .lg-thumb-item:not(.active) {
	opacity: 0.4;
}
</style>
@endsection

@section('content')

<div class="container-fluid">

    @include('components/sections/lead', ['image' => 'poses'])
    
    @include('pages/discover/wallpapers/content')

    @include('components/bars/devices')
  
  	@include('components/feedback/fixed-box')

</div>
@endsection

@section('scripts')
<script src="{{asset('demo/lightgallery/dist/js/lightgallery-all.js')}}"></script>

<script src="{{asset('demo/js/app.min.js')}}"></script>
@endsection
