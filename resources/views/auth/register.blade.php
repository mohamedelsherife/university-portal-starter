<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up – University Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-card">

    {{-- Left Panel --}}
    <div class="login-left">
        <div class="crest"><i class="fa-solid fa-building-columns"></i></div>
        <h1>University Portal</h1>
        <p class="tagline">Academic Excellence</p>
        <div class="left-divider"></div>
        <p class="left-quote">Empowering students, faculty, and staff through a unified digital campus.</p>
    </div>

    {{-- Right Panel --}}
    <div class="login-right">
        <div class="top-bar"></div>
        <h2>Create account</h2>
        <p class="subtitle">Sign up to access your portal</p>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <label for="name">Full Name</label>
                <div class="input-wrap">
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="John Doe"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    />
                </div>
            </div>

            <div class="field">
                <label for="email">University Email</label>
                <div class="input-wrap">
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="username@limu.edu.ly"
                        value="{{ old('email') }}"
                        required
                    />
                </div>
            </div>

            <div class="field">
    <label for="password">Password</label>
    <div class="input-wrap">
        <input
            type="password"
            name="password"
            id="password"
            class="password-field"
            placeholder="Create a password"
            required
        />
        <i class="fa-regular fa-eye toggle-password" data-target="password"></i>
    </div>
</div>

<div class="field">
    <label for="password_confirmation">Confirm Password</label>
    <div class="input-wrap">
        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="password-field"
            placeholder="Re-enter your password"
            required
        />
        <i class="fa-regular fa-eye toggle-password" data-target="password_confirmation"></i>
    </div>
</div>

            <button type="submit" class="btn-login">Sign up</button>

            <p class="bottom-text">
                Already have an account?
                <a href="{{ route('login') }}" class="bottom-link">Log in</a>
            </p>

        </form>
    </div>

</div>

<script>
document.querySelectorAll('.toggle-password').forEach(function (icon) {
    icon.addEventListener('click', function () {
        const input = document.getElementById(this.dataset.target);
        const isHidden = input.type === 'password';

        input.type = isHidden ? 'text' : 'password';
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});
</script>
</body>
</html>
