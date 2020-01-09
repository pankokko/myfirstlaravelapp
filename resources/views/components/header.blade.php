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
          <a class="gnav-picture-category" href="/categories/index"><i class="fas fa-camera"></i>写真を見る</a>
         {{-- <ul class="gnav">
            <li>
              <a class="gnav-picture-category" href=""><i class="fas fa-camera"></i>写真を見る</a>
            <ul>
                <li class="gnav-list"><a class="gnav-list-link" href="/categories/index">カテゴリー</a></li>
            </ul>
         </ul> --}}
       </div>
       <div class="mainpage-header__nav-wrapper-text">
          <a href="{{route("new")}}" > 
          <i class="fas fa-upload"></i>
          投稿する
          </a>
       </div> 
         <form class="mainpage-header__nav-wrapper-form" action="/items/search" method="get" >
           @csrf
          <input class="mainpage-header__nav-wrapper-form-search" type="text" name="keyword" placeholder="キーワードを入力">
          <input class="mainpage-header__nav-wrapper-form-btn" type="submit" value="検索">
        </form>
     </div>
     <div class="mainpage-header__nav-right-wrapper" >
       @if(Auth::check())
        <div class="login-user-name">
          <ul class="gnav">
            <li class="gnav-user">
              <a class="gnav-user-name" href="">{{Auth::user()->name}}</a>
              <ul>
                <li class="gnav-list"><a class="gnav-list-link" href="/users/{{Auth::user()->id}}/show">マイページ</a></li>
             </ul>
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
       <div class="space"></div>
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