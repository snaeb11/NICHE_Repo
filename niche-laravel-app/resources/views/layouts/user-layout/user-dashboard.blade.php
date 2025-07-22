@extends('layouts.template.base', ['cssClass' => 'bg-[#fffff0]'])
@section('title', 'Dashboard')

@section('childContent')
    <x-layout-partials.landing-header />
    <x-popups.logout-m />

    <x-layout-partials.footer />
@endsection
