@extends('layouts.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Home')

@section('childContent')
    <x-layout-partials.header />
    <h1>Home page content here</h1>
    <x-layout-partials.footer />
@endsection
