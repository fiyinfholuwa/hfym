<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healing For Young Marriages Retreat 2025</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1e40af;
            --secondary-color: #3b82f6;
            --accent-color: #dc2626;
            --red-dark: #991b1b;
            --red-light: #fca5a5;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --white: #ffffff;
            --light-bg: #f8fafc;
            --gradient-primary: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
            --gradient-accent: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: var(--gradient-primary);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a"><stop offset="0%" stop-color="rgba(255,255,255,0.1)"/><stop offset="100%" stop-color="rgba(255,255,255,0)"/></radialGradient></defs><circle cx="200" cy="200" r="150" fill="url(%23a)"/><circle cx="800" cy="300" r="100" fill="url(%23a)"/><circle cx="600" cy="700" r="120" fill="url(%23a)"/></svg>') no-repeat;
            background-size: cover;
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: clamp(1.1rem, 2vw, 1.3rem);
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .hero-verse {
            font-style: italic;
            font-size: 1.1rem;
            color: var(--red-light);
            margin-bottom: 2.5rem;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .cta-button {
            background: var(--gradient-accent);
            color: var(--white);
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.3);
            animation: fadeInUp 1s ease-out 0.6s both;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(220, 38, 38, 0.4);
            color: var(--white);
        }

        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-heart {
            position: absolute;
            color: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        .floating-heart:nth-child(1) { top: 20%; left: 10%; font-size: 2rem; animation-delay: 0s; }
        .floating-heart:nth-child(2) { top: 60%; right: 15%; font-size: 1.5rem; animation-delay: 2s; }
        .floating-heart:nth-child(3) { top: 80%; left: 70%; font-size: 2.5rem; animation-delay: 4s; }

        /* Event Details Section */
        .event-details {
            padding: 6rem 0;
            background: var(--white);
            position: relative;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 3rem;
        }

        .detail-card {
            background: var(--white);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 60px rgba(26, 54, 93, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(45, 90, 160, 0.1);
        }

        .detail-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(26, 54, 93, 0.15);
        }

        .detail-icon {
            font-size: 3rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
        }

        .detail-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        /* Message Section */
        .message-section {
            padding: 6rem 0;
            background: var(--light-bg);
            position: relative;
        }

        .message-content {
            background: var(--white);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 25px 70px rgba(26, 54, 93, 0.08);
            position: relative;
            overflow: hidden;
        }

        .message-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient-accent);
        }

        .quote-mark {
            font-size: 4rem;
            color: var(--accent-color);
            opacity: 0.3;
            position: absolute;
            top: 1rem;
            left: 2rem;
        }

        .message-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        .highlight-verse {
            background: linear-gradient(120deg, rgba(220, 38, 38, 0.1) 0%, rgba(239, 68, 68, 0.1) 100%);
            border-left: 4px solid var(--accent-color);
            padding: 1.5rem;
            border-radius: 10px;
            font-style: italic;
            margin: 2rem 0;
            font-weight: 500;
        }

        /* Registration Section */
        .registration-section {
            padding: 6rem 0;
            background: var(--gradient-primary);
            position: relative;
        }

        .registration-form {
            background: var(--white);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 30px 100px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(20px);
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--white);
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(45, 90, 160, 0.1);
        }

        .submit-button {
            background: var(--gradient-accent);
            color: var(--white);
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.3);
        }

        /* Pastor Section */
        .pastor-section {
            padding: 4rem 0;
            background: var(--white);
        }

        .pastor-signature {
            background: var(--light-bg);
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            border-top: 4px solid var(--accent-color);
        }

        .pastor-name {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .pastor-title {
            color: var(--text-light);
            font-style: italic;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Logo Section */
        .logo-section {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logo {
            width: 80px;
            height: 80px;
            background: var(--white);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: var(--primary-color);
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 2rem 0;
            text-align: center;
        }

        .developer-credit {
            font-size: 0.9rem;
            opacity: 0.8;
            margin: 0;
        }

        .developer-credit a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
        }

        .developer-credit a:hover {
            color: var(--red-light);
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 90vh;
            }
            
            .hero-verse {
                font-size: 1rem;
                padding: 1rem;
            }
            
            .detail-card {
                margin-bottom: 2rem;
            }
            
            .registration-form {
                padding: 2rem 1.5rem;
            }

            .logo-section {
                position: relative;
                top: 10px;
                left: 10px;
                margin-bottom: 1rem;
                display: inline-block;
            }

            .logo {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }

        /* Success Message */
        .success-message {
            display: none;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            margin-top: 1rem;
            animation: fadeInUp 0.5s ease-out;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
<section style="
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                url('https://americaskeswick.org/wp-content/smush-webp/2016/09/vc091616.jpg.webp');
    background-size: cover;
    background-position: center;
" class="hero-section">
        <!-- Logo Section -->
       <div class="logo-section">
    <div class="logo">
        <img src="https://spc.mivrhemahouse.org.ng/frontend/image/rhema.jpg" alt="Logo" />
        {{-- <i class="fas fa-church"></i> --}}
    </div>
</div>

<style>
.logo-section {
    position: fixed; /* Stays in place */
    top: 20;          /* Top edge */
    left: 40;         /* Left edge */
    z-index: 1000;   /* On top of other elements */
    padding: 10px;   /* Space around logo */
    background: white; /* Optional: prevents blending into page */
}

.logo img {
    height: 60px; /* Set logo height */
    width: auto;  /* Keep aspect ratio */
}
</style>
 
        <div class="floating-elements">
            <i class="fas fa-heart floating-heart"></i>
            <i class="fas fa-heart floating-heart"></i>
            <i class="fas fa-heart floating-heart"></i>
        </div>
        
        <div  class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-10 mx-auto text-center hero-content">
                    <h1 class="hero-title font-display">
                        Healing For Young Marriages Retreat  <span style="color:#fca5a5;">(Peace Like A River)</span>
                    </h1>
                    <p class="hero-subtitle">
                        September 4-6, 2025 • Akobo, Ibadan
                    </p>
                    <div class="hero-verse">
                        <i class="fas fa-quote-left mb-2"></i>
                        <p class="mb-2">"Rejoice ye with Jerusalem, and be glad with her, all ye that love her... For thus saith the LORD, Behold, I will extend peace to her like a river, and the glory of the Gentiles like a flowing stream."</p>
                        <small>- Isaiah 66:10-12</small>
                    </div>
                    <a href="#register" class="cta-button">
                        <i class="fas fa-calendar-plus me-2"></i>
                        Register Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Details -->
    <section class="event-details">
        <div class="container">
            <h2 class="section-title font-display">Event Details</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="detail-card text-center">
                        <i class="fas fa-calendar-alt detail-icon"></i>
                        <h3 class="detail-title">Dates</h3>
                        <p>September 4-6, 2025<br>
                        <small class="text-muted">Thursday Evening - Saturday</small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="detail-card text-center">
                        <i class="fas fa-map-marker-alt detail-icon"></i>
                        <h3 class="detail-title">Location</h3>
                        <p>The Rhema House, Cecilia  House Beside Monarch Plaza Adjacent Omololu Hospital, Ojurin Akobo, Ibadan.<br>
                        {{-- <small class="text-muted">Detailed address will be provided</small></p> --}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="detail-card text-center">
                        <i class="fas fa-users detail-icon"></i>
                        <h3 class="detail-title">Who Should Attend</h3>
                        <p>Young Married Couples<br>
                        <small class="text-muted">Plan to attend together</small></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Message Section -->
    <section class="message-section">
        <div class="container">
            <h2 class="section-title font-display">A Prophetic Word</h2>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="message-content">
                        <span class="quote-mark">"</span>
                        
                        <div class="message-text">
                            <p>God is visiting every home in our midst afresh with <strong>peace like a river</strong>. This peace will be extended to us by His outstretched arm and divine providence.</p>
                            
                            <p>Peace from every storm that's fast sinking unions that were once beautiful. Peace that will allow us both to face what's more primary in the heart of God for bringing us together: His purpose for our lives and the fulfillment of our portion of the Great Commission.</p>

                            <div class="highlight-verse">
                                "I will give Jerusalem a river of peace and prosperity. The wealth of the nations will flow to her. Her children will be nursed at her breasts, carried in her arms, and held on her lap."
                                <br><small>- Isaiah 66:12 NLT</small>
                            </div>

                            <p>As we gather together at His feet this year, we will be trusting Him for two things:</p>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="p-3 bg-light rounded">
                                        <h6 class="text-primary"><i class="fas fa-1 me-2"></i>Divine Intervention</h6>
                                        <p class="mb-0">His direct intervention regarding every mysterious storm that defies natural explanations in our marriages</p>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3 mt-md-0">
                                    <div class="p-3 bg-light rounded">
                                        <h6 class="text-primary"><i class="fas fa-2 me-2"></i>Principles of Peace</h6>
                                        <p class="mb-0">We want Him to teach us afresh, principles that make for peace in our matrimony</p>
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4">When the Lord would have stepped in by His power to bring peace into every mysterious storm and would have gone further to bring us into principles that make for peace in our homes and then finally bring us a river of prosperity, <strong>He would have helped our homes to the uttermost</strong>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section class="registration-section" id="register">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="registration-form">
                        <h2 class="text-center mb-4 font-display" style="color: var(--primary-color);">
                            <i class="fas fa-heart text-danger me-2"></i>
                            Register for the Retreat
                        </h2>
                        <p class="text-center mb-4 text-muted">Join us for this transformative experience. Complete the form below to secure your spot.</p>
                        
                        <form id="registrationForm">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="husbandName">Husband's Full Name *</label>
            <input type="text" class="form-control" id="husbandName" name="husbandName" required>
        </div>
        <div class="col-md-6">
            <label for="wifeName">Wife's Full Name *</label>
            <input type="text" class="form-control" id="wifeName" name="wifeName" required>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label for="email">Email Address *</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="col-md-6">
            <label for="phone">Phone Number *</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
    </div>

    <div class="mt-3">
        <label for="address">Home Address</label>
        <textarea class="form-control" id="address" name="address"></textarea>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label for="marriageYears">Years Married</label>
            <select class="form-control" id="marriageYears" name="marriageYears">
                <option value="">Select...</option>
                <option value="0-2">0-2 years</option>
                <option value="3-5">3-5 years</option>
                <option value="6-10">6-10 years</option>
                <option value="11+">11+ years</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="church">Church/Fellowship</label>
            <input type="text" class="form-control" id="church" name="church">
        </div>
    </div>

    <div class="mt-3">
        <label for="expectations">What are your expectations?</label>
        <textarea class="form-control" id="expectations" name="expectations"></textarea>
    </div>

    <div class="mt-3">
        <label for="prayerRequests">Prayer Requests (Optional)</label>
        <textarea class="form-control" id="prayerRequests" name="prayerRequests"></textarea>
    </div>

    <div class="form-check mt-3 mb-3">
        <input class="form-check-input" type="checkbox" id="agreement" required>
        <label class="form-check-label" for="agreement">
            I confirm that both my spouse and I will attend the retreat together.
        </label>
    </div>

    <button type="submit" class="btn btn-primary">
        Submit Registration
    </button>
</form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pastor Section -->
    <section class="pastor-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="pastor-signature">
                        <p class="mb-3">May peace and prosperity be the experience of every home as from now forward in the mighty name of Jesus.</p>
                        <p class="mb-3">We desire that every couple will plan ahead to attend the retreat together. Join us for this divine visitation!</p>
                        <div class="pastor-name">Peniela Eniayo Akintujoye</div>
                        <div class="pastor-title">Pastor, MIV Rhema House & Lead Talker, Love Straight Talks</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p class="developer-credit">
                Developed by <a href="#" target="_blank">MIV Rhema House Media</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    
    
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> {{-- Toastr needs jQuery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

      
      document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this; // store reference to form
    const formData = new FormData(form);

    fetch('/register-couple', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            toastr.success(data.message);
            form.reset(); // now works
        } else if (data.status === 'error') {
            toastr.error('Please fix the errors and try again.');
            console.error(data.errors);
        }
    })
    .catch(error => {
        toastr.error('An unexpected error occurred.');
        console.error('Error:', error);
    });
});


        // Add entrance animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease-out forwards';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.detail-card, .message-content, .registration-form, .pastor-signature').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            observer.observe(el);
        });

        // Add floating animation to hearts
        document.querySelectorAll('.floating-heart').forEach((heart, index) => {
            heart.style.animationDelay = `${index * 2}s`;
        });

        // Form validation enhancements
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.checkValidity()) {
                    this.style.borderColor = '#10b981';
                } else {
                    this.style.borderColor = '#ef4444';
                }
            });
            
            input.addEventListener('input', function() {
                this.style.borderColor = '#e2e8f0';
            });
        });
    </script>
</body>
</html>