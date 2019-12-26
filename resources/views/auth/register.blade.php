@extends('layouts.default')
@section('content')
<div class="sign-up">
  <div class="sign-up__wrapper">
    <h1 class="sign-up__wrapper-text">新規登録</h1>
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
      <button class="sign-up__wrapper-form-button"type="submit">
      <p class="sign-up__wrapper-form-button-registrate">登録</p>    
      </button>
    </form>
      <button class="login-btn">
       <p class="login-btn-textbox">またはログイン</p>
      </button>

  </div>
</div>
@endsection 
