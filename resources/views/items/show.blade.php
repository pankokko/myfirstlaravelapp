@extends("layouts/default")
@include("components/header")
@section("content")
<div class="show-wrapper">
  <a href="#modal-01">
    <img src="{{asset('/storage/temp/'.$item->path)}}" width="94%" height="600px">
  </a>
  <div class="modal-wrapper" id="modal-01">
    <a href="#!" class="modal-overlay"></a>
    <div class="modal-window">
      <div class="modal-content">
        <img src="{{asset('/storage/temp/'.$item->path)}}" width="100%" >
      </div>
        <a href="#!" class="modal-close">×</a>
    </div>
  </div>
    <div class="discription"><p>{{$item->title}}<span class="discription-text"> taken by {{$item->user->name}}</span></p>
      {{-- @if(Auth::check() && Auth::user()->id == $item->user->id)
      <div class="discription-formtag">
        <form action="/items/{{$item->id}}/destroy" method="post">
          @csrf
          {{ method_field('delete')}}
          <i class="fas fa-trash">
            <input id="delete-input" type="submit" value="削除">
          </i>
        </form>
      </div>
      @endif --}}
    </div>

  <div class="comment-wrapper">
    <h1 class="comment-wrapper-comment">コメント<span class="comment-wrapper-comment-count">5件</span></h1>
    <div class="comment-wrapper-user">
      <a class="comment-wrapper-user-link">
        <img src="http://get.secret.jp/pt/file/1578535787.JPG"width="40" height="40">
      </a>
      <p class="comment-wrapper-user-name"><a class="comment-wrapper-user-name-link">USER NAME</a></p>
      <p class="comment-wrapper-user-text">COMMENT body COMMENT body COMMENT body COMMENT </p>
      <div  class="comment-wrapper-user-date">
      <span class="comment-wrapper-user-date-timedate">2020年1月8日12時00分 
        {{-- @if(Auth::check() && Auth::user()->id == $item->user->id)
          <form action="/items/{{$item->id}}/destroy" class="comment-delete" method="post">
          @csrf
          {{ method_field('delete')}}
          <i class="fas fa-trash">
            <input id="delete-input" class="" type="submit" value="削除">
          </i>
          </form>
        @endif --}}
      </span>
    </div> 
    </div>
    <div class="comment-wrapper-user">
      <a class="comment-wrapper-user-link">
        <img src="http://get.secret.jp/pt/file/1578535787.JPG"width="40" height="40">
      </a>
      <p class="comment-wrapper-user-name"><a class="comment-wrapper-user-name-link">USER NAME</a></p>
      <p class="comment-wrapper-user-text">COMMENT body COMMENT body COMMENT body COMMENT body</p>
      <p  class="comment-wrapper-user-date"><span class="comment-wrapper-user-date-timedate">2020年1月8日12時00分</span></p> 
    </div>
    <div class="comment-wrapper-user">
      <a class="comment-wrapper-user-link">
        <img src="http://get.secret.jp/pt/file/1578535787.JPG"width="40" height="40">
      </a>
      <p class="comment-wrapper-user-name"><a class="comment-wrapper-user-name-link">USER NAME</a></p>
      <p class="comment-wrapper-user-text">COMMENT body COMMENT body COMMENT body COMMENT body</p>
      <p  class="comment-wrapper-user-date"><span class="comment-wrapper-user-date-timedate">2020年1月8日12時00分</span></p> 
    </div>
  <form class="comment-form-wrapper" method="post" aciton="{{ route('comments/create') }}" >
    @csrf
    <div class="comment-wrapper-form-content-description">
      <input  type="hidden" class="image-input" name="item_id" value="{{$item->id}}">
      <textarea type="text" name="comment" id="description_input" class="comment-wrapper-form-content-description-textarea" placeholder="コメントを入力"></textarea>
    </div>
    <div class="btns">
      <input class="btns-comment-btn" type="submit" value="投稿">
    </div>
  </form>
  </div>

  <div class=other-pics-wrapper>
    <p class="user-other-pics">{{$item->user->name}}さんの他の作品</p>
    <div class="show-pictures">
      @foreach($items as $item)
        <div class="show-pictures-wrapper"> 
          <a class="show-pictures-wrapper-link"  href="/items/{{ $item->id }}/show " >
            <img class="show-pictures-wrapper-picture"  src="{{asset('/storage/temp/'.$item->path)}}" width="100%" height="180px">
          </a>
        </div>
      @endforeach 
    </div>
  </div>
</div>
@endsection 