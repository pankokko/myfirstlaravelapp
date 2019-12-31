@extends("layouts/default")
@include("components/header")
@section("content")
<div class="search">
  <div class="search-text">
    <p class="search-text-p"><span class="search-text-p-span">{{$keyword}}</span>の検索結果</p>
  </div>
  <div class="search-pictures">
      @foreach ($query as $result)
      <div class="search-pictures-wrapper"> 
        <a  class="search-pictures-wrapper-link" href="/items/{{$result->id}}/show">
          <img class="search-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$result->path)}}"width="350" height="220px">
        </a>
        <p class="search-pictures-wrapper-title">{{$result->title}}</p>
      </div>
     
      @endforeach
  </div>
</div>  
@endsection