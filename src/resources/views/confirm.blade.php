@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('title')
<a class="header__logo">
    内容確認
</a>
@endsection

@section('content')
<div class="contact__content">
    <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner" >
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text family">
                        <input type="text" name="family" value="{{ $contact['family'] }}" readonly>
                    </td>
                    <td class="confirm-table__text">
                        <input type="text" name="name" value="{{ $contact['name'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text" colspan="2">
                        <input type="text" name="gender" value="{{ $contact['gender'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text" colspan="2">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">郵便番号</th>
                    <td class="confirm-table__text" colspan="2">
                        <input type="postcode" name="postcode" value="{{ $contact['postcode'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text" colspan="2">
                        <input type="address" name="address" value="{{ $contact['address'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text" colspan="2">
                        <input type="text" name="building_name" value="{{ $contact['building_name'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">ご意見</th>
                    <td class="confirm-table__text" colspan="2">
                        <input type="text" name="opinion" value="{{ $contact['opinion'] }}" readonly>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button><br />
        </div>
        <div class="form__button">
            <button class="form__button-submit-fix" type="submit" name="back" value="back">修正する</button>
        </div>
    </form>
</div>
@endsection

</html>