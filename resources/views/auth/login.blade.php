@extends('layouts.app')

@section('content')
<div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" method="POST" action="{{ route('login') }}">
                
                   @csrf
                    <div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>
                    
                 @error('email')
                 <div class="form-error-text-block" data-error-list="">
                
                <ul>
                <li>{{ $message }}</li> 
                </ul> 
                </div>
                
                 @enderror
                  @error('password')
                  <div class="form-error-text-block" data-error-list="">
                
                <ul>
                <li>{{ $message }}</li></ul>  </div>
                @enderror
              
                    <header class="sign-title">Sign In</header>
                    <div class="form-group">
                        <input type="email" name="email" required class="form-control" placeholder="E-Mail"/>
                            
                    </div>
                    
                 
                    <div class="form-group">
                        <input type="password" name="password" required  class="form-control" placeholder="Password"/>
                        
                    </div>
                    
                    <!--div class="form-group">
                        <div class="checkbox float-left">
                            <input type="checkbox" id="signed-in"/>
                            <label for="signed-in">Keep me signed in</label>
                        </div>
                        <div class="float-right reset">
                            <a href="reset-password.html">Reset Password</a>
                        </div>
                    </div!-->
                    <button type="submit" class="btn btn-rounded">Sign in</button>
                    <!--p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div>
@endsection
