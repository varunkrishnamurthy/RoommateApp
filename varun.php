<!doctype html>

<?php

session_start();

echo $_SESSION['fbloginid'];

?>

<html lang="en">
<head>
  <style>
  

  #logo {
    vertical-align: text-top;
    padding-left: 300px;
    padding-top: 200px;
  }
  #account
  {
    position:absolute;
    top:0;
    right:0;
  }
  </style>
  <title> HomePage </title>
  <link rel="stylesheet" href="css/default.css">
  <link rel="stylesheet" href="css/layout.css">
  <link rel="stylesheet" href="css/media-queries.css">
  <link rel="stylesheet" href="css/magnific-popup.css"> 
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    window.MyLib = (response["authResponse"])["userID"]; 
    console.log(window.MyLib);  
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
      'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
      'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '772616462869906',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.5' // use graph api version 2.5
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

};

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=email,name,age_range,gender,picture', function(response) {
     console.log('stringify' + JSON.stringify(response));
     var w = window.open("varunprofile.php");
     w.myVariable = response;
     console.log('MyID=' + window.MyLib);
     console.log(response["authResponse"]);
     console.log('https://graph.facebook.com/'+(window.MyLib)+'/picture?width=9999');
     w.myUrl='https://graph.facebook.com/'+(window.MyLib)+'/picture?width=9999';
     console.log('Successful login for: ' + response.name);
     console.log(response);
     window.open("main.php?userID=" + window.MyLib + "&name=" + response.name+ "&email=" + response.email+"&email=" + response.email +"&url=" + 'https://graph.facebook.com/'+(window.MyLib)+'/picture?width=9999'+ "&gender=" + response.gender + "&birthday=" + response.birthday);
     document.getElementById('status').innerHTML =
     'Thanks for logging in, ' + response.name + '!';
   });
  }
  </script>

  
  
</head>

<body>
 <header id="home">

  <nav id="nav-wrap">

   <ul id="nav" class="nav">
    <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
    <li><a class="smoothscroll" href="#about">About</a></li>
    <li><a class="smoothscroll" href="#team">Meet The Team</a></li>
    <li><a class="smoothscroll" href="#courses">Contact</a></li>

    <button type="button" id="account" class="btn btn-link">Create Account</button>
  </ul> <!-- end #nav -->



</nav> <!-- end #nav-wrap -->

<div class="row banner">
 <div class="banner-text">
  <h1 class="responsive-headline">Roommate Finder</h1>
  <h3><span>CSE 437 Project</span></h3>
  <hr />
</div>
</div>

<fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();">
</fb:login-button>

<p class="scrolldown">
 <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
</p>

</header> <!-- Header End -->


<section id="about">


  <div id="profile" class="container">
    <h2>About</h2>
    <div class="container">
      <p class="desc">
        This website is desgined to match you to a roommate that is a best fit for your personality!
        We are still in development mode and we appreciate your patience while we work hard to providing
        you with the best platform to find a roommate.
      </p>        

    </div>
    <br>
    <br>




    <br>
    <br>

  </div>
  
  
  
  

</section> <!-- About Section End-->

<!-- Team Section ================================================== -->
<section id="team">


  <div id="profile" class="container">
    <h2>Meet The Team</h2>
    <div class="container">

      <table class="profile" style="width: 800px">
        <thead>
          <tr>
            <th class="propic" style="width: 500px">
             <img class="img1" src="http://i.imgur.com/BxviS79.jpg"   alt="Varun Krishnamurthy" width="100" height="100" />
             <img class="img2" src="http://i.imgur.com/1LHmLoa.jpg"   alt="Gokul Krishnan" width="100" height="100" />
             <img class="img3" src="http://i.imgur.com/rWwhpLO.jpg"   alt="Ashley Peterson" width="100" height="100" />
             <img class="img4" src="http://i.imgur.com/3ALwu9V.jpg"   alt="Piyush Prasad" width="100" height="100" />
             <img class="img5" src="http://i.imgur.com/0sN44Z0.jpg"   alt="Sunny Shah" width="100" height="100" />
           </th>

         </tr>
       </thead>

     </table>
   </div>
   <br>
   <br>



  <br>
  <br>

</div>





</section> <!-- Team Section End-->


<!-- Resume Section ================================================== -->

<p>&copy; 2016 Ashley, Gokul, Piyush, Sunny & Varun<p>
  <!-- Insert your content here -->
</body>
</html>

