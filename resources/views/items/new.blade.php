@extends("layouts.default")
@section("title")
新規投稿ページ
@endsection
@include("components/header")
@section("content")
  <div class="upload-wrapper">
    <div class="upload-wrapper-bar">
      <div class="upload-wrapper-bar-each">写真の選択</div>
      <div class="upload-wrapper-bar-each">情報入力</div>
      <div class="upload-wrapper-bar-each">投稿完了</div>
    </div>
    <h2 class="upload-wrapper-text">
      <i class="fas fa-upload"></i>
       写真を投稿する
    </h2>
    <form class="upload-wrapper-form" method="post" aciton="/items/create" enctype="multipart/form-data">
      @csrf
      <div class="upload-wrapper-form-content">
      @include('flush.flush_message')
      @if($errors->has('path'))<p class="upload-wrapper-form-content-text-caution">{{ $errors->first('path') }}</p>@endif
        @if(session("message"))
          <p class="upload-wrapper-form-content-text-caution">{{session("message")}}</p>
        @else 
        @endif 
        <label class="upload-wrapper-form-content-label" for="file_input">
          写真を選択
          <input id="file_input" type="file" class="image-input" name="path">
          <input id="file_input" type="hidden" class="image-input" name="status" value="">
        </label>
        <div class="preview" ></div>
        <div class="upload-wrapper-form-content-title">
          <p class="upload-wrapper-form-content-title-text">タイトル<span class="upload-wrapper-form-content-title-span">[必須]</span></p>
          <input type="text" name="title" id="title_input" class="upload-wrapper-form-content-title-input" placeholder="最大文字数20文字" >
        </div>
        @if($errors->has('title'))<div class="errors-title">{{ $errors->first('title') }}</div>@endif
        <div class="select-box-wrapper">カテゴリーを入力
          <select name="category_id" type="text" class="cp_ipselect cp_sl01">
            <option></option>
            <option name="1" value="1">風景</option>
            <option name="2" value="2">建物・街並み</option>
            <option name="3" value="3">人物</option> 
            <option name="4" value="4">生き物</option> 
          </select> 
        </div>
        @if($errors->has('category_id'))<div class="errors-category">{{ $errors->first('category_id') }}</div>@endif
      </div>
      <div class="btns">
        <input class="btns-upload-btn" type="submit" value="実行">
      </div>
    </form>
  </div>  
@endsection 


