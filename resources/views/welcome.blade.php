<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
	<link rel="shortcut icon" href="https://iannico322.github.io/My-web-page/images/icon.png" type="image/x-icon">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ni-connect</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/login.css')}}">
   

</head>

<body>
    
    <main>
        <div class="row">
            <div class="col-logo">
                <h1>Ni
                    <span
                       class="txt-rotate"
                       data-period="2000"
                       data-rotate='[ "-Connect",  "-Co", " Corp.","-Share"]'></span>
                  </h1>
                <h2>Ni-Connect helps you connect and share with the people in your life.</h2>
            </div>

            <div class="login-form">
                <form class="form-container" id="login" action="authenticate" method="POST">
                    @csrf
                    <br>
                    <input type="text" class="input" name="studID" placeholder="ID Number" required="required">
				    <input type="Password" class="input" name="lastName" placeholder="Password" required="required">
                    <button class="btn-login" type="submit">Login</button>
                    <a href="#" onclick="warning()">Forgotten password?</a>
                </form>
                <button class="btn-new" onclick="popUp()">Create new Account</button>
            </div>
            <?php
			$myfile = fopen('cache/cache.txt', "w") ;
			fwrite($myfile, "");
			fclose($myfile);
			?>
            

            <div class="registration-form" id="register">
                <br>
                <h2>Sign Up</h2>
                <br>
                    <form class="form"  action="{{ url('profile') }}" method="post">
                    {!! csrf_field() !!}
                    <input type="text" class="input" name="studID" placeholder="Student ID" required="required">
                    <input type="text" class="input" name="firstName" placeholder="First Name" required="required">
                    <input type="text" class="input" name="lastName" placeholder="Last Name" required="required">
                    <input type="text" class="input" name="MI" placeholder="MI" required="required">
                    <input type="text" class="input" name="course" placeholder="Course" required="required">
                    <input type="text" class="input" name="yearlevel" placeholder="Year Level" required="required">
                    <br> 
                    <button type="submit" class="submit-btn">Sign Up</button>
                    <br><br>
                    <a href="#" onclick="down()"><b> ↓</b></a>
            </div>
        </div>
    </main>

    <script src="{{url('js/slider.js')}}"></script>
    <script src="{{url('js/typing.js')}}"></script>
</body>
    
</html>
