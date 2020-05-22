<form method="post" action="{{ route('contact.store')}}">
  @csrf
  <p>名前</p>
  <input type="text" name="name" >
  
  <p>宛先emailaddress</p>
  <input type="email" name="email" >

  <p>テキスト</p>
  <textarea  name="body" ></textarea>
<button type="submit"></button>
</form>