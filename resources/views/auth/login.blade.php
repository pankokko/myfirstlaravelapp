@extends('layouts.default')

@section('content')
<div class="sign-up">
  <div class="sign-up__wrapper">
    <h1 class="sign-up__wrapper-text">ログイン</h1>
    <form class="sign-up__wrapper-form" method="POST" action="{{route('login')}}">
    @csrf
    <div class="sign-up__wrapper-form-box">
        <input class="sign-up__wrapper-form-box__input" type="email" name="email"  placeholder="Email">
        <div class="under-bar"></div>
    </div>
    <div class="sign-up__wrapper-form-box">
        <input class="sign-up__wrapper-form-box__input" type="password" name="password"  placeholder="Password">
        <div class="under-bar"></div>
    </div>
    <button class="sign-up__wrapper-form-button"type="submit">
    <p class="sign-up__wrapper-form-button-registrate">ログイン</p>    
    </button>
    </form>
    <a class="login-btn" href="{{route("login")}}">
      <p class="login-btn-textbox">または登録</p>
    </a>
  </div>
</div>
@endsection
