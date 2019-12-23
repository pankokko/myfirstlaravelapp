@extends("layouts.default")
@section("title")
新規投稿ページ
@endsection
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
        <p class="upload-wrapper-form-content-text">投稿する写真を選択してください</p>
        {{-- <input type="hidden" name="fake" id="uploadType" value="default"> --}}
        <label class="upload-wrapper-form-content-label" for="file_input">
          写真を選択
          <input id="file_input" type="file" class="image-input" name="path">
        </label>
      </div>
      <div class="btns">
        <input class="btns-upload-btn" type="button" value="キャンセル">
        <input class="btns-upload-btn" type="submit" value="実行">
      </div>
    </form>
  </div>  
@endsection 


