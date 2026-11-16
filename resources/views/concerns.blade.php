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
        .page { padding: 55px 0 85px; background: radial-gradient(circle at 85% 10%, rgba(168,189,217,.2), transparent 25%), linear-gradient(135deg, #eef4fb 0%, var(--cream) 52%, #fff 100%); }
        .page-grid { width: min(760px, 100%); }
        .eyebrow { display: inline-flex; align-items: center; gap: 10px; color: var(--red); font-size: .72rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        .eyebrow::before { content: ''; width: 28px; height: 1px; background: currentColor; }
        .form-card { padding: 38px; border-radius: 30px; background: var(--paper); box-shadow: var(--shadow); }
        .form-card h2 { margin: 0 0 8px; color: var(--navy); font-family: 'Playfair Display', Georgia, serif; font-size: 2.1rem; line-height: 1.15; }
        .form-card > p { margin: 0 0 28px; color: var(--muted); font-size: .92rem; }
        .field { display: grid; gap: 7px; margin-bottom: 18px; }
        .field > label, .topic-picker legend { color: var(--ink); font-size: .9rem; font-weight: 700; }
        .topic-picker { margin: 0 0 22px; padding: 0; border: 0; }
        .topic-picker legend { margin-bottom: 9px; }
        .topic-options { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 9px; }
        .topic-option { position: relative; display: flex; align-items: center; min-height: 48px; padding: 10px 12px; border: 1px solid var(--line); border-radius: 11px; color: var(--ink); background: #fbfcfe; cursor: pointer; font-size: .91rem; line-height: 1.3; transition: border .2s ease, background .2s ease, box-shadow .2s ease, transform .2s ease; }
        .topic-option:hover { border-color: rgba(10,67,136,.42); background: #f5f9fe; transform: translateY(-1px); }
        .topic-option input { position: absolute; width: 1px; height: 1px; opacity: 0; }
        .topic-option input:focus-visible + span { outline: 3px solid rgba(10,67,136,.2); outline-offset: 2px; }
        .topic-option input:checked + span { color: var(--blue); font-weight: 700; }
        .topic-option:has(input:checked) { border-color: var(--blue); background: #edf4fc; box-shadow: 0 0 0 3px rgba(10,67,136,.1); }
        .topic-option span { display: block; }
        .field textarea { width: 100%; border: 1px solid var(--line); border-radius: 12px; padding: 14px 15px; color: var(--ink); background: #fbfcfe; font: inherit; font-size: 1rem; outline: none; transition: border .2s ease, box-shadow .2s ease; }
        .field textarea { min-height: 180px; resize: vertical; }
        .field textarea:focus { border-color: var(--blue); box-shadow: 0 0 0 4px rgba(10,67,136,.12); }
        .button { width: 100%; min-height: 54px; padding: 0 23px; border: 0; border-radius: 999px; color: #fff; background: var(--red); box-shadow: 0 12px 25px rgba(226,35,42,.25); font: inherit; font-weight: 700; cursor: pointer; }
        .button:hover { background: #c91920; }
        .alert { margin-bottom: 22px; padding: 14px 16px; border-radius: 12px; color: #17613d; background: #e8f7ee; font-size: .88rem; }
        .error-list { margin: 0 0 22px; padding: 13px 15px 13px 32px; border-radius: 12px; color: #8c3f2b; background: #f9e7e1; font-size: .85rem; }
        footer { padding: 22px 0; color: rgba(255,255,255,.66); background: #041b42; text-align: center; font-size: .78rem; }
        @media (max-width: 820px) { .page { padding: 42px 0 65px; } }
        @media (max-width: 520px) { .container { width: min(100% - 28px, 1120px); } .brand-mark { width: 146px; height: 56px; } .form-card { padding: 25px 18px; } .nav-link { padding: 8px 12px; font-size: .78rem; } .topic-options { grid-template-columns: 1fr; } }
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
            <section class="form-card" aria-labelledby="form-title">
                <h2 id="form-title">Share a concern anonymously</h2>
                <p>Choose a topic if you wish, then write what you would like us to know. Your name and contact details are not requested.</p>
                @if(session('concern_success'))<div class="alert" role="status">{{ session('concern_success') }}</div>@endif
                @if($errors->has('concern') || $errors->has('topic'))
                    <ul class="error-list" role="alert">
                        @foreach($errors->get('concern') as $error)<li>{{ $error }}</li>@endforeach
                        @foreach($errors->get('topic') as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                @endif
                <form action="{{ route('anonymous-concerns.store') }}" method="POST">
                    @csrf
                    <fieldset class="topic-picker">
                        <legend>What is this about? <span style="font-weight:400;color:var(--muted)">(optional)</span></legend>
                        <div class="topic-options">
                            <label class="topic-option"><input type="radio" name="topic" value="" @checked(old('topic', '') === '')><span>No specific topic</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Communication" @checked(old('topic') === 'Communication')><span>Communication</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Conflict resolution" @checked(old('topic') === 'Conflict resolution')><span>Conflict resolution</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Emotional or spiritual health" @checked(old('topic') === 'Emotional or spiritual health')><span>Emotional or spiritual health</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Emotional intimacy" @checked(old('topic') === 'Emotional intimacy')><span>Emotional intimacy</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Trust and forgiveness" @checked(old('topic') === 'Trust and forgiveness')><span>Trust and forgiveness</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Family or in-laws" @checked(old('topic') === 'Family or in-laws')><span>Family or in-laws</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Finances" @checked(old('topic') === 'Finances')><span>Finances</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Parenting and children" @checked(old('topic') === 'Parenting and children')><span>Parenting and children</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Time and connection" @checked(old('topic') === 'Time and connection')><span>Time and connection</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Sexual intimacy" @checked(old('topic') === 'Sexual intimacy')><span>Sexual intimacy</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Faith and spiritual life" @checked(old('topic') === 'Faith and spiritual life')><span>Faith and spiritual life</span></label>
                            <label class="topic-option"><input type="radio" name="topic" value="Something else" @checked(old('topic') === 'Other' || old('topic') === 'Something else')><span>Something else</span></label>
                        </div>
                    </fieldset>
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
