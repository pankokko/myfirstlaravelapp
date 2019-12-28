@extends("layouts.default")

@section("content")
  <div class="show-wrapper">
    <a href="#modal-01">
      <img src="{{asset("images/DSC00178.JPG")}}" width="94%" height="600px">
    </a>
    <div class="modal-wrapper" id="modal-01">
      <a href="#!" class="modal-overlay"></a>
      <div class="modal-window">
        <div class="modal-content">
          <img src="{{asset("images/DSC00178.JPG")}}" width="100%">
        </div>
          <a href="#!" class="modal-close">×</a>
      </div>
    </div>
  </div>
@endsection 