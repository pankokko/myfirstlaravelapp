<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css"> 
<title>@yield("title")</title>
<script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
<header class="mainpage-header">
  <h1 class="mainpage-header-logo">
    <a href="/"></a>
    PHOTOWEB
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
        　<a href="/items/new" > 
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
       <div class="mainpage-header__nav-right-wrapper-signup" >
         <a href="{{route('register')}}">
         <p class="mainpage-header__nav-right-wrapper-login-text">新規登録</p>
         </a>
       </div>  
     </div>  
  </nav> 
</header>
<main>
  @yield('content')
</main>
</body>
</html>