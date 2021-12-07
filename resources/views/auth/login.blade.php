@extends('auth.start')
@section('content')
<div class="login-wrap">
  <div class="login-html">
    <!-- <input id="tab-1" type="radio" name="tab" class="sign-doc" checked><label for="tab-1" class="tab">Doctor</label> -->
    <input id="tab-2" type="radio" name="tab" class="sign-std" checked><label for="tab-2" class="tab">sing In</label>
    <div class="login-form">

      <div class="sign-in-std">
        <div class="group">
          <label for="user" class="label">Username</label>
          <input id="user" type="text" class="input">
        </div>
        <div class="group">
          <label for="pass" class="label">Password</label>
          <input id="pass" type="password" class="input" data-type="password">
        </div>
        <div class="group">
          <input id="check" type="checkbox" class="check" checked>
          <label for="check"><span class="icon"></span> Keep me Signed in</label>
        </div>
        <div class="group">
          <input type="submit" class="button" value="Sign In">
        </div>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="#forgot">Forgot Password?</a>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection