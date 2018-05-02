<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login to access this file | SH File Hosting</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Raleway'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <form action="#" id="login-form">
  {{csrf_field()}}
  <input type="hidden" id="deg" name="deg" value="emm"/>
  <input type="hidden" id="uu" value="{{url('conquer')}}"/>
  <div class="heading">Are you human? Login to continue</div>
  <div class="left">
    <label for="email" id="emm">Email</label> <br />
    <input type="email" name="email" id="email" /> <br />
    <label for="password" id="ppp">Password</label> <br />
    <input type="password" name="pass" id="pass" /> <br />
    <input type="submit" value="Login" />
	<div id="working"></div>
  </div>
  <div class="right">
    <div class="connect">Login with</div>
    <a href="#" id="a-google" class="google-plus">
<!--       <span class="fontawesome-google-plus"></span> -->
      <i class="fa fa-google-plus" aria-hidden="true"></i>
    </a>
    <a href="#" id="a-yahoo" class="yahoo">
<!--       <span class="fontawesome-google-plus"></span> -->
      <i class="fa fa-yahoo" aria-hidden="true"></i>
    </a>
    <a href="#" id="a-outlook" class="outlook">
<!--       <span class="fontawesome-google-plus"></span> -->
      <img src="images/outlook.png" style="width: 30px; height: 25px;"> Outlook
    </a>
    <a href="#" id="a-aol" class="aol">
<!--       <span class="fontawesome-google-plus"></span> -->
     <img src="images/aol.png" style="width: 60px; height: 50px;">
    </a>
    <a href="#" id="a-protonmail" class="protonmail">
<!--       <span class="fontawesome-google-plus"></span> -->
         <img src="images/protonmail.png" style="width: 80px; height: 45px;">
    </a>
  </div>
</form>
  
  

    <script src="js/jquery-1.12.0.min.js"></script>
    <script  src="js/index.js"></script>




</body>

</html>
