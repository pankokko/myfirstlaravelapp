@extends('layouts.default')
@section('content')
<div class="sign-up">
  <div class="sign-up__wrapper">
      @if (session('flash'))
        <div class="flash_message">
          {{ session('flash') }}
        </div>
      @endif
    <h2 class="sign-up__wrapper-text">新規登録</h2>
    <form class="sign-up__wrapper-form" method="POST" action="{{route('register')}}">
      @csrf
      <div class="sign-up__wrapper-form-box">
        <input class="sign-up__wrapper-form-box__input" type="text" name="name"  placeholder="Name">
        <div class="under-bar"></div>
      </div>
      <div class="sign-up__wrapper-form-box">
        <input class="sign-up__wrapper-form-box__input" type="email" name="email"  placeholder="Email">
        <div class="under-bar"></div>
      </div>
      <div class="sign-up__wrapper-form-box">
        <input class="sign-up__wrapper-form-box__input" type="password" name="password"  placeholder="Password">
        <div class="under-bar"></div>
      </div>
      <div class="sign-up__wrapper-form-box">
        <input id="password-confirm" class="sign-up__wrapper-form-box__input" placeholder="Typeagain" type="password" class="input-control" name="password_confirmation" required autocomplete="new-password">
        <div class="under-bar"></div>
      </div>
      <button class="sign-up__wrapper-form-button"type="submit">
      <p class="sign-up__wrapper-form-button-registrate">登録</p>    
      </button>
    </form>
      <a class="login-btn" href="{{route("login")}}">
       <p class="login-btn-textbox">またはログイン</p>
      </a>

  </div>
</div>
@endsection 
