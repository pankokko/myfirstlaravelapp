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
    {{Form::open(["class" => "upload-wrapper-form" ,"files" => true ,"action" => "albumsController@create", "method" => "post" ,"enctype" =>"multipart/form-data"])}}
      <div class="upload-wrapper-form-content">
        @if($errors->has('thumbnail'))<div class="upload-wrapper-form-content-text">{{ $errors->first('thumbnail') }}</div>@endif
        @if(session("message"))
        <p class="upload-wrapper-form-content-text-caution">{{session("message")}}</p>
         @else 
         @endif 
          {{Form::label('file_input', "サムネイルを選択", ['class' => 'upload-wrapper-form-content-label'])}}
          {{Form::file("thumbnail",["id" => "file_input" ,"class" => "image-input"])}}
          <div class="preview" ></div>
          @if($errors->has('albumtitle'))<div class="errors-title">{{ $errors->first('albumtitle') }}</div>@endif
        <div class="upload-wrapper-form-content-title">
          <p class="upload-wrapper-form-content-title-text">タイトル<span class="upload-wrapper-form-content-title-span">[必須]</span></p>
          {{Form::text("albumtitle",null,["id" => "title_input", "class" => "upload-wrapper-form-content-title-input"])}}
        </div>
        <div class="upload-wrapper-form-content-description">
           <p class="upload-wrapper-form-content-description-text">説明文<span class="upload-wrapper-form-content-description-span">[必須]</span></p>
          <textarea type="text" name="description" id="description_input" class="upload-wrapper-form-content-description-textarea" ></textarea>
        </div>
        @if($errors->has('description'))<div class="errors-description">{{ $errors->first('description') }}</div>@endif
      </div>
      <div class="btns">
        {{Form::submit("実行",["class" => "btns-upload-btn"])}}
      </div>
    {{Form::close()}}
  </div>  
@endsection 


