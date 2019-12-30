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
      <p class="discription">{{$item->title}}<span class="discription-text"> taken by {{$item->user->name}}</span>
        @if(Auth::user()->id == $item->user->id)
          <form action="/items/{{$item->id}}/destroy" method="post">
            @csrf
            {{ method_field('delete')}}
            <i class="fas fa-trash">
              <input id="delete-input" type="submit" value="削除">
            </i>
          </form>
        @endif
      </p>
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