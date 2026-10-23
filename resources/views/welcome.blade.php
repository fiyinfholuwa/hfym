<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Healing For Young Marriages Retreat 2026</title>
    <meta name="description" content="A weekend of healing, rest, prayer and honest conversations for young marriages.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ink: #102b50;
            --muted: #5f6d80;
            --cream: #f5f8fc;
            --paper: #ffffff;
            --sage: #a8bdd9;
            --deep-sage: #0a4388;
            --forest: #062d6b;
            --terracotta: #e2232a;
            --gold: #c4d6ec;
            --line: rgba(16, 43, 80, .14);
            --shadow: 0 24px 70px rgba(6, 45, 107, .14);
            --radius-lg: 32px;
            --radius-md: 20px;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { margin: 0; color: var(--ink); background: var(--cream); font-family: 'DM Sans', sans-serif; font-size: 17px; line-height: 1.75; overflow-x: hidden; }
        a { color: inherit; }
        .container { width: min(1160px, calc(100% - 40px)); margin: 0 auto; }
        .display { font-family: 'Playfair Display', Georgia, serif; }
        .eyebrow { display: inline-flex; align-items: center; gap: 10px; color: var(--terracotta); font-size: .72rem; font-weight: 700; letter-spacing: .16em; text-transform: uppercase; }
        .eyebrow::before { content: ''; width: 28px; height: 1px; background: currentColor; }
        .section-heading { max-width: 680px; margin-bottom: 48px; }
        .section-heading h2 { margin: 15px 0 12px; font-size: clamp(2.2rem, 5vw, 4rem); line-height: 1.06; letter-spacing: -.045em; }
        .section-heading p { color: var(--muted); font-size: 1.05rem; margin: 0; }

        .site-nav { position: fixed; inset: 0 0 auto; z-index: 10; padding: 16px 0; background: rgba(4,27,66,.84); border-bottom: 1px solid rgba(255,255,255,.12); box-shadow: 0 10px 28px rgba(4,27,66,.14); backdrop-filter: blur(16px); }
        .nav-inner { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
        .brand { display: inline-flex; align-items: center; color: #fff; text-decoration: none; font-weight: 700; letter-spacing: -.02em; }
        .brand-mark { width: 194px; height: 72px; padding: 0; border-radius: 12px; background: #fff; display: grid; place-items: center; box-shadow: 0 9px 24px rgba(0,0,0,.18); overflow: visible; }
        .brand-mark img { display: block; width: 100%; height: 100%; object-fit: contain; border-radius: 12px; }
        .nav-links { display: flex; align-items: center; gap: 26px; color: rgba(255,255,255,.82); font-size: 1rem; }
        .nav-links a { text-decoration: none; transition: color .2s ease; }
        .nav-links a:hover { color: #fff; }
        .nav-cta { border: 1px solid rgba(255,255,255,.32); padding: 10px 17px; border-radius: 999px; }

        .hero { min-height: 760px; position: relative; isolation: isolate; color: #fff; overflow: hidden; background: radial-gradient(circle at 80% 20%, rgba(168, 189, 217, .2), transparent 28%), linear-gradient(116deg, #041b42 0%, #073673 56%, #19518f 100%); }
        .hero::before, .hero::after { content: ''; position: absolute; pointer-events: none; border-radius: 50%; filter: blur(2px); opacity: .55; }
        .hero::before { width: 500px; height: 500px; right: -180px; top: 120px; background: rgba(226,35,42,.16); }
        .hero::after { width: 260px; height: 260px; left: -100px; bottom: -80px; background: rgba(255,255,255,.09); }
        .hero-grid { min-height: 760px; display: grid; grid-template-columns: minmax(0, 1.02fr) minmax(430px, .98fr); align-items: center; gap: 72px; position: relative; z-index: 1; padding: 108px 0 58px; }
        .hero-copy { max-width: 650px; }
        .hero .eyebrow { color: #c4d6ec; }
        .hero h1 { margin: 18px 0 22px; font-size: clamp(3.4rem, 7vw, 6.6rem); line-height: .93; letter-spacing: -.06em; }
        .hero h1 span { color: #ffb9bd; font-style: italic; }
        .hero-intro { max-width: 560px; color: rgba(255,255,255,.78); font-size: 1.22rem; }
        .hero-date { display: block; margin-bottom: 10px; color: #fff; font-size: .78rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; }
        .verse { margin: 28px 0 32px; padding: 19px 22px; border-left: 2px solid var(--gold); color: #f6edda; font-family: 'Playfair Display', Georgia, serif; font-size: 1.3rem; line-height: 1.5; }
        .verse small { display: block; margin-top: 8px; color: #c4d6ec; font-family: 'DM Sans', sans-serif; font-size: .75rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
        .actions { display: flex; flex-wrap: wrap; align-items: center; gap: 14px; }
        .button { display: inline-flex; align-items: center; justify-content: center; gap: 10px; min-height: 52px; padding: 0 23px; border: 0; border-radius: 999px; color: #fff; background: var(--terracotta); box-shadow: 0 12px 25px rgba(226,35,42,.25); text-decoration: none; font-weight: 700; cursor: pointer; transition: transform .2s ease, box-shadow .2s ease, background .2s ease; }
        .button:hover { color: #fff; background: #c91920; box-shadow: 0 17px 35px rgba(226,35,42,.35); transform: translateY(-3px); }
        .button-ghost { color: #fff; background: transparent; border: 1px solid rgba(255,255,255,.3); box-shadow: none; }
        .button-ghost:hover { background: rgba(255,255,255,.1); box-shadow: none; }

        /* A lightweight GIF-like motion panel: the cards, orbit and beam continuously animate. */
        .scene { position: relative; height: 510px; perspective: 1200px; transform-style: preserve-3d; }
        .scene::before { content: ''; position: absolute; width: 350px; height: 350px; left: 50%; top: 50%; transform: translate(-50%,-50%); border: 1px solid rgba(255,255,255,.16); border-radius: 50%; box-shadow: 0 0 0 28px rgba(255,255,255,.025), 0 0 0 58px rgba(255,255,255,.018); }
        .scene::after { content: ''; position: absolute; z-index: 0; left: 50%; top: 50%; width: 3px; height: 390px; border-radius: 99px; background: linear-gradient(transparent, rgba(196,214,236,.72), transparent); opacity: .42; transform: translate(-50%,-50%) rotate(32deg); filter: blur(.4px); animation: beam-sweep 5s ease-in-out infinite; }
        .scene-orbit { position: absolute; z-index: 1; inset: 40px 17px; border: 1px solid rgba(255,255,255,.16); border-radius: 50%; transform: rotateX(64deg) rotateZ(-16deg); animation: orbit-spin 16s linear infinite; }
        .scene-orbit::after { content: ''; position: absolute; left: 9%; top: 8%; width: 10px; height: 10px; border-radius: 50%; background: #fff; box-shadow: 0 0 20px 5px rgba(196,214,236,.8); }
        .scene-glow { position: absolute; z-index: 1; left: 50%; top: 50%; width: 190px; height: 190px; border-radius: 50%; background: radial-gradient(circle at 35% 28%, #dce9f7, #e2232a 33%, #0a4388 72%); transform: translate(-50%,-50%) translateZ(30px); box-shadow: 0 0 60px rgba(196,214,236,.3), inset -20px -22px 40px rgba(4,27,66,.3); animation: core-pulse 4s ease-in-out infinite; }
        .scene-glow::before { content: '♡'; position: absolute; inset: 0; display: grid; place-items: center; color: rgba(255,255,255,.86); font-size: 5.2rem; font-family: Georgia, serif; transform: translateY(-5px); }
        .journey-card { position: absolute; z-index: 2; width: 230px; padding: 17px; border: 1px solid rgba(255,255,255,.25); border-radius: 20px; background: rgba(252,250,241,.13); box-shadow: 0 20px 40px rgba(0,0,0,.16); backdrop-filter: blur(16px); transform-style: preserve-3d; }
        .journey-card strong { display: block; color: #fff; font-size: 1.08rem; }
        .journey-card span { display: block; margin-top: 3px; color: rgba(255,255,255,.7); font-size: .9rem; line-height: 1.45; }
        .journey-card .card-dot { display: block; width: 10px; height: 10px; margin-bottom: 13px; border-radius: 50%; background: var(--terracotta); box-shadow: 0 0 0 5px rgba(226,35,42,.2); }
        .card-one { top: 40px; right: 0; transform: rotateY(-12deg) rotateZ(4deg); animation: card-one 6s ease-in-out infinite; }
        .card-two { left: 0; bottom: 84px; transform: rotateY(13deg) rotateZ(-5deg); animation: card-two 7s ease-in-out infinite; }
        .card-three { right: 24px; bottom: 10px; transform: rotateY(-9deg) rotateZ(3deg); animation: card-three 8s ease-in-out infinite; }
        .scene-label { position: absolute; z-index: 3; left: 50%; bottom: -2px; transform: translateX(-50%); white-space: nowrap; color: rgba(255,255,255,.62); font-size: .78rem; letter-spacing: .14em; text-transform: uppercase; }

        .facts { position: relative; z-index: 3; margin-top: -1px; padding: 27px 0; color: #fff; background: var(--terracotta); }
        .facts-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
        .fact { display: flex; gap: 14px; align-items: center; }
        .fact-icon { width: 42px; height: 42px; flex: 0 0 42px; display: grid; place-items: center; border: 1px solid rgba(255,255,255,.4); border-radius: 50%; font-size: 1.2rem; }
        .fact strong { display: block; font-size: 1rem; }
        .fact span { display: block; color: rgba(255,255,255,.75); font-size: .9rem; }

        section { padding: 112px 0; }
        .letter-section { background: var(--paper); }
        .letter-grid { display: grid; grid-template-columns: .75fr 1.25fr; gap: 90px; align-items: start; }
        .letter-aside { position: sticky; top: 35px; }
        .letter-aside h2 { margin: 16px 0; font-size: clamp(2.2rem, 4vw, 4rem); line-height: 1.03; letter-spacing: -.05em; }
        .letter-aside p { color: var(--muted); }
        .scripture-card { margin-top: 30px; padding: 23px; border-radius: var(--radius-md); color: #fff; background: var(--forest); box-shadow: var(--shadow); }
        .scripture-card p { margin: 0 0 10px; color: #fff; font-family: 'Playfair Display', Georgia, serif; font-size: 1.2rem; line-height: 1.45; }
        .scripture-card small { color: #c4d6ec; text-transform: uppercase; font-size: .7rem; font-weight: 700; letter-spacing: .1em; }
        .letter { position: relative; padding: 40px 44px; border: 1px solid var(--line); border-radius: var(--radius-lg); background: #fff; box-shadow: var(--shadow); }
        .letter::before { content: '“'; position: absolute; top: 8px; left: 23px; color: rgba(226,35,42,.2); font-family: Georgia, serif; font-size: 7rem; line-height: 1; }
        .letter p { position: relative; margin: 0 0 22px; color: #4f5b54; font-size: 1.13rem; }
        .letter p:last-child { margin-bottom: 0; }
        .letter-lead { color: var(--forest) !important; font-family: 'Playfair Display', Georgia, serif; font-size: 1.65rem !important; line-height: 1.45; }

        .rhythm-section { background: #eaf1fa; }
        .rhythm-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 18px; }
        .rhythm-card { min-height: 240px; padding: 25px; border: 1px solid rgba(10,67,136,.14); border-radius: var(--radius-md); background: rgba(255,255,255,.72); transition: transform .3s ease, box-shadow .3s ease; }
        .rhythm-card:hover { transform: translateY(-9px) rotateX(2deg) rotateY(-2deg); box-shadow: 0 20px 35px rgba(10,67,136,.14); }
        .rhythm-number { color: var(--terracotta); font-family: 'Playfair Display', Georgia, serif; font-size: 2.8rem; line-height: 1; }
        .rhythm-card h3 { margin: 24px 0 8px; font-size: 1.3rem; }
        .rhythm-card p { margin: 0; color: var(--muted); font-size: 1rem; }

        .pause-section { color: #fff; background: var(--forest); overflow: hidden; }
        .pause-grid { display: grid; grid-template-columns: 1.1fr .9fr; gap: 80px; align-items: center; }
        .pause-section .eyebrow { color: #c4d6ec; }
        .pause-section h2 { margin: 16px 0; font-size: clamp(2.5rem, 5vw, 4.7rem); line-height: 1.02; letter-spacing: -.055em; }
        .pause-section p { max-width: 620px; color: rgba(255,255,255,.72); font-size: 1.08rem; }
        .schedule { display: grid; gap: 14px; margin-top: 30px; }
        .schedule-row { display: flex; justify-content: space-between; gap: 20px; padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,.15); color: rgba(255,255,255,.72); font-size: 1rem; }
        .schedule-row strong { color: #fff; }
        .pause-orbit { position: relative; width: min(330px, 80vw); aspect-ratio: 1; margin: auto; border: 1px solid rgba(255,255,255,.2); border-radius: 50%; box-shadow: 0 0 0 14px rgba(196,214,236,.04), 0 22px 40px rgba(0,0,0,.16); transform: rotateZ(18deg); animation: orbit-float 7s ease-in-out infinite; }
        .pause-orbit::before, .pause-orbit::after { content: ''; position: absolute; inset: 15%; border: 1px solid rgba(196,214,236,.4); border-radius: 50%; }
        .pause-orbit::after { inset: 28%; border-color: rgba(226,35,42,.5); }
        .pause-orb { position: absolute; left: 50%; top: 50%; width: 116px; height: 116px; display: grid; place-items: center; border-radius: 50%; color: #fff; background: radial-gradient(circle at 30% 25%, #dce9f7, #e2232a 48%, #0a4388 100%); font-family: Georgia, serif; font-size: 4rem; box-shadow: 0 0 45px rgba(196,214,236,.35); transform: translate(-50%,-50%) rotateZ(-18deg); animation: pause-pulse 4s ease-in-out infinite; }

        .register-section { background: var(--cream); }
        .register-grid { display: grid; grid-template-columns: .72fr 1.28fr; gap: 80px; align-items: start; }
        .register-copy h2 { margin: 16px 0; font-size: clamp(2.5rem, 5vw, 4rem); line-height: 1.03; letter-spacing: -.05em; }
        .register-copy p { color: var(--muted); }
        .register-note { margin-top: 30px; padding: 20px; border-left: 2px solid var(--terracotta); color: var(--muted); font-size: .9rem; }
        .form-card { padding: 36px; border-radius: var(--radius-lg); background: #fff; box-shadow: var(--shadow); }
        .form-card h3 { margin: 0 0 7px; font-family: 'Playfair Display', Georgia, serif; font-size: 2rem; }
        .form-card > p { margin: 0 0 27px; color: var(--muted); font-size: .9rem; }
        .form-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 17px; }
        .field { display: grid; gap: 7px; }
        .field.full { grid-column: 1 / -1; }
        .field label { color: var(--ink); font-size: .9rem; font-weight: 700; }
        .field input, .field select, .field textarea { width: 100%; border: 1px solid rgba(29,42,36,.16); border-radius: 12px; padding: 14px 15px; color: var(--ink); background: #fbfaf5; font: inherit; font-size: 1rem; outline: none; transition: border .2s ease, box-shadow .2s ease; }
        .field textarea { min-height: 98px; resize: vertical; }
        .field input:focus, .field select:focus, .field textarea:focus { border-color: var(--deep-sage); box-shadow: 0 0 0 4px rgba(10,67,136,.12); }
        .check { display: flex; gap: 10px; align-items: flex-start; margin: 19px 0 23px; color: var(--muted); font-size: .82rem; }
        .check input { margin-top: 5px; accent-color: var(--terracotta); }
        .form-card .button { width: 100%; }
        .alert { margin-bottom: 22px; padding: 13px 15px; border-radius: 12px; color: #0a4388; background: #e6f0fb; font-size: .87rem; }
        .error-list { margin: 0 0 22px; padding: 13px 15px 13px 32px; border-radius: 12px; color: #8c3f2b; background: #f9e7e1; font-size: .85rem; }
        .form-feedback { margin-bottom: 22px; padding: 13px 15px; border-radius: 12px; color: #8c3f2b; background: #f9e7e1; font-size: .87rem; }
        .form-feedback[hidden] { display: none; }

        .whatsapp-modal-backdrop { position: fixed; inset: 0; z-index: 100; display: grid; place-items: center; padding: 20px; background: rgba(4, 27, 66, .7); opacity: 0; visibility: hidden; transition: opacity .25s ease, visibility .25s ease; backdrop-filter: blur(8px); }
        .whatsapp-modal-backdrop.is-open { opacity: 1; visibility: visible; }
        .whatsapp-modal { position: relative; width: min(520px, 100%); padding: 42px 34px 32px; border: 1px solid rgba(255,255,255,.65); border-radius: 28px; color: var(--ink); background: rgba(255,255,255,.97); box-shadow: 0 30px 90px rgba(0,0,0,.3); transform: translateY(18px) scale(.97); transition: transform .3s ease; text-align: center; }
        .whatsapp-modal-backdrop.is-open .whatsapp-modal { transform: translateY(0) scale(1); }
        .whatsapp-modal::before { content: '✓'; width: 68px; height: 68px; display: grid; place-items: center; margin: 0 auto 18px; border-radius: 50%; color: #fff; background: linear-gradient(145deg, #2bd36b, #0c9d4a); box-shadow: 0 12px 25px rgba(12,157,74,.25); font-size: 2rem; font-weight: 700; }
        .whatsapp-modal.is-existing::before { content: '↗'; background: linear-gradient(145deg, #0d559f, #062d6b); box-shadow: 0 12px 25px rgba(6,45,107,.25); }
        .whatsapp-modal h3 { margin: 0 0 10px; color: var(--forest); font-family: 'Playfair Display', Georgia, serif; font-size: 2rem; line-height: 1.1; }
        .whatsapp-modal p { margin: 0 auto 24px; max-width: 410px; color: var(--muted); font-size: 1rem; line-height: 1.6; }
        .modal-actions { display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; }
        .whatsapp-button { width: auto !important; min-width: 210px; background: #16b957; box-shadow: 0 12px 25px rgba(22,185,87,.25); }
        .whatsapp-button:hover { background: #0d9d49; box-shadow: 0 17px 35px rgba(22,185,87,.33); }
        .modal-dismiss { min-height: 52px; padding: 0 21px; border: 1px solid rgba(16,43,80,.16); border-radius: 999px; color: var(--ink); background: transparent; font: inherit; font-weight: 700; cursor: pointer; }
        .modal-dismiss:hover { background: #f1f5fa; }
        .modal-close { position: absolute; top: 14px; right: 16px; width: 36px; height: 36px; border: 0; border-radius: 50%; color: var(--muted); background: #eef3f9; font-size: 1.35rem; line-height: 1; cursor: pointer; }
        .modal-close:hover { color: var(--ink); background: #e1eaf5; }
        body.modal-open { overflow: hidden; }

        .closing { padding: 90px 0; text-align: center; color: #fff; background: var(--terracotta); }
        .closing h2 { max-width: 760px; margin: 16px auto 18px; font-size: clamp(2.5rem, 5vw, 4.7rem); line-height: 1; letter-spacing: -.05em; }
        .closing p { max-width: 610px; margin: 0 auto 28px; color: rgba(255,255,255,.78); }
        .signature { display: inline-block; padding-top: 22px; border-top: 1px solid rgba(255,255,255,.35); font-size: .85rem; }
        .signature strong { display: block; font-size: .95rem; }
        .signature span { color: rgba(255,255,255,.72); }
        footer { padding: 22px 0; color: rgba(255,255,255,.62); background: #041b42; text-align: center; font-size: .78rem; }

        @keyframes orbit-spin { to { transform: rotateX(64deg) rotateZ(344deg); } }
        @keyframes core-pulse { 0%, 100% { transform: translate(-50%,-50%) translateZ(30px) scale(1); } 50% { transform: translate(-50%,-50%) translateZ(76px) scale(1.12); } }
        @keyframes orbit-float { 0%, 100% { transform: rotateZ(18deg) translateY(0); } 50% { transform: rotateZ(18deg) translateY(-12px); } }
        @keyframes pause-pulse { 0%, 100% { transform: translate(-50%,-50%) rotateZ(-18deg) scale(1); } 50% { transform: translate(-50%,-50%) rotateZ(-18deg) scale(1.1); } }
        @keyframes beam-sweep { 0%, 100% { opacity: .18; transform: translate(-50%,-50%) rotate(23deg) scaleY(.82); } 50% { opacity: .7; transform: translate(-50%,-50%) rotate(48deg) scaleY(1.08); } }
        @keyframes card-one { 0%, 100% { transform: translate3d(0,0,30px) rotateY(-12deg) rotateZ(4deg); } 50% { transform: translate3d(0,-18px,68px) rotateY(-8deg) rotateZ(2deg); } }
        @keyframes card-two { 0%, 100% { transform: translate3d(0,0,10px) rotateY(13deg) rotateZ(-5deg); } 50% { transform: translate3d(0,14px,56px) rotateY(8deg) rotateZ(-2deg); } }
        @keyframes card-three { 0%, 100% { transform: translate3d(0,0,20px) rotateY(-9deg) rotateZ(3deg); } 50% { transform: translate3d(0,-15px,82px) rotateY(-5deg) rotateZ(1deg); } }
        @media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; } }
        @media (max-width: 900px) {
            .hero-grid, .letter-grid, .pause-grid, .register-grid { grid-template-columns: 1fr; gap: 52px; }
            .hero-grid { padding-top: 150px; }
            .hero { min-height: auto; }
            .scene { max-width: 570px; width: 100%; margin: 0 auto; }
            .letter-aside { position: static; }
            .rhythm-grid { grid-template-columns: repeat(2, 1fr); }
            .pause-orbit { margin-top: 0; }
        }
        @media (max-width: 620px) {
            .container { width: min(100% - 28px, 1160px); }
            .site-nav { padding: 12px 0; }
            .nav-links a:not(.nav-cta) { display: none; }
            .brand { font-size: .85rem; }
            .brand-mark { width: 146px; height: 56px; }
            .hero-grid { padding-top: 128px; padding-bottom: 50px; }
            .hero h1 { font-size: clamp(3.1rem, 15vw, 5rem); }
            .scene { height: 390px; transform: scale(.88); transform-origin: top center; margin-bottom: -35px; }
            .facts-grid { grid-template-columns: 1fr; gap: 17px; }
            section { padding: 78px 0; }
            .letter { padding: 34px 24px; }
            .rhythm-grid, .form-grid { grid-template-columns: 1fr; }
            .field.full { grid-column: auto; }
            .form-card { padding: 24px 18px; }
            .schedule-row { align-items: flex-start; flex-direction: column; gap: 3px; }
        }
    </style>
</head>
<body>
    <header class="site-nav">
        <div class="container nav-inner">
            <a class="brand" href="#top" aria-label="Healing For Young Marriages Retreat home">
                <span class="brand-mark"><img src="{{ asset('images/rhema-house-logo.png') }}" alt="The Rhema House logo"></span>
            </a>
            <nav class="nav-links" aria-label="Main navigation">
                <a href="#letter">The burden</a>
                <a href="#rhythm">The retreat</a>
                <a class="nav-cta" href="#register">Register together</a>
            </nav>
        </div>
    </header>

    <main id="top">
        <section class="hero">
            <div class="container hero-grid">
                <div class="hero-copy">
                    <span class="eyebrow">Healing For Young Marriages · 2026</span>
                    <h1 class="display">Healthy <span>all round.</span></h1>
                    <p class="hero-intro"><strong class="hero-date">20–22 November 2026 · Friday evening → Sunday, 3:00 PM</strong>A quiet weekend away for couples who want to pause, listen, pray and return to the path of their divinely ordained marital destiny.</p>
                    <div class="verse">“Beloved, I wish above all things that thou mayest prosper and be in health, even as thy soul prospereth.”<small>3 John 1:2 KJV</small></div>
                    <div class="actions"><a class="button" href="#register">Reserve your place <span aria-hidden="true">→</span></a><a class="button button-ghost" href="#letter">Read the invitation</a></div>
                </div>

                <div class="scene" aria-label="Animated illustration of the retreat journey" role="img">
                    <div class="scene-orbit"></div><div class="scene-glow"></div>
                    <div class="journey-card card-one"><span class="card-dot"></span><strong>01 · Reflect</strong><span>Where did we hope to go?</span></div>
                    <div class="journey-card card-two"><span class="card-dot"></span><strong>02 · Restore</strong><span>Let the Word bring healing.</span></div>
                    <div class="journey-card card-three"><span class="card-dot"></span><strong>03 · Return</strong><span>Walk into your shared destiny.</span></div>
                    <span class="scene-label">A weekend to come away together</span>
                </div>
            </div>
        </section>

        <section class="facts" aria-label="Retreat facts">
            <div class="container facts-grid">
                <div class="fact"><span class="fact-icon">◷</span><div><strong>20–22 November 2026</strong><span>Friday evening → Sunday, 3:00 PM</span></div></div>
                <div class="fact"><span class="fact-icon">♡</span><div><strong>Come as a couple</strong><span>A shared investment in your journey</span></div></div>
                <div class="fact"><span class="fact-icon">⌂</span><div><strong>Feeding & accommodation</strong><span>Provided for everyone who has need</span></div></div>
            </div>
        </section>

        <section class="letter-section" id="letter">
            <div class="container letter-grid">
                <aside class="letter-aside"><span class="eyebrow">The invitation</span><h2 class="display">A desire to see every marriage in health.</h2><p>The burden for this year’s retreat comes from a simple, deep question: are the marriages connected to our church and ministry prospering and in health?</p><div class="scripture-card"><p>“The desire of the Lord and our desire too is to see all the marriages concerned healthy ALL ROUND.”</p><small>Healing for Young Marriages · 2026</small></div></aside>
                <article class="letter">
                    <p class="letter-lead">Like our elder John, we also wish above all things that all the marriages concerned are prospering and in health. Health in every important part. Just as a body cannot be said to be in health if some parts are sick.</p>
                    <p>If there are therefore areas of sickness at the moment, we trust God to bring healing at the coming Retreat. The Retreat is meant to be a time of deep meditation on our marital journeys.</p>
                    <p>Where did we hope to go with the journey originally? Where are we? What must we do now to return to the right path that leads to our divinely ordained marital destiny?</p>
                    <p>It’ll be a time to have a fresh encounter with the word of God; a time of rest; a time of prayer; and a time to have soul-searching conversations with one another.</p>
                    <p>We encourage you and your spouse to clear out your schedules for that weekend and determine to come together aside alone for a moment of investment into your journey.</p>
                </article>
            </div>
        </section>

        <section class="rhythm-section" id="rhythm">
            <div class="container"><div class="section-heading"><span class="eyebrow">What the weekend holds</span><h2 class="display">A pause with purpose.</h2><p>The retreat makes room for the things that strengthen a marriage: truth, presence, prayer and a shared return to God’s Word.</p></div>
                <div class="rhythm-grid"><article class="rhythm-card"><span class="rhythm-number">01</span><h3>The Word</h3><p>Receive a fresh encounter with the word of God and the wisdom it brings to your journey.</p></article><article class="rhythm-card"><span class="rhythm-number">02</span><h3>Rest</h3><p>Step away from the pace of life and create space to breathe, notice and be present.</p></article><article class="rhythm-card"><span class="rhythm-number">03</span><h3>Prayer</h3><p>Trust God for healing in every area of sickness and for grace to move forward together.</p></article><article class="rhythm-card"><span class="rhythm-number">04</span><h3>Conversation</h3><p>Have soul-searching conversations with one another about where you are and where you are going.</p></article></div>
            </div>
        </section>

        <section class="pause-section"><div class="container pause-grid"><div><span class="eyebrow">Clear your schedules</span><h2 class="display">Come away together for a moment.</h2><p>Retreat will commence on Friday, 20 November, and run through Saturday, 21 November, and Sunday, 22 November, until 3:00 PM. We can’t wait to see you all.</p><div class="schedule" aria-label="Retreat schedule"><div class="schedule-row"><strong>Friday · 20 Nov</strong><span>Arrival & settling in</span></div><div class="schedule-row"><strong>Saturday · 21 Nov</strong><span>Teaching, rest, prayer & conversations</span></div><div class="schedule-row"><strong>Sunday · 22 Nov · 3:00 PM</strong><span>Close of retreat</span></div></div></div><div class="pause-orbit" aria-hidden="true"><div class="pause-orb">♡</div></div></div></section>

        <section class="register-section" id="register"><div class="container register-grid"><div class="register-copy"><span class="eyebrow">Your next step</span><h2 class="display">Make room for your marriage.</h2><p>Plan ahead to attend the retreat together. Tell us how to prepare to welcome you both.</p><div class="register-note">“We trust God to bring healing at the coming Retreat.”<br><strong>— Peniela Eniayo Akintujoye</strong></div></div>
            <div class="form-card"><h3>Register for the retreat</h3><p>Complete the form below to secure your place for Healing For Young Marriages 2026.</p>
                @if(session('success'))<div class="alert" role="status">{{ session('success') }}</div>@endif
                @if($errors->any())<ul class="error-list" role="alert">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>@endif
                <div id="ajaxFormFeedback" class="form-feedback" role="alert" hidden></div>
                <form id="registrationForm" action="{{ route('couple.register') }}" method="POST">
                    @csrf
                    <div class="form-grid">
                        <div class="field"><label for="husbandName">Husband’s full name *</label><input id="husbandName" name="husbandName" value="{{ old('husbandName') }}" required></div>
                        <div class="field"><label for="wifeName">Wife’s full name *</label><input id="wifeName" name="wifeName" value="{{ old('wifeName') }}" required></div>
                        <div class="field"><label for="email">Email address *</label><input id="email" type="email" name="email" value="{{ old('email') }}" required></div>
                        <div class="field"><label for="phone">Phone number *</label><input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required></div>
                        <div class="field full"><label for="address">Home address *</label><textarea id="address" name="address" required>{{ old('address') }}</textarea></div>
                        <div class="field"><label for="marriageYears">Years married *</label><select id="marriageYears" name="marriageYears" required><option value="">Select...</option><option value="0-2" @selected(old('marriageYears') === '0-2')>0–2 years</option><option value="3-5" @selected(old('marriageYears') === '3-5')>3–5 years</option><option value="6-10" @selected(old('marriageYears') === '6-10')>6–10 years</option><option value="11+" @selected(old('marriageYears') === '11+')>11+ years</option></select></div>
                        <div class="field"><label for="coming_type">How will you attend? *</label><select id="coming_type" name="coming_type" required><option value="">Select...</option><option value="physical" @selected(old('coming_type') === 'physical')>Physical</option><option value="virtual" @selected(old('coming_type') === 'virtual')>Virtual</option></select></div>
                        <div class="field full"><label for="church">Church / fellowship *</label><input id="church" name="church" value="{{ old('church') }}" required></div>
                        <div class="field full"><label for="expectations">What are your expectations?</label><textarea id="expectations" name="expectations">{{ old('expectations') }}</textarea></div>
                        <div class="field full"><label for="prayerRequests">Prayer requests <span style="font-weight:400;color:var(--muted)">(optional)</span></label><textarea id="prayerRequests" name="prayerRequests">{{ old('prayerRequests') }}</textarea></div>
                    </div>
                    <label class="check"><input type="checkbox" required><span>I confirm that both my spouse and I plan to attend the retreat together.</span></label>
                    <button id="registrationSubmit" class="button" type="submit">Submit registration <span aria-hidden="true">→</span></button>
                </form>
            </div>
        </div></section>

        <section class="closing"><div class="container"><span class="eyebrow">With love</span><h2 class="display">We can’t wait to see you all.</h2><p>May every home experience the healing, health and prosperity that God desires for His people.</p><div class="signature"><strong>Peniela Eniayo, Akintujoye</strong><span>Pastor, MIV Rhema House · Lead Facilitator, Love Straight Talks</span></div></div></section>
    </main>

    <footer><div class="container">MIV Rhema House · Healing For Young Marriages Retreat 2026</div></footer>

    <div id="whatsappModal" class="whatsapp-modal-backdrop" role="presentation" aria-hidden="true">
        <div class="whatsapp-modal" role="dialog" aria-modal="true" aria-labelledby="whatsappModalTitle" aria-describedby="whatsappModalMessage">
            <button class="modal-close" type="button" aria-label="Close dialog">×</button>
            <h3 id="whatsappModalTitle">Registration received</h3>
            <p id="whatsappModalMessage">Thank you for registering. Join the retreat community on WhatsApp for updates and important information.</p>
            <div class="modal-actions">
                <a id="whatsappJoinButton" class="button whatsapp-button" href="{{ config('services.whatsapp.group_url') }}" target="_blank" rel="noopener">Join WhatsApp group <span aria-hidden="true">↗</span></a>
                <button class="modal-dismiss" type="button">Maybe later</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('registrationForm');
            const submitButton = document.getElementById('registrationSubmit');
            const feedback = document.getElementById('ajaxFormFeedback');
            const modalBackdrop = document.getElementById('whatsappModal');
            const modal = modalBackdrop.querySelector('.whatsapp-modal');
            const modalTitle = document.getElementById('whatsappModalTitle');
            const modalMessage = document.getElementById('whatsappModalMessage');
            const joinButton = document.getElementById('whatsappJoinButton');
            const closeButtons = modalBackdrop.querySelectorAll('.modal-close, .modal-dismiss');
            let lastFocusedElement = null;

            function openWhatsAppModal(type, message, whatsappUrl) {
                lastFocusedElement = document.activeElement;
                modal.classList.toggle('is-existing', type === 'existing');
                modalTitle.textContent = type === 'existing' ? 'You are already registered' : 'Registration received';
                modalMessage.textContent = message;
                if (whatsappUrl) joinButton.href = whatsappUrl;
                modalBackdrop.classList.add('is-open');
                modalBackdrop.setAttribute('aria-hidden', 'false');
                document.body.classList.add('modal-open');
                closeButtons[0].focus();
            }

            function closeWhatsAppModal() {
                modalBackdrop.classList.remove('is-open');
                modalBackdrop.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('modal-open');
                if (lastFocusedElement) lastFocusedElement.focus();
            }

            function showFormError(message) {
                feedback.textContent = message;
                feedback.hidden = false;
                feedback.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            closeButtons.forEach(function (button) {
                button.addEventListener('click', closeWhatsAppModal);
            });

            modalBackdrop.addEventListener('click', function (event) {
                if (event.target === modalBackdrop) closeWhatsAppModal();
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && modalBackdrop.classList.contains('is-open')) closeWhatsAppModal();
            });

            form.addEventListener('submit', async function (event) {
                event.preventDefault();
                feedback.hidden = true;

                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }

                const originalButtonText = submitButton.innerHTML;
                submitButton.disabled = true;
                submitButton.innerHTML = 'Submitting…';

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });
                    const data = await response.json();

                    if (response.ok && data.success) {
                        form.reset();
                        openWhatsAppModal('success', 'Thank you for registering. Join the retreat community on WhatsApp for updates and important information.', data.whatsapp_url);
                    } else if (response.status === 422 && data.errors && data.errors.email && /already (been )?taken|already exists/i.test(data.errors.email[0])) {
                        openWhatsAppModal('existing', 'This email is already connected to a retreat registration. You can still join the WhatsApp group for updates and next steps.', data.whatsapp_url);
                    } else if (response.status === 422) {
                        showFormError('Please review the highlighted form details and try again.');
                    } else {
                        showFormError('Something went wrong while submitting your registration. Please try again.');
                    }
                } catch (error) {
                    showFormError('We could not connect to the registration service. Please check your connection and try again.');
                } finally {
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalButtonText;
                }
            });
        });
    </script>
</body>
</html>
