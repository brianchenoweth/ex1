<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Confirmation</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="app.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="proj3.js" type="text/javascript"></script>
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">San Diego Marathon</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>
      <li class="active"><a href="signup.html">Sign Up</a></li>
      </ul>
     
     <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li> -->
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php

$phone = $params[8].'-'.$params[17].'-'.$params[18];

$dob = $params[11].'-'.$params[12].'-'.$params[13];

$name = $params[0].' '.$params[1].' '.$params[2];


echo <<<ENDBLOCK
<div class="container">

        
        
    <h1 class="thanks">$params[0], thank you for registering.</h1>
    <div>
    <table class ="center">
        <tr>
            <td>Name:</td>
            <td>$name</td>
        </tr>
        <tr>
            <td>Address:</td>
            <td>$params[3]</td>
        </tr>
        <tr>
            <td>City:</td>
            <td>$params[5]</td>
        </tr>
        <tr>
            <td>State:</td>
            <td>$params[6]</td>
        </tr>
        <tr>
            <td>Zip:</td>
            <td>$params[7]</td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td>$phone</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>$params[9]</td>
        </tr>
        <tr>
            <td>DOB:</td>
            <td>$dob</td>
        </tr>        
    </table>
    </div> 
</div>                             
ENDBLOCK;


#echo "<p>The raw query string that came from the browser is ",
    #file_get_contents("php://input"),"</p>";

?>
<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous">
</script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">   
</script>
</body></html>