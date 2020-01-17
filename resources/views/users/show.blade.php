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
     <div class="profile">
{{-- 
      <div class="profile-wrapper">
        <div class="profile-wrapper-picture">
         
          <form class="upload-wrapper-form" method="post" aciton="/user/edit" enctype="multipart/form-data">
            @csrf
              {{method_field("patch")}}
              <i class="far fa-edit">
              <label class="profile-wrapper-picture-label" for="file_input">
            <input id="file_input" type="file" class="profile-wrapper-picture-label-input">
          </label>
        </i>
          </form>
          <img class="profile-wrapper-picture-image" src="https://f.easyuploader.app/eu-prd/upload/20200113102330_793437344e.JPG" width="140" height="140">
        </div>
        <p class="profile-wrapper-picture-user">{{Auth::user()->name}}</p>
      </div>  --}}

    </div> 
  <p class="user-container-nickname">{{Auth::user()->name}}<span class="user-container-nickname-text">さんの投稿写真一覧</span></p>
  </div>
  <div class="user-pictures">
    @if(isset($users))
       @foreach ($users as $user) 
        <div class="user-pictures-wrapper"> 
          <a  class="top-pictures-wrapper-link"  href="/items/{{ $user->id }}/show">
            <img class="user-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$user->path)}}"  width="220" height="100px">
          </a>
          <p class="user-pictures-wrapper-title" >{{$user->title}}</p>
        </div>
      @endforeach
    @else
      <p>何もありません</p>
    @endif
  </div>
@endsection 
