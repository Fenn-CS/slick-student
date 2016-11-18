@extends('layouts.auth')

@section('content')
<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
         <form role="login" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
          <img src="{{asset('dist/img/slick.png')}}" class="img-responsive" alt="" />

            <div class="form-group{{ $errors->has('reg_number') ? ' has-error' : '' }}">

                            <div class="">
                                 <input type="text" name="reg_number" required class="form-control input-lg" placeholder="CT15HND001" value="{{ old('reg_number') }}"/>

                                @if ($errors->has('reg_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reg_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="">
                                 <input type="password" class="form-control input-lg" id="password" placeholder="Password" required="" name="password"/>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="go" class="btn btn-lg btn-slick btn-block">Sign in</button>
          <div>
           <a href="{{ url('/password/reset') }}" style="color:#FF5555">reset password</a>
          </div>
          
        </form>
        
        <div class="form-links">
          <a href="#">www.slick-student.com</a>
        </div>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>
  
 <!-- <p>
    <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fbootsnipp.com%2Fiframe%2FW00op" 

target="_blank"><small>HTML</small><sup>5</sup></a>
    <br>
    <br>
    
  </p>   -->  
  
  
</div>


@endsection
