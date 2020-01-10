@extends('layouts.default')
@section("title")
インデックスページ
@endsection
@include("components/header")
@section('content')
<div class="categories-container">
@if($category_id == 1)
  <div class="categories-container-wrapper">
    <h2 class="categories-container-wrapper-title">風景の新着投稿</h2>
    <p class="categories-container-wrapper-title-text">こちらではみなさんから投稿された風景の写真をご紹介いたします。<br>
      ぜひお気に入りの写真を見つけてみてください。</p>
  </div>
@elseif($category_id == 2)
  <div class="categories-container-wrapper">
    <h2 class="categories-container-wrapper-title">建物・街並みの新着投稿</h2>
    <p class="categories-container-wrapper-title-text">こちらではみなさんから投稿された建物・街並みの写真をご紹介いたします。<br>
      ぜひお気に入りの写真を見つけてみてください。</p>
  </div>
@elseif($category_id == 3)
  <div class="categories-container-wrapper">
    <h2 class="categories-container-wrapper-title">人物</h2>
    <p class="categories-container-wrapper-title-text">こちらではみなさんから投稿された人物写真やポートレートの写真をご紹介いたします。<br>
      ぜひお気に入りの写真を見つけてみてください。</p>
  </div>
@elseif($category_id == 4)
  <div class="categories-container-wrapper">
    <h2 class="categories-container-wrapper-title">生き物</h2>
    <p class="categories-container-wrapper-title-text">こちらではみなさんから投稿された生き物全判の写真をご紹介いたします。<br>
    ぜひお気に入りの写真を見つけてみてください。</p>
  </div>
@endif
  <div class="categories-pictures">
  @if(isset($items))
     @foreach ($items as $item) 
      <div class="categories-pictures-wrapper"> 
        <a  class="top-pictures-wrapper-link"  href="/items/{{ $item->id }}/show">
          <img class="categories-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$item->path)}}"  width="327" height="210px">
        </a>
      </div>
    @endforeach
  @else
    <p>何もありません</p>
  @endif
  </div>
</div>
<div class="pagination-wrapper">
{{$items->links()}}
</div>
@endsection
