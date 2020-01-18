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
       <div class="profile-wrapper">
         <div class="profile-wrapper-picture">
           @empty($userpic)
           <img src="//static.mercdn.net/images/member_photo_noimage_thumb.png" width="160" height="160">
           @else
           <img class="profile-wrapper-picture-image" src="{{asset('/storage/userpic/'.$userpic)}}"  width="160" height="160">
           @endif
           <form class="upload-wrapper-form-profile" method="post" aciton="/user/edit" enctype="multipart/form-data">
             @csrf
             {{ method_field('patch') }}
             <label class="profile-wrapper-picture-label" for="file_input">
                <i class="fas fa-camera">写真を変更</i>
                <input type="submit" class="user-submit">
              </label>
             <input id="file_input" name="profilepic" type="file" class="profile-wrapper-picture-label-input">
             <p class="profile-wrapper-picture-user">{{Auth::user()->name}}</p>
             
           </form>
        </div>
      </div> 
      <div class="user-status">
        <div class="user-status-picture-count">
        <p class="user-status-picture-count-text">投稿した写真数:{{$users->count()}}枚</p>
        </div>
        <div class="user-status-album-count">
        <p class="user-status-album-count-text">アルバム数:{{$albumcount}}</p>
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
