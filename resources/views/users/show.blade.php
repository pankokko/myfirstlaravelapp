@extends("layouts/default")
@section("title")
マイページ
@endsection
@include("components/header")
@section("content")
  <div class="user-container">
    <div class="album-nav"> 
      <div class="album-nav-wrapper">
        <div class="album-nav-wrapper-list">
          <a class="album-nav-wrapper-list-link" href="/albums/index">アルバム一覧</a> 
        </div>
        <div class="album-nav-wrapper-list">
          <a class="album-nav-wrapper-list-link" href="/albums/new">アルバムを作る</a> 
        </div>
      </div>
    </div>
  <p class="user-container-nickname">{{Auth::user()->name}}<span class="user-container-nickname-text">さんの投稿写真一覧</span></p>

  </div>
  <div class="user-pictures">
    @if(isset($users))
       @foreach ($users as $user) 
        <div class="user-pictures-wrapper"> 
          <a  class="top-pictures-wrapper-link"  href="/items/{{ $user->id }}/show">
            <img class="user-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$user->path)}}"  width="300" height="150px">
          </a>
          <p class="user-pictures-wrapper-title" >{{$user->title}}</p>
        </div>
      @endforeach
    @else
      <p>何もありません</p>
    @endif
  </div>
@endsection 
