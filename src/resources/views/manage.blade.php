@extends('layouts.app')
<style>
    svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
    }
</style>

@section('css')
<link rel="stylesheet" href="{{ asset('css/manage.css') }}" />
@endsection
    
@section('title')
<a class="header__logo">
    管理システム
</a>
@endsection

@section('content')
<div>
    @if (session('message'))
    <div class="delete__alert--success">{{ session('message') }}</div>
    @endif
</div>
<div class="search__content">
    <form class="search-form" action="/manage/search" method="get">
        <div class="search-form__parts">
            <div class="search-form__item">
                <p class="search-form__item-title">お名前</p>
                <input class="search-form__item-input" type="text" name="name" value="{{ old('name') }}"/>
            </div>
            <div class="search-form__item2">
                <p class="search-form__item-title-gender">性別</p>
                <input class="search-form__item-radio" type="radio" name="gender" value="0" {{ old('gender','*') == '*' ? 'checked' : '' }}>
                <p class="search-form__item-gender">全て</p>
                <input class="search-form__item-radio" type="radio" name="gender" value="1" {{ old('gender') == '男性' ? 'checked' : '' }} >
                <p class="search-form__item-gender">男性</p>
                <input class="search-form__item-radio" type="radio" name="gender" value="2" {{ old('gender') == '女性' ? 'checked' : '' }}>
                <p class="search-form__item-gender">女性</p>
            </div>       
        </div>
        <div class="search-form__parts">
            <div class="search-form__item3">
                <p class="search-form__item-title-date">登録日</p>
                <input class="search-form__item-input-date" type="text" name="before" value="{{ old('before') }}"/>
                <span class="search-form__item-input-span">～</span>
                <input class="search-form__item-input-date" type="text" name="after" value="{{ old('after') }}"/>
            </div>
        </div>
        <div class="search-form__parts">        
            <div class="search-form__item">
                <p class="search-form__item-title-email">メールアドレス</p>
                <input class="search-form__item-input" type="text" name="email" value="{{ old('email') }}"/>
            </div>
        </div>
       <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button><br>
            <button class="search-form__button-submit-reset" type="reset">リセット</button>
        </div>
    </form>
</div>

<div class="contact-table">
    <table class="contact-table__inner">
        <tr class="contact-table__row">
            <th class="contact-table__header">
                <span class="contact-table__header-id">ID</span>
                <span class="contact-table__header-fullname">お名前</span>
                <span class="contact-table__header-gender">性別</span> 
                <span class="contact-table__header-email">メールアドレス</span>
                <span class="contact-table__header-opinon">ご意見</span>
                <span></span>
            </th>
        </tr>
        {{ $contacts->links('vendor.pagination.tailwind2') }}
        @foreach ($contacts as $contact)
        <tr class="contact-table__row">
        <?php
            $gender = $contact['gender'];
        ?>
        @if ($gender === 1)
        <?php $gender = "男性"; ?>
        @elseif ($gender === 2)
        <?php $gender = "女性"; ?>
        @endif
            <td class="contact-table__item">
                <form class="contact-table-form">
                    <div class="contact-table-form__id">
                        <input class="contact-table-form__item-input" type="text" name="id" value="{{ $contact['id'] }}" readonly/>
                        <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                      </div>
                    <div class="contact-table-form__fullname">
                        <input class="contact-table-form__item-input" type="text" name="fullname" value="{{ $contact['fullname'] }}" readonly/>
                        <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                    </div>
                    <div class="contact-table-form__gender">
                        <input class="contact-table-form__item-input" type="text" name="gender" value="{{ $gender }}" readonly/>
                        <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                    </div>
                    <div class="contact-table-form__email">
                        <input class="contact-table-form__item-input" type="text" name="email" value="{{ $contact['email'] }}" readonly/>
                        <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                    </div>
                    <div class="contact-table-form__opinion">
                        <p id="opinion" class="contact-table-form__item-input opinion" type="text" name="opinion">{{ $contact['opinion'] }}</p>
                        <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                    </div>
                </form>
            </td>
            <td>
                <form class="delete-form" action="/manage/delete" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="delete-form__button">
                        <input type="hidden" name="id" value="{{ $contact['id'] }}"/>
                        <button class="delete-form__button-submit" type="submit">削除{{ $contact['id'] }}</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection