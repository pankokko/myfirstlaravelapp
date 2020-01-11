@extends("layouts.default")
@section("title")
写真をアルバムに追加
@endsection
@include("components/header")
@section("content")
  <div class="upload-wrapper">
    <h2 class="upload-wrapper-text">
      <i class="fas fa-upload"></i>
       写真を追加する
    </h2>
    <form class="upload-wrapper-form" method="post" aciton="/albums/store" enctype="multipart/form-data">
      @csrf
      <div class="upload-wrapper-form-content">
        @if(session("message"))
        <p class="upload-wrapper-form-content-text-caution">{{session("message")}}</p>
         @else 
        <p class="upload-wrapper-form-content-text">追加する写真を選択してください</p>
         @endif 
        <label class="upload-wrapper-form-content-label" for="file_input">
          写真を選択
          <input id="file_input" type="file" class="image-input" name="path">
          <input  type="hidden" class="hidden-field" name="status" value="onlyalbum">
        </label>
        <div class="upload-wrapper-form-content-title">
          <p class="upload-wrapper-form-content-title-text">タイトル<span class="upload-wrapper-form-content-title-span">[必須]</span></p>
          <input type="text" name="title" id="title_input" class="upload-wrapper-form-content-title-input" placeholder="最大文字数20文字" >
        </div>
        <div class="select-box-wrapper">カテゴリーを入力
          <select name="category_id" type="text" class="cp_ipselect cp_sl01">
            <option></option>
            <option name="1" value="1">風景</option>
            <option name="2" value="2">建物・街並み</option>
            <option name="3" value="3">人物</option> 
            <option name="4" value="4">生き物</option> 
          </select> 
        </div>
      </div>
      <div class="btns">
        <input class="btns-upload-btn" type="submit" value="実行">
      </div>
    </form>
  </div>  
@endsection 

