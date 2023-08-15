@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="thanks__content">
    <div class="thanks__heading">
        <p>ご意見いただきありがとうございました。</p>
    </div>
    <div class="thanks__button">
        <button class="thanks__button-submit" type="submit">トップページへ</button><br />
    </div>
</div>
@endsection