@extends("layouts/default")
@include("components/header")
@section("title")
{{$item->title}}
@endsection
@section("content")
<div class="show-wrapper">
  <div class="show-wrapper-toppic">
  <a href="#modal-01">
    <img class="show-image" src="{{asset('/storage/temp/'.$item->path)}}" width="94%" height="600px">
  </a>
  </div>
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
      @if(Auth::check() != true)
        <button type="submit" readonly>
          <i class="fas fa-thumbs-up"></i>
          Like {{ $item->likes_count }}
        </button>
      @endif
      @if (Auth::check())
      @if ($user_like)
        <form class="likes-form" action="/items/{{$item->id}}/show/likes/{{$user_like->id}}" method="post">
          @csrf 
          {{method_field("delete")}}
          <button type="submit">
            <i class="fas fa-thumbs-up"></i>
            Like {{ $item->likes_count }}
          </button>
        </form>
      @else
       <form class="likes-form" action="/items/{{$item->id}}/show/likes" method="post">
        @csrf
          <button type="submit">
            <i class="fas fa-thumbs-up"></i>
            Like {{ $item->likes_count }}
          </button>
      </form>
      @endif
      @endif
      @if(Auth::id() == $item->user->id)
      <div class="discription-formtag">
        <form action="/items/{{$item->id}}/destroy" method="post">
          @csrf
          {{ method_field('delete')}}
          <i class="fas fa-trash">
            <input id="delete-input" type="submit" value="削除">
          </i>
        </form>
      </div>
      @endif
    </div>
  <div class="comment-wrapper">
  <h1 class="comment-wrapper-comment">コメント<span class="comment-wrapper-comment-count"> {{$comments->count()}}件</span></h1>
      @foreach($comments as $comment)
      <div class="comment-wrapper-user">
        <a class="comment-wrapper-user-link">
          @empty($comment->user->profilepic)
          <img src="//static.mercdn.net/images/member_photo_noimage_thumb.png" width="40" height="40">
          @else
          <img class="profile-wrapper-picture-image" src="{{asset('/storage/userpic/'.$comment->user->profilepic)}}"  width="40" height="40">
          @endif
        </a>
        <p class="comment-wrapper-user-name"><a class="comment-wrapper-user-name-link">{{$comment->user->name}}</a></p>
      <p class="comment-wrapper-user-text">{!! nl2br(e($comment->comment)) !!}</p>
        <div  class="comment-wrapper-user-date">
          <span class="comment-wrapper-user-date-timedate">{{$comment->created_at}}
          @if(Auth::id() == $comment->user_id)
          <form action="/comments/{{$comment->id}}/destroy" class="comment-delete" method="post" >
            @csrf
            {{ method_field('delete')}}
            <i class="fas fa-trash">
              <input id="delete-input" class="" type="submit" value="削除">
            </i>
          </form>
          @endif 
        </span>
        </div> 
      </div>
      @endforeach
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