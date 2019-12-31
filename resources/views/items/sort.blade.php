@extends("layouts/default")
@section("content")
<form  action="/items/search" method="get">
  @csrf
  <select name="category_id" onchange="this.form.submit()" >
    <option></option>
    <option name="1" value="1">風景</option>
    <option name="2" value="2">街並み</option>
    <option name="3" value="3">人物</option> 
  </select>
</form>
@section("content")