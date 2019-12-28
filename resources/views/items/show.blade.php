@extends("layouts.default")
@section("content")
  <div class="show-wrapper">
    <a href="#modal-01">
      <img src="{{asset('/storage/temp/'.$item->path)}}" width="94%" height="600px">
    </a>
    <div class="modal-wrapper" id="modal-01">
      <a href="#!" class="modal-overlay"></a>
      <div class="modal-window">
        <div class="modal-content">
          <img src="{{asset('/storage/temp/'.$item->path)}}" width="100%">
        </div>
          <a href="#!" class="modal-close">×</a>
      </div>
    </div>
      <p class="discription">{{$item->title}} taken by {{$name}}</p>
      <div class=other-pics-wrapper>
      <p class="user-other-pics">{{$name}}さんの他の作品</p>
        <div class="show-pictures">
        @if($items != null)
          @foreach($items as $picture)
          <div class="show-pictures-wrapper"> 
            <a  class="show-pictures-wrapper-link" href="#">
              <img class="show-pictures-wrapper-picture"  src="{{asset('/storage/temp/'.$picture->path)}}" width="100%" height="180px">
            </a>
          </div>
          @endforeach 
          @endif
        </div>
      </div>
  </div>
@endsection 