@extends("layouts/default")
@include("components/header")
@section("title")
詳細ページ
@endsection
@section("content")
<div class="show-wrapper">
    <a href="#modal-01">
      <img src="{{asset('/storage/albumpic/'.$album->path)}}" width="94%" height="600px">
    </a>
    <div class="modal-wrapper" id="modal-01">
      <a href="#!" class="modal-overlay"></a>
      <div class="modal-window">
        <div class="modal-content">
          <img src="{{asset( '/storage/albumpic/'. $album->path )}}" width="100%" >
        </div>
          <a href="#!" class="modal-close">×</a>
      </div>
    </div>
      <p class="discription">{{$album->title}}<span class="discription-text"> taken by {{$album->user->name}}</span>
        @if(Auth::check() && Auth::user()->id == $album->user->id)
          <form action="/items/{{$album->id}}/destroy" method="post">
            @csrf
            {{ method_field('delete')}}
            <i class="fas fa-trash">
              <input id="delete-input" type="submit" value="削除">
            </i>
          </form>
        @endif
      </p>
       <div class=other-pics-wrapper>
        <p class="user-other-pics">アルバム名 {{$thisalbum->albumtitle}} の写真一覧</p>
        <div class="show-pictures">
          @foreach($pictures as $item)
            <div class="show-pictures-wrapper"> 
              <a class="show-pictures-wrapper-link"  href="/albums/{{ $item->id }}/detail " >
                <img class="show-pictures-wrapper-picture"  src="{{asset('/storage/albumpic/'.$item->path)}}" width="100%" height="180px">
              </a>
            </div>
          @endforeach 
        </div>
      </div> 
  </div>
@endsection