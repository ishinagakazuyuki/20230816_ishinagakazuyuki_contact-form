@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title')
<a class="header__logo">
    お問い合わせ
</a>
@endsection

@section('content')
@livewire('contact')

@endsection