<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin login · Rhema House</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #062d6b;
            --navy-deep: #041b42;
            --blue: #0a4388;
            --red: #e2232a;
            --red-dark: #c91920;
            --ink: #102b50;
            --muted: #65748a;
            --line: #dce5f0;
            --paper: #ffffff;
            --soft: #f5f8fc;
        }

        * { box-sizing: border-box; }
        body { min-height: 100vh; margin: 0; padding: 24px; display: grid; place-items: center; color: var(--ink); background: radial-gradient(circle at 10% 15%, rgba(226,35,42,.14), transparent 28%), radial-gradient(circle at 88% 84%, rgba(196,214,236,.18), transparent 30%), var(--navy-deep); font-family: 'DM Sans', sans-serif; }
        body::before { content: ''; position: fixed; inset: 0; pointer-events: none; opacity: .3; background-image: linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px); background-size: 42px 42px; mask-image: linear-gradient(to bottom, black, transparent 80%); }
        a { color: inherit; }
        .shell { width: min(1100px, 100%); min-height: 680px; display: grid; grid-template-columns: .9fr 1.1fr; overflow: hidden; border: 1px solid rgba(255,255,255,.2); border-radius: 32px; background: var(--paper); box-shadow: 0 32px 100px rgba(0,0,0,.28); }

        .brand-panel { position: relative; isolation: isolate; display: flex; flex-direction: column; justify-content: space-between; padding: 42px; color: #fff; overflow: hidden; background: radial-gradient(circle at 76% 20%, rgba(226,35,42,.3), transparent 30%), linear-gradient(150deg, #062d6b, #041b42); }
        .brand-panel::before { content: ''; position: absolute; z-index: -1; width: 430px; height: 430px; right: -220px; bottom: -160px; border: 1px solid rgba(196,214,236,.22); border-radius: 50%; box-shadow: 0 0 0 30px rgba(196,214,236,.04), 0 0 0 62px rgba(196,214,236,.025); }
        .brand-panel::after { content: ''; position: absolute; z-index: -1; width: 180px; height: 180px; right: 70px; bottom: 65px; border-radius: 50%; background: rgba(226,35,42,.18); filter: blur(12px); animation: glow 5s ease-in-out infinite; }
        .brand-logo { width: min(100%, 290px); padding: 10px 14px; border-radius: 18px; background: #fff; box-shadow: 0 14px 30px rgba(0,0,0,.18); }
        .brand-logo img { display: block; width: 100%; height: auto; }
        .eyebrow { display: inline-flex; align-items: center; gap: 9px; color: #c4d6ec; font-size: .72rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        .eyebrow::before { content: ''; width: 26px; height: 1px; background: var(--red); }
        .brand-copy { max-width: 350px; margin: auto 0; padding: 80px 0 35px; }
        .brand-copy h1 { margin: 17px 0 16px; color: #fff; font-family: 'Playfair Display', Georgia, serif; font-size: clamp(2.5rem, 5vw, 4.2rem); line-height: 1; letter-spacing: -.05em; }
        .brand-copy h1 span { color: #ffb9bd; font-style: italic; }
        .brand-copy p { margin: 0; color: rgba(255,255,255,.7); font-size: 1.02rem; line-height: 1.7; }
        .panel-footer { display: flex; align-items: center; justify-content: space-between; gap: 15px; color: rgba(255,255,255,.58); font-size: .78rem; }
        .secure-pill { display: inline-flex; align-items: center; gap: 7px; color: #eaf2fc; }
        .secure-pill::before { content: '✓'; width: 19px; height: 19px; display: grid; place-items: center; border-radius: 50%; color: var(--navy); background: #c4d6ec; font-size: .7rem; font-weight: 700; }

        .login-panel { display: flex; align-items: center; padding: 56px clamp(34px, 7vw, 92px); background: #fff; }
        .login-content { width: 100%; max-width: 420px; margin: 0 auto; }
        .portal-label { margin-bottom: 22px; color: var(--red); font-size: .75rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; }
        .login-content h2 { margin: 0 0 10px; color: var(--navy); font-family: 'Playfair Display', Georgia, serif; font-size: clamp(2.4rem, 4vw, 3.55rem); line-height: 1; letter-spacing: -.05em; }
        .login-intro { margin: 0 0 32px; color: var(--muted); font-size: 1rem; }
        .status-message, .error-summary { margin-bottom: 22px; padding: 13px 15px; border-radius: 12px; font-size: .88rem; }
        .status-message { color: #0a4388; border: 1px solid #cfe0f2; background: #eff6fd; }
        .error-summary { color: #8e3137; border: 1px solid #f2c8cb; background: #fff1f2; }
        .error-summary ul { margin: 0; padding-left: 18px; }
        .field { margin-bottom: 21px; }
        .field-label { display: flex; justify-content: space-between; gap: 10px; margin-bottom: 8px; color: var(--ink); font-size: .88rem; font-weight: 700; }
        .input-wrap { position: relative; }
        .input-icon { position: absolute; left: 15px; top: 50%; width: 18px; color: #8da0b8; transform: translateY(-50%); pointer-events: none; font-size: 1.1rem; text-align: center; }
        .form-input { width: 100%; min-height: 55px; padding: 13px 15px 13px 46px; border: 1px solid var(--line); border-radius: 13px; outline: none; color: var(--ink); background: var(--soft); font: inherit; font-size: 1rem; transition: border .2s ease, box-shadow .2s ease, background .2s ease; }
        .form-input.password { padding-right: 50px; }
        .form-input:focus { border-color: var(--blue); background: #fff; box-shadow: 0 0 0 4px rgba(10,67,136,.1); }
        .form-input.error { border-color: var(--red); box-shadow: 0 0 0 4px rgba(226,35,42,.1); }
        .error-message { margin-top: 7px; color: #c91920; font-size: .8rem; }
        .password-toggle { position: absolute; right: 12px; top: 50%; width: 34px; height: 34px; border: 0; border-radius: 9px; color: #6b7c93; background: transparent; transform: translateY(-50%); cursor: pointer; font-size: 1rem; }
        .password-toggle:hover { color: var(--navy); background: #eaf1fa; }
        .form-options { display: flex; align-items: center; justify-content: space-between; gap: 15px; margin: 4px 0 27px; }
        .remember { display: inline-flex; align-items: center; gap: 9px; color: var(--muted); font-size: .86rem; cursor: pointer; }
        .remember input { width: 17px; height: 17px; accent-color: var(--red); }
        .forgot-password { color: var(--blue); font-size: .84rem; font-weight: 600; text-decoration: none; }
        .forgot-password:hover { color: var(--red); text-decoration: underline; }
        .login-btn { position: relative; width: 100%; min-height: 56px; border: 0; border-radius: 13px; color: #fff; background: linear-gradient(135deg, var(--red), #ba1720); box-shadow: 0 12px 24px rgba(226,35,42,.22); font: inherit; font-weight: 700; cursor: pointer; transition: transform .2s ease, box-shadow .2s ease, background .2s ease; }
        .login-btn:hover { background: linear-gradient(135deg, #ef3037, var(--red-dark)); box-shadow: 0 17px 32px rgba(226,35,42,.3); transform: translateY(-2px); }
        .login-btn:disabled { cursor: wait; opacity: .78; transform: none; }
        .login-btn.loading { color: transparent; }
        .login-btn.loading::after { content: ''; position: absolute; left: 50%; top: 50%; width: 18px; height: 18px; border: 2px solid rgba(255,255,255,.35); border-top-color: #fff; border-radius: 50%; transform: translate(-50%,-50%); animation: spin .8s linear infinite; }
        .back-home { display: block; margin-top: 25px; color: var(--muted); font-size: .84rem; text-align: center; text-decoration: none; }
        .back-home:hover { color: var(--navy); }
        @keyframes spin { to { transform: translate(-50%,-50%) rotate(360deg); } }
        @keyframes glow { 0%, 100% { transform: scale(.92); opacity: .6; } 50% { transform: scale(1.1); opacity: 1; } }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; transition-duration: .01ms !important; } }
        @media (max-width: 800px) {
            body { padding: 14px; }
            .shell { min-height: 0; grid-template-columns: 1fr; border-radius: 24px; }
            .brand-panel { min-height: 340px; padding: 28px; }
            .brand-logo { width: min(240px, 70vw); }
            .brand-copy { margin: 0; padding: 45px 0 25px; }
            .brand-copy h1 { font-size: clamp(2.5rem, 12vw, 3.6rem); }
            .panel-footer { margin-top: 20px; }
            .login-panel { padding: 45px 28px; }
        }
        @media (max-width: 440px) {
            .brand-panel { min-height: 310px; padding: 22px; }
            .panel-footer { flex-direction: column; align-items: flex-start; }
            .login-panel { padding: 38px 20px; }
            .form-options { align-items: flex-start; flex-direction: column; }
        }
    </style>
</head>
<body>
    <main class="shell">
        <section class="brand-panel" aria-label="Rhema House admin portal">
            <a href="{{ url('/') }}" class="brand-logo" aria-label="Return to Rhema House retreat home">
                <img src="{{ asset('images/rhema-house-logo.png') }}" alt="The Rhema House logo">
            </a>
            <div class="brand-copy">
                <span class="eyebrow">Admin portal</span>
                <h1>Welcome to the <span>workroom.</span></h1>
                <p>Manage retreat registrations and help create a healthier journey for every marriage connected to MIV Rhema House.</p>
            </div>
            <div class="panel-footer"><span>Healing For Young Marriages · 2026</span><span class="secure-pill">Secure access</span></div>
        </section>

        <section class="login-panel">
            <div class="login-content">
                <div class="portal-label">Registration dashboard</div>
                <h2>Sign in</h2>
                <p class="login-intro">Use your admin account to view and manage retreat registrations.</p>

                @if (session('status'))
                    <div class="status-message" role="status">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                    <div class="error-summary" role="alert">
                        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf
                    <div class="field">
                        <label class="field-label" for="email">Email address</label>
                        <div class="input-wrap">
                            <span class="input-icon" aria-hidden="true">@</span>
                            <input id="email" class="form-input @error('email') error @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@rhemahouse.com">
                        </div>
                        @error('email')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <div class="field">
                        <label class="field-label" for="password">Password</label>
                        <div class="input-wrap">
                            <span class="input-icon" aria-hidden="true">•</span>
                            <input id="password" class="form-input password @error('password') error @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                            <button type="button" class="password-toggle" id="passwordToggle" aria-label="Show password" aria-pressed="false">◉</button>
                        </div>
                        @error('password')<div class="error-message">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-options">
                        <label class="remember"><input id="remember_me" type="checkbox" name="remember"> <span>Remember me</span></label>
                        @if (Route::has('password.request'))<a class="forgot-password" href="{{ route('password.request') }}">Forgot password?</a>@endif
                    </div>

                    <button type="submit" class="login-btn" id="loginBtn">Log in to dashboard</button>
                </form>
                <a class="back-home" href="{{ url('/') }}">← Back to the retreat page</a>
            </div>
        </section>
    </main>

    <script>
        const form = document.getElementById('loginForm');
        const loginButton = document.getElementById('loginBtn');
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.getElementById('passwordToggle');

        passwordToggle.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            this.textContent = isPassword ? '◌' : '◉';
            this.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
            this.setAttribute('aria-pressed', String(isPassword));
        });

        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                form.reportValidity();
                return;
            }
            loginButton.classList.add('loading');
            loginButton.disabled = true;
        });

        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                loginButton.classList.remove('loading');
                loginButton.disabled = false;
            }
        });
    </script>
</body>
</html>
