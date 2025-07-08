@extends('layouts.base')

@section('childContent')
    <x-layout-partials.header />
    @yield('content')
    <x-layout-partials.footer />
@endsection
