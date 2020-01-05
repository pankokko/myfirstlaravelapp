@extends("layouts.default")
@section("title")
アルバム作成ページ
@endsection
@include("components/header")
@section("content")
  <div class="upload-wrapper">
    <h2 class="upload-wrapper-text">
      <i class="fas fa-upload"></i>
       アルバムを作成する
    </h2>
    <form class="upload-wrapper-form" method="post" aciton="/albums/create" enctype="multipart/form-data">
      @csrf
      <div class="upload-wrapper-form-content">
        @if(session("message"))
        <p class="upload-wrapper-form-content-text-caution">{{session("message")}}</p>
         @else 
        <p class="upload-wrapper-form-content-text">アルバムのサムネイルを選択してください</p>
         @endif 
        <label class="upload-wrapper-form-content-label" for="file_input">
          サムネイルを選択
          <input id="file_input" type="file" class="image-input" name="thumbnail">
        </label>
        <div class="upload-wrapper-form-content-title">
          <p class="upload-wrapper-form-content-title-text">タイトル<span class="upload-wrapper-form-content-title-span">[必須]</span></p>
          <input type="text" name="albumtitle" id="title_input" class="upload-wrapper-form-content-title-input">
        </div>
        <div class="upload-wrapper-form-content-description">
           <p class="upload-wrapper-form-content-description-text">説明文<span class="upload-wrapper-form-content-description-span">[必須]</span></p>
          <textarea type="text" name="description" id="description_input" class="upload-wrapper-form-content-description-textarea" ></textarea>
        </div>
      </div>
      <div class="btns">
        <input class="btns-upload-btn" type="submit" value="実行">
      </div>
    </form>
  </div>  
@endsection 


