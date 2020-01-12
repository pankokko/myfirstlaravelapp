@extends("layouts/default")
@include("components/header")
@section("title")
{{$album->title}}
@endsection
@section("content")
<div class="show-wrapper">
  <div class="show-wrapper-toppic">
    <a href="#modal-01">
      <img src="{{asset('/storage/albumpic/'.$album->path)}}" width="94%" height="600px">
    </a>
  </div>
    <div class="modal-wrapper" id="modal-01">
      <a href="#!" class="modal-overlay"></a>
      <div class="modal-window">
        <div class="modal-content">
          <img src="{{asset( '/storage/albumpic/'. $album->path )}}" width="100%" >
        </div>
          <a href="#!" class="modal-close">×</a>
      </div>
    </div>
      <div class="discription"><p>{{$album->title}}<span class="discription-text"> taken by {{$album->user->name}}</span></p>
        @if(Auth::id() == $album->user->id)
        <div class="discription-formtag">
          <form action="/albums/{{$album->id}}/remove" method="post">
            @csrf
            {{ method_field('delete')}}
            <i class="fas fa-trash">
              <input id="delete-input" type="submit" value="削除">
            </i>
          </form>
        </div>
        @endif
      </div>
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