@extends('layouts.app')


@section('content')
<style>
           .thankyou-wrapper{
  width:100%;
  height:480px;
  margin:auto;
  background:#ffffff; 
  padding:10px 0px 50px;
  display:flex;
  flex-direction:column;
  border-bottom:1px solid black;

  
  
}
.thankyou-wrapper h1{
  font:50px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:0px 10px 0px;
  font-weight: 600;
 
}
.thankyou-wrapper p{
  font:20px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:5px 10px 10px;
}
.thankyou-wrapper a{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background:#a20505;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-radius: 50px;
  
}
.thankyou-wrapper a:hover{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background:#7c0505;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  
  
}
@media (max-width: 600px) {
    .thankyou-wrapper h1{
        margin-left:-350px;
        margin-top:-70px;
        font-size:33px;
}
    .thankyou-wrapper{
        height: 570px;
        
    }
    
}
</style>
<div class="login-main-wrapper">
        <div class="main-container">
            <div class="login-process">
                <div class="login-main-container">
                    <div class="thankyou-wrapper">
                        <div style="margin-bottom:90px; margin-left:350px; margin-top:90px;"><h1>Thank You for Registering!</h1></div>
                        
                        
                          <p style="margin-bottom:30px;">If you have any queries regarding the registration, please contact: 9663157310 | 7025589575</p>
                         
                          <a href="https://kpkkwa.org/">Back to Home</a>
                          <div class="clr"></div>
                      </div>
                      <div class="clr"></div>
                  </div>
              </div>
              <div class="clr"></div>
          </div>
      </div>

      @endsection      