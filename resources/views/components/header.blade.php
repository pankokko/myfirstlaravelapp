@extends("layouts.default")
<header class="mainpage-header">
  <a href="{{route("/")}}">
  <h1 class="mainpage-header-logo">
    PHOTOWEB
  </a>
    <span class="mainpage-header-logo__text">お気に入りの写真を投稿しよう！</span>
  </h1>
   <nav class="mainpage-header__nav">
     <div class="mainpage-header__nav-wrapper">
       <div class="mainpage-header__nav-wrapper-text">
          <a href="#" > 
          <i class="fas fa-camera"></i>
          写真を見る
          </a>
       </div>
       <div class="mainpage-header__nav-wrapper-text">
          <a href="{{route("new")}}" > 
          <i class="fas fa-upload"></i>
          投稿する
          </a>
       </div> 
       <form class="mainpage-header__nav-wrapper-form" method="get" >
        <input class="mainpage-header__nav-wrapper-form-search" type="text" name="search" placeholder="キーワードを入力"> 
        <button class="mainpage-header__nav-wrapper-form-btn">
            <i class="fas fa-search"></i>
            検索      
        </button>  
       </form>
     </div>
     <div class="mainpage-header__nav-right-wrapper" >
       @if(Auth::check())
        <div class="login-user-name">
         <p class="login-user-name-text">{{Auth::user()->name}}</p>   
        </div>
       @endif 
       <div class="mainpage-header__nav-right-wrapper-login" >
          @if (Auth::check())
          <a href="{{ route('logout') }}">
            <p class="mainpage-header__nav-right-wrapper-login-text" >ログアウト</p>
          </a>
         @else
           <a href="{{ route('login') }}">
           <p class="mainpage-header__nav-right-wrapper-login-text" >ログイン</p>
          </a>
        @endif
       </div>  
       @if (Auth::check())
       <div class="space" >
        </div>
       @else
       <div class="mainpage-header__nav-right-wrapper-signup" >
          <a href="{{route('register')}}">
          <p class="mainpage-header__nav-right-wrapper-login-text">新規登録</p>
          </a>
        </div>
       @endif
     </div>  
  </nav> 
</header>