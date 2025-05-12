@extends('layouts.main')

@section('title', 'Fine Dining Restaurant')

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.menu')
    @include('sections.gallery')
    @include('sections.reservation')
    @include('sections.testimonials')
    @include('sections.contact')
@endsection