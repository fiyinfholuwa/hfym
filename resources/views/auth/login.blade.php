<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.1) 0%, transparent 50%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .container {
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.1),
                0 8px 16px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo h1 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .logo p {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            font-size: 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: #667eea;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-input.error {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #9ca3af;
            font-size: 1.125rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .checkbox {
            width: 1.125rem;
            height: 1.125rem;
            border: 2px solid #d1d5db;
            border-radius: 4px;
            margin-right: 0.75rem;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .checkbox input {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .checkbox input:checked + .checkmark {
            background: #667eea;
            border-color: #667eea;
        }

        .checkbox input:checked + .checkmark::after {
            opacity: 1;
            transform: scale(1);
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .checkmark::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            color: white;
            font-size: 0.75rem;
            font-weight: bold;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .checkbox-label {
            font-size: 0.875rem;
            color: #6b7280;
            cursor: pointer;
            user-select: none;
        }

        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-password::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #667eea;
            transition: width 0.3s ease;
        }

        .forgot-password:hover::after {
            width: 100%;
        }

        .login-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-width: 120px;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn:disabled {
            opacity: 0.8;
            pointer-events: none;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.5rem;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .error-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        .status-message {
            background: rgba(16, 185, 129, 0.1);
            color: #065f46;
            padding: 0.75rem;
            border-radius: 8px;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(16, 185, 129, 0.2);
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .status-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Mobile responsiveness */
        @media (max-width: 640px) {
            body {
                padding: 0.5rem;
            }

            .login-card {
                padding: 2rem 1.5rem;
                border-radius: 16px;
            }

            .logo h1 {
                font-size: 1.75rem;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .login-btn {
                width: 100%;
                order: 2;
            }

            .forgot-password {
                text-align: center;
                order: 1;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 1.5rem 1rem;
                margin: 0.5rem;
            }

            .logo h1 {
                font-size: 1.5rem;
            }

            .form-input {
                padding: 0.75rem;
                font-size: 0.875rem;
            }
        }

        /* Loading state */
        .login-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .login-btn.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 16px;
            height: 16px;
            margin: -8px 0 0 -8px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card">
            <div class="logo">
                <h1>Welcome Back</h1>
                <p>Sign in to your account</p>
            </div>

            <!-- Laravel Session Status -->
            @if (session('status'))
                <div class="status-message show">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Laravel Authentication Form -->
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input 
                        id="email" 
                        class="form-input @error('email') error @enderror" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="username"
                    >
                    @error('email')
                        <div class="error-message show">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <div class="password-container">
                        <input 
                            id="password" 
                            class="form-input @error('password') error @enderror"
                            type="password"
                            name="password"
                            required 
                            autocomplete="current-password"
                        >
                        <button type="button" class="password-toggle" id="passwordToggle">
                            👁
                        </button>
                    </div>
                    @error('password')
                        <div class="error-message show">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="checkbox-container">
                    <div class="checkbox">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span class="checkmark"></span>
                    </div>
                    <label for="remember_me" class="checkbox-label">{{ __('Remember me') }}</label>
                </div>

                <!-- Form Footer -->
                <div class="form-footer">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="login-btn" id="loginBtn">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        class LaravelLoginForm {
            constructor() {
                this.form = document.getElementById('loginForm');
                this.emailInput = document.getElementById('email');
                this.passwordInput = document.getElementById('password');
                this.passwordToggle = document.getElementById('passwordToggle');
                this.loginBtn = document.getElementById('loginBtn');
                
                this.init();
            }

            init() {
                this.setupPasswordToggle();
                this.setupFormSubmission();
                this.setupClientSideValidation();
                this.setupInputAnimations();
            }

            setupPasswordToggle() {
                if (this.passwordToggle) {
                    this.passwordToggle.addEventListener('click', () => {
                        const type = this.passwordInput.type === 'password' ? 'text' : 'password';
                        this.passwordInput.type = type;
                        this.passwordToggle.textContent = type === 'password' ? '👁' : '🙈';
                    });
                }
            }

            setupFormSubmission() {
                this.form.addEventListener('submit', (e) => {
                    // Add loading state
                    this.loginBtn.classList.add('loading');
                    this.loginBtn.disabled = true;
                    
                    // Store original text
                    if (!this.loginBtn.dataset.originalText) {
                        this.loginBtn.dataset.originalText = this.loginBtn.textContent;
                    }
                    this.loginBtn.textContent = '';

                    // Remove loading state if form validation fails
                    setTimeout(() => {
                        if (!this.isFormValid()) {
                            this.resetLoadingState();
                            e.preventDefault();
                        }
                    }, 100);
                });
            }

            setupClientSideValidation() {
                // Email validation
                this.emailInput.addEventListener('blur', () => {
                    this.validateEmail();
                });

                this.emailInput.addEventListener('input', () => {
                    this.clearError(this.emailInput);
                });

                // Password validation
                this.passwordInput.addEventListener('blur', () => {
                    this.validatePassword();
                });

                this.passwordInput.addEventListener('input', () => {
                    this.clearError(this.passwordInput);
                });
            }

            setupInputAnimations() {
                [this.emailInput, this.passwordInput].forEach(input => {
                    input.addEventListener('focus', () => {
                        input.parentElement.classList.add('focused');
                    });

                    input.addEventListener('blur', () => {
                        if (!input.value) {
                            input.parentElement.classList.remove('focused');
                        }
                    });

                    // Initialize state for inputs with values (like old() values)
                    if (input.value) {
                        input.parentElement.classList.add('focused');
                    }
                });
            }

            validateEmail() {
                const email = this.emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!email) {
                    this.showClientError(this.emailInput, 'Email is required');
                    return false;
                } else if (!emailRegex.test(email)) {
                    this.showClientError(this.emailInput, 'Please enter a valid email address');
                    return false;
                } else {
                    this.clearError(this.emailInput);
                    return true;
                }
            }

            validatePassword() {
                const password = this.passwordInput.value;

                if (!password) {
                    this.showClientError(this.passwordInput, 'Password is required');
                    return false;
                } else if (password.length < 6) {
                    this.showClientError(this.passwordInput, 'Password must be at least 6 characters');
                    return false;
                } else {
                    this.clearError(this.passwordInput);
                    return true;
                }
            }

            showClientError(input, message) {
                input.classList.add('error');
                
                // Remove existing error message
                const existingError = input.parentElement.querySelector('.client-error');
                if (existingError) {
                    existingError.remove();
                }

                // Add new error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message client-error show';
                errorDiv.textContent = message;
                input.parentElement.appendChild(errorDiv);
            }

            clearError(input) {
                input.classList.remove('error');
                const clientError = input.parentElement.querySelector('.client-error');
                if (clientError) {
                    clientError.classList.remove('show');
                    setTimeout(() => {
                        clientError.remove();
                    }, 300);
                }
            }

            isFormValid() {
                const isEmailValid = this.validateEmail();
                const isPasswordValid = this.validatePassword();
                return isEmailValid && isPasswordValid;
            }

            resetLoadingState() {
                this.loginBtn.classList.remove('loading');
                this.loginBtn.disabled = false;
                this.loginBtn.textContent = this.loginBtn.dataset.originalText || 'Log in';
            }
        }

        // Initialize the login form when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new LaravelLoginForm();
        });

        // Add floating background elements
        function createFloatingElements() {
            const container = document.body;
            
            for (let i = 0; i < 5; i++) {
                const element = document.createElement('div');
                element.style.position = 'absolute';
                element.style.width = Math.random() * 100 + 50 + 'px';
                element.style.height = element.style.width;
                element.style.borderRadius = '50%';
                element.style.background = `rgba(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255}, 0.1)`;
                element.style.left = Math.random() * 100 + '%';
                element.style.top = Math.random() * 100 + '%';
                element.style.animation = `float ${3 + Math.random() * 4}s ease-in-out infinite`;
                element.style.animationDelay = Math.random() * 2 + 's';
                element.style.pointerEvents = 'none';
                element.style.zIndex = '0';
                
                container.appendChild(element);
            }
        }

        // Create floating background elements after page load
        window.addEventListener('load', createFloatingElements);

        // Handle browser back/forward navigation
        window.addEventListener('pageshow', (e) => {
            if (e.persisted) {
                const loginBtn = document.getElementById('loginBtn');
                if (loginBtn) {
                    loginBtn.classList.remove('loading');
                    loginBtn.disabled = false;
                    loginBtn.textContent = loginBtn.dataset.originalText || 'Log in';
                }
            }
        });
    </script>
</body>
</html>