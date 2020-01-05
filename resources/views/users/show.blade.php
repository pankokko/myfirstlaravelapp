@extends("layouts/default")
@section("title")
マイページ
@endsection
@include("components/header")
@section("content")
  <div class="user-container">
    <p class="user-container-name">{{Auth::user()->name}}</p>
    <div class="user-container-nav">
      <div class="user-container-nav-list">
        <a class="ser-container-nav-list-link" href="/albums/index">アルバム一覧</a>
      </div>
    </div>
  </div>
  <div class="user-pictures">
    @if(isset($users))
       @foreach ($users as $user) 
        <div class="user-pictures-wrapper"> 
            <a  class="top-pictures-wrapper-link"  href="/items/{{ $user->id }}/show">
            <img class="user-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$user->path)}}"  width="300" height="150px">
          </a>
        </div>
      @endforeach
    @else
      <p>何もありません</p>
    @endif
  </div>
@endsection 
