<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Portal - Welcome</title>
    
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>

    <div class="welcome-container">
        <div class="glass-card">
            
            <div class="graduation-icon">
                <svg viewBox="0 0 100 100">
                    <path class="cap" d="M50 15 L90 35 L50 55 L10 35 Z" />
                    <path class="cap-body" d="M25 42.5 V65 C 25 75, 75 75, 75 65 V42.5" />
                    <path d="M90 35 V60" stroke="#F2B33D" stroke-width="3" fill="none"/>
                    <circle cx="90" cy="60" r="4" fill="#F2B33D" />
                </svg>
            </div>

            <h1>University Portal</h1>
            <p>Smart academic management system for students, courses, departments and professors.</p>

            <div class="buttons">
                <a href="{{ route('login') }}" class="glass-btn gold" onclick="showLoginPopup(event)">
                    <div class="person-icon">
                        <svg viewBox="0 0 64 64">
                            <circle cx="32" cy="22" r="10"/>
                            <path d="M14 54 C14 40, 50 40, 50 54" />
                        </svg>
                    </div>
                    Login
                </a>

                <a href="{{ route('register') }}" class="glass-btn white-glass" onclick="showRegisterPopup(event)">
                    <div class="person-icon">
                        <svg viewBox="0 0 64 64">
                            <circle cx="28" cy="22" r="10"/>
                            <path d="M10 54 C10 40, 46 40, 46 54" />
                            <line x1="54" y1="22" x2="54" y2="38" stroke-linecap="round"/>
                            <line x1="46" y1="30" x2="62" y2="30" stroke-linecap="round"/>
                        </svg>
                    </div>
                    Sign Up
                </a>
            </div>
        </div>
    </div>

    <div id="loginPopup" class="popup">
        <div class="popup-box">
            <div class="popup-cap">
                <svg viewBox="0 0 100 100">
                    <path fill="#F2B33D" d="M50 15 L90 35 L50 55 L10 35 Z" />
                    <path fill="#fff" d="M25 42.5 V65 C 25 75, 75 75, 75 65 V42.5" />
                </svg>
            </div>
            <h2>Welcome Back!</h2>
            <p>We are glad to see you again in our academic system. Click continue to securely access your portal account.</p>
            <div class="popup-buttons">
                <button class="btn-confirm" id="confirmLoginBtn">Continue to Portal</button>
            </div>
        </div>
    </div>

    <div id="registerPopup" class="popup">
        <div class="popup-box">
            <div class="popup-cap">
                <svg viewBox="0 0 100 100">
                    <path fill="#F2B33D" d="M50 15 L90 35 L50 55 L10 35 Z" />
                    <path fill="#fff" d="M25 42.5 V65 C 25 75, 75 75, 75 65 V42.5" />
                </svg>
            </div>
            <h2>Confirm Account Registration?</h2>
            <p>Are you sure you want to proceed and create a new student account inside the university portal system?</p>
            <div class="popup-buttons">
                <button class="btn-confirm" id="confirmRegisterBtn">Yes, Proceed</button>
                <button class="btn-cancel" onclick="closePopup('registerPopup')">Cancel</button>
            </div>
        </div>
    </div>

    <script>
        let targetUrl = '';

        function showLoginPopup(event) {
            event.preventDefault(); 
            targetUrl = event.currentTarget.getAttribute('href');
            document.getElementById('loginPopup').classList.add('active');
        }

        function showRegisterPopup(event) {
            event.preventDefault();
            targetUrl = event.currentTarget.getAttribute('href');
            document.getElementById('registerPopup').classList.add('active');
        }

        function closePopup(id) {
            document.getElementById(id).classList.remove('active');
        }

        document.getElementById('confirmLoginBtn').addEventListener('click', function() {
            window.location.href = targetUrl;
        });

        document.getElementById('confirmRegisterBtn').addEventListener('click', function() {
            window.location.href = targetUrl;
        });
    </script>
</body>
</html>