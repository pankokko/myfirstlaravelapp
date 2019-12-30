@extends("layouts/default")
@include("components/header")
@section("content")
  <div class="user-container">
    <p class="user-container-name">{{Auth::user()->name}}</p>
    <div class="user-container-nav">
      <div class="user-container-nav-list">
        <a class="ser-container-nav-list-link" href="#">写真一覧</a>
      </div>
      <form  action="/users/sort" method="post">
          <select name="category_id" type="text"onchange="this.form.submit()" >
            <option></option>
            <option name="1" value="1">風景</option>
            <option name="2" value="2"> 街並み</option>
            <option name="3" value="3">人物</option> 
          </select>
      </form>
    </div>
  </div>
  <div class="user-pictures">
    @if(isset($users))
       @foreach ($users->items as $user) 
        <div class="user-pictures-wrapper"> 
            <a  class="top-pictures-wrapper-link"  href="/items/{{ $user->id }}/show">
            <img class="user-pictures-wrapper-picture" src="{{asset('/storage/temp/'.$user->path)}}"  width="300" height="150px">
          </a>
        </div>
      @endforeach
    @else
      <p>何もありません</p>
    @endif
  </div>
@endsection 
