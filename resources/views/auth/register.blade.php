<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register – University Portal</title>

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

</head>


<body>


<div class="login-card">


    {{-- Left Panel --}}
    <div class="login-left">

        <div class="crest">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>


        <h1>
            University Portal
        </h1>


        <p class="tagline">
            Join Academic Excellence
        </p>


        <div class="left-divider"></div>


        <p class="left-quote">

        Create your account and become part of the digital university community.

        </p>


    </div>




    {{-- Right Panel --}}

    <div class="login-right">


        <div class="top-bar"></div>


        <h2>
            Create Account
        </h2>


        <p class="subtitle">
            Register to access your portal
        </p>




        @if ($errors->any())

        <div class="alert-error">

            {{ $errors->first() }}

        </div>

        @endif




<form method="POST" action="{{ route('register') }}">

@csrf



<div class="field">

<label>
Name
</label>


<div class="input-wrap">


<input

type="text"

name="name"

placeholder="Enter your name"

required


>


</div>


</div>





<div class="field">

<label>
University Email
</label>


<div class="input-wrap">


<input

type="email"

name="email"

placeholder="username@limu.edu.ly"

required


>


</div>


</div>





<div class="field">

<label>
Password
</label>


<div class="input-wrap">


<input

type="password"

name="password"

placeholder="Create password"

required


>


</div>


</div>






<div class="field">

<label>
Confirm Password
</label>


<div class="input-wrap">


<input

type="password"

name="password_confirmation"

placeholder="Confirm password"

required


>


</div>


</div>





<button class="btn-login" type="submit">


<i class="fa-solid fa-user-graduate"></i>

Create Account


</button>



</form>




</div>


</div>



</body>


</html>