<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Share a concern anonymously · Rhema House</title>
    <meta name="description" content="A private space to share a concern without providing your name or contact details.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --ink: #102b50; --muted: #5f6d80; --paper: #fff; --cream: #f5f8fc; --blue: #0a4388; --navy: #062d6b; --red: #e2232a; --line: rgba(16,43,80,.14); --shadow: 0 24px 70px rgba(6,45,107,.14); }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { min-height: 100vh; margin: 0; color: var(--ink); background: var(--cream); font-family: 'DM Sans', sans-serif; font-size: 17px; line-height: 1.7; }
        a { color: inherit; }
        .container { width: min(1120px, calc(100% - 40px)); margin: 0 auto; }
        .display { font-family: 'Playfair Display', Georgia, serif; }
        .site-nav { padding: 16px 0; background: rgba(4,27,66,.94); box-shadow: 0 10px 28px rgba(4,27,66,.14); }
        .nav-inner { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .brand { display: inline-flex; color: #fff; text-decoration: none; }
        .brand-mark { width: 194px; height: 72px; display: grid; place-items: center; border-radius: 12px; background: #fff; box-shadow: 0 9px 24px rgba(0,0,0,.18); overflow: hidden; }
        .brand-mark img { display: block; width: 100%; height: 100%; object-fit: contain; }
        .nav-link { padding: 10px 17px; border: 1px solid rgba(255,255,255,.32); border-radius: 999px; color: rgba(255,255,255,.88); text-decoration: none; font-size: .9rem; font-weight: 700; }
        .nav-link:hover { color: #fff; background: rgba(255,255,255,.1); }
        .page { padding: 90px 0 110px; background: radial-gradient(circle at 85% 10%, rgba(168,189,217,.2), transparent 25%), linear-gradient(135deg, #eef4fb 0%, var(--cream) 52%, #fff 100%); }
        .page-grid { display: grid; grid-template-columns: .86fr 1.14fr; gap: 90px; align-items: center; }
        .eyebrow { display: inline-flex; align-items: center; gap: 10px; color: var(--red); font-size: .72rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        .eyebrow::before { content: ''; width: 28px; height: 1px; background: currentColor; }
        .intro h1 { max-width: 530px; margin: 17px 0 18px; color: var(--navy); font-size: clamp(3rem, 6vw, 5.3rem); line-height: .98; letter-spacing: -.06em; }
        .intro p { max-width: 510px; color: var(--muted); font-size: 1.1rem; }
        .promise { max-width: 510px; margin-top: 30px; padding: 19px 20px; border-left: 2px solid var(--red); color: var(--muted); background: rgba(255,255,255,.56); font-size: .92rem; }
        .form-card { padding: 38px; border-radius: 30px; background: var(--paper); box-shadow: var(--shadow); }
        .form-card h2 { margin: 0 0 8px; color: var(--navy); font-family: 'Playfair Display', Georgia, serif; font-size: 2.1rem; line-height: 1.15; }
        .form-card > p { margin: 0 0 28px; color: var(--muted); font-size: .92rem; }
        .field { display: grid; gap: 7px; margin-bottom: 18px; }
        .field label { color: var(--ink); font-size: .9rem; font-weight: 700; }
        .field select, .field textarea { width: 100%; border: 1px solid var(--line); border-radius: 12px; padding: 14px 15px; color: var(--ink); background: #fbfcfe; font: inherit; font-size: 1rem; outline: none; transition: border .2s ease, box-shadow .2s ease; }
        .field textarea { min-height: 180px; resize: vertical; }
        .field select:focus, .field textarea:focus { border-color: var(--blue); box-shadow: 0 0 0 4px rgba(10,67,136,.12); }
        .button { width: 100%; min-height: 54px; padding: 0 23px; border: 0; border-radius: 999px; color: #fff; background: var(--red); box-shadow: 0 12px 25px rgba(226,35,42,.25); font: inherit; font-weight: 700; cursor: pointer; }
        .button:hover { background: #c91920; }
        .alert { margin-bottom: 22px; padding: 14px 16px; border-radius: 12px; color: #17613d; background: #e8f7ee; font-size: .88rem; }
        .error-list { margin: 0 0 22px; padding: 13px 15px 13px 32px; border-radius: 12px; color: #8c3f2b; background: #f9e7e1; font-size: .85rem; }
        footer { padding: 22px 0; color: rgba(255,255,255,.66); background: #041b42; text-align: center; font-size: .78rem; }
        @media (max-width: 820px) { .page-grid { grid-template-columns: 1fr; gap: 42px; } .page { padding: 65px 0 80px; } .intro h1 { font-size: clamp(3rem, 13vw, 5rem); } }
        @media (max-width: 520px) { .container { width: min(100% - 28px, 1120px); } .brand-mark { width: 146px; height: 56px; } .form-card { padding: 25px 18px; } .nav-link { padding: 8px 12px; font-size: .78rem; } }
    </style>
</head>
<body>
    <header class="site-nav">
        <div class="container nav-inner">
            <a class="brand" href="{{ url('/') }}" aria-label="Return to Healing For Young Marriages">
                <span class="brand-mark"><img src="{{ asset('images/rhema-house-logo.png') }}" alt="The Rhema House logo"></span>
            </a>
            <a class="nav-link" href="{{ url('/') }}">Back to retreat page</a>
        </div>
    </header>

    <main class="page">
        <div class="container page-grid">
            <section class="intro" aria-labelledby="page-title">
                <span class="eyebrow">A safe space to speak</span>
                <h1 id="page-title" class="display">You don’t have to attach your name.</h1>
                <p>If there is something weighing on you or your marriage, share it with us anonymously. Write only what you feel comfortable sharing.</p>
                <div class="promise">No name, email address or phone number is requested. Your message will be received by the retreat team so we can pray, prepare and respond with care.</div>
            </section>

            <section class="form-card" aria-labelledby="form-title">
                <h2 id="form-title">Share a concern anonymously</h2>
                <p>Tell us what is concerning you. The topic is optional; the concern details are required.</p>
                @if(session('concern_success'))<div class="alert" role="status">{{ session('concern_success') }}</div>@endif
                @if($errors->has('concern') || $errors->has('topic'))
                    <ul class="error-list" role="alert">
                        @foreach($errors->get('concern') as $error)<li>{{ $error }}</li>@endforeach
                        @foreach($errors->get('topic') as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                @endif
                <form action="{{ route('anonymous-concerns.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label for="topic">What is this about? <span style="font-weight:400;color:var(--muted)">(optional)</span></label>
                        <select id="topic" name="topic">
                            <option value="">Choose a topic...</option>
                            <option value="Communication" @selected(old('topic') === 'Communication')>Communication</option>
                            <option value="Emotional or spiritual health" @selected(old('topic') === 'Emotional or spiritual health')>Emotional or spiritual health</option>
                            <option value="Family or finances" @selected(old('topic') === 'Family or finances')>Family or finances</option>
                            <option value="Other" @selected(old('topic') === 'Other')>Something else</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="concern">What would you like us to know? *</label>
                        <textarea id="concern" name="concern" maxlength="5000" required placeholder="Share the detail of what is concerning you...">{{ old('concern') }}</textarea>
                    </div>
                    <button class="button" type="submit">Send anonymously <span aria-hidden="true">→</span></button>
                </form>
            </section>
        </div>
    </main>

    <footer><div class="container">MIV Rhema House · Healing For Young Marriages Retreat 2026</div></footer>
</body>
</html>
