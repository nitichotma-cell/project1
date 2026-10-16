{{-- filepath: c:\laragon\www\passakorn1\resources\views\index.blade.php --}}
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ร้านค้าของอ้อด</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            color: #1f2937;
            font-family: Arial, "Noto Sans Thai", sans-serif;
            background: #f8fafc;
        }

        button, input { font: inherit; }
        button, a { -webkit-tap-highlight-color: transparent; }

        .site-header {
            position: sticky;
            top: 0;
            z-index: 3;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 74px;
            padding: 12px max(24px, calc((100% - 1120px) / 2));
            background: #fff;
            box-shadow: 0 2px 14px #1720330d;
        }

        .logo {
            color: #1479d0;
            font-size: 23px;
            font-weight: 800;
            text-decoration: none;
        }

        .header-actions { display: flex; align-items: center; gap: 10px; }
        .welcome { color: #64748b; }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 10px 16px;
            border: 0;
            border-radius: 8px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .btn-primary { background: #1479d0; color: white; }
        .btn-primary:hover { background: #0d63b0; transform: translateY(-1px); }
        .btn-light { background: #edf6ff; color: #1479d0; }
        .btn-light:hover { background: #dceeff; }

        .hero {
            min-height: 350px;
            display: flex;
            align-items: center;
            background:
                linear-gradient(90deg, rgba(12, 28, 48, .82), rgba(12, 28, 48, .18)),
                url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1800&q=85')
                center 55% / cover no-repeat;
        }

        .hero-content {
            width: min(1120px, calc(100% - 40px));
            margin: 0 auto;
            padding: 55px 0;
            color: white;
        }

        .hero-label {
            display: inline-block;
            margin-bottom: 14px;
            padding: 7px 12px;
            border-radius: 20px;
            background: #ffffff24;
            font-size: 14px;
        }

        .hero h1 {
            max-width: 620px;
            margin: 0 0 14px;
            font-size: clamp(32px, 5vw, 52px);
            line-height: 1.2;
        }

        .hero p {
            max-width: 520px;
            margin: 0 0 24px;
            color: #e5edf5;
            font-size: 17px;
            line-height: 1.7;
        }

        .products-section {
            width: min(1120px, calc(100% - 40px));
            margin: 0 auto;
            padding: 54px 0 70px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 16px;
            margin-bottom: 25px;
        }

        .section-heading h2 {
            margin: 0 0 6px;
            font-size: 28px;
        }

        .section-heading p { margin: 0; color: #718096; }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .product-card {
            overflow: hidden;
            border: 1px solid #e9eef4;
            border-radius: 14px;
            background: white;
            box-shadow: 0 5px 18px #1720330a;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px #17203314;
        }

        .product-image,
        .product-placeholder {
            display: flex;
            width: 100%;
            height: 230px;
            align-items: center;
            justify-content: center;
            object-fit: cover;
            background: #edf4fa;
        }

        .product-placeholder {
            color: #1479d0;
            font-size: 54px;
        }

        .product-info { padding: 18px; }
        .product-info h3 { margin: 0 0 8px; font-size: 19px; }
        .product-description {
            min-height: 44px;
            margin: 0 0 16px;
            color: #718096;
            line-height: 1.5;
        }

        .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .price { color: #1479d0; font-size: 20px; font-weight: 800; }
        .empty-products {
            grid-column: 1 / -1;
            padding: 45px 20px;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            color: #718096;
            text-align: center;
            background: white;
        }

        .site-footer {
            padding: 22px;
            color: #718096;
            text-align: center;
            background: white;
            border-top: 1px solid #e9eef4;
        }

        /* Login / Register modal */
        #auth-modal[hidden] { display: none; }

        #auth-modal {
            position: fixed;
            inset: 0;
            z-index: 10;
            display: grid;
            place-items: center;
            overflow-y: auto;
            padding: 20px;
            background: #10182799;
            backdrop-filter: blur(3px);
        }

        .auth-card {
            width: min(100%, 460px);
            padding: 28px;
            border-radius: 16px;
            background: white;
            box-shadow: 0 20px 60px #0003;
        }

        .auth-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .close-button {
            padding: 2px 8px;
            border: 0;
            background: transparent;
            color: #64748b;
            font-size: 28px;
            cursor: pointer;
        }

        .tabs {
            display: flex;
            margin: 18px 0 22px;
            border-bottom: 1px solid #e2e8f0;
        }

        .tab {
            flex: 1;
            padding: 12px;
            border: 0;
            border-bottom: 2px solid transparent;
            background: transparent;
            color: #64748b;
            cursor: pointer;
        }

        .tab.active {
            color: #1479d0;
            border-bottom-color: #1479d0;
            font-weight: 700;
        }

        .auth-form[hidden] { display: none; }
        .auth-form label { display: block; margin: 14px 0 7px; font-weight: 600; }

        .auth-form input:not([type="checkbox"]) {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
        }

        .auth-form input:focus {
            outline: 2px solid #1479d033;
            border-color: #1479d0;
        }

        .remember-label {
            display: flex !important;
            align-items: center;
            gap: 8px;
            color: #475569;
            font-weight: 400 !important;
        }

        .auth-submit { width: 100%; margin-top: 18px; }
        .forgot-link {
            display: block;
            margin-top: 14px;
            color: #1479d0;
            text-align: center;
            text-decoration: none;
        }

        .forgot-link:hover { text-decoration: underline; }
        .error-message {
            padding: 10px 12px;
            border-radius: 8px;
            color: #b42318;
            background: #fef3f2;
        }

        @media (max-width: 760px) {
            .site-header { padding: 12px 18px; }
            .welcome { display: none; }
            .hero { min-height: 310px; }
            .product-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }

        @media (max-width: 520px) {
            .site-header { min-height: 64px; }
            .logo { font-size: 19px; }
            .header-actions { gap: 6px; }
            .header-actions .btn { padding: 9px 10px; font-size: 13px; }
            .hero-content, .products-section { width: calc(100% - 32px); }
            .hero { min-height: 290px; }
            .hero p { font-size: 15px; }
            .products-section { padding: 38px 0 48px; }
            .section-heading h2 { font-size: 23px; }
            .product-grid { grid-template-columns: 1fr; gap: 16px; }
            .product-image, .product-placeholder { height: 220px; }
            .auth-card { padding: 22px; }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <a class="logo" href="{{ route('index') }}">ร้านค้าของเรา</a>

        <div class="header-actions">
            @auth
                <span class="welcome">สวัสดี, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-light" type="submit">ออกจากระบบ</button>
                </form>
            @else
                <button class="btn btn-light" type="button" data-open-auth="login">เข้าสู่ระบบ</button>
                <button class="btn btn-primary" type="button" data-open-auth="register">สมัครสมาชิก</button>
            @endauth
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <span class="hero-label">ร้านค้าออนไลน์</span>
                <h1>เลือกสินค้าชิ้นโปรด<br>ได้ง่ายในที่เดียว</h1>
                <p>รวมสินค้าคุณภาพ คัดสรรมาเพื่อคุณ พร้อมเลือกชมรายการสินค้าได้ด้านล่าง</p>
                <a class="btn btn-primary" href="#products">เลือกชมสินค้า</a>
            </div>
        </section>

        <section class="products-section" id="products">
            <div class="section-heading">
                <div>
                    <h2>สินค้าในร้าน</h2>
                    <p>เลือกชมสินค้าที่มีในร้านของเรา</p>
                </div>
            </div>

            <div class="product-grid">
                @forelse ($products as $product)
                    <article class="product-card">
                        @if ($product->image)
                            <img
                                class="product-image"
                                src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}">
                        @else
                            <div class="product-placeholder" aria-label="ไม่มีรูปสินค้า">🛍️</div>
                        @endif

                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <p class="product-description">
                                {{ $product->description ?: 'สินค้าคุณภาพจากร้านค้าของเรา' }}
                            </p>
                            <div class="product-bottom">
                                <strong class="price">฿{{ number_format($product->price, 2) }}</strong>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-products">
                        <div style="font-size: 42px; margin-bottom: 10px;">🛍️</div>
                        <strong>ยังไม่มีสินค้าในร้าน</strong>
                        <p>สินค้าใหม่จะแสดงที่นี่เมื่อเพิ่มสินค้าแล้ว</p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

    <footer class="site-footer">© {{ date('Y') }} ร้านค้าของเรา</footer>

    <div id="auth-modal" @if (!$errors->any()) hidden @endif>
        <section class="auth-card" role="dialog" aria-modal="true" aria-label="บัญชีผู้ใช้">
            <div class="auth-top">
                <strong>บัญชีผู้ใช้</strong>
                <button class="close-button" type="button" data-close-auth aria-label="ปิด">×</button>
            </div>

            @if ($errors->any())
                <p class="error-message">{{ $errors->first() }}</p>
            @endif

            <div class="tabs">
                <button class="tab {{ old('_auth_form') !== 'register' ? 'active' : '' }}"
                        type="button" data-auth-tab="login">เข้าสู่ระบบ</button>
                <button class="tab {{ old('_auth_form') === 'register' ? 'active' : '' }}"
                        type="button" data-auth-tab="register">สมัครสมาชิก</button>
            </div>

            <form class="auth-form" id="login-form" method="POST" action="{{ route('login') }}"
                  @if (old('_auth_form') === 'register') hidden @endif>
                @csrf
                <input type="hidden" name="_auth_form" value="login">

                <label for="login-email">อีเมล</label>
                <input id="login-email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>

                <label for="login-password">รหัสผ่าน</label>
                <input id="login-password" type="password" name="password" autocomplete="current-password" required>

                <label class="remember-label">
                    <input type="checkbox" name="remember" value="1">
                    จดจำฉัน
                </label>

                <button class="btn btn-primary auth-submit" type="submit">เข้าสู่ระบบ</button>

                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
                @endif
            </form>

            <form class="auth-form" id="register-form" method="POST" action="{{ route('register') }}"
                  @if (old('_auth_form') !== 'register') hidden @endif>
                @csrf
                <input type="hidden" name="_auth_form" value="register">

                <label for="register-name">ชื่อ</label>
                <input id="register-name" type="text" name="name" value="{{ old('name') }}" autocomplete="name" required>

                <label for="register-email">อีเมล</label>
                <input id="register-email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>

                <label for="register-password">รหัสผ่าน (อย่างน้อย 8 ตัวอักษร)</label>
                <input id="register-password" type="password" name="password" autocomplete="new-password" required>

                <label for="register-confirmation">ยืนยันรหัสผ่าน</label>
                <input id="register-confirmation" type="password" name="password_confirmation" autocomplete="new-password" required>

                <button class="btn btn-primary auth-submit" type="submit">สมัครสมาชิก</button>
            </form>
        </section>
    </div>

    <script>
        const modal = document.getElementById('auth-modal');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const tabs = document.querySelectorAll('[data-auth-tab]');

        function switchTab(selected) {
            const showRegister = selected === 'register';

            loginForm.hidden = showRegister;
            registerForm.hidden = !showRegister;

            tabs.forEach((tab) => {
                tab.classList.toggle('active', tab.dataset.authTab === selected);
            });
        }

        document.querySelectorAll('[data-open-auth]').forEach((button) => {
            button.addEventListener('click', () => {
                modal.hidden = false;
                switchTab(button.dataset.openAuth);
            });
        });

        tabs.forEach((tab) => {
            tab.addEventListener('click', () => switchTab(tab.dataset.authTab));
        });

        document.querySelector('[data-close-auth]').addEventListener('click', () => {
            modal.hidden = true;
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) modal.hidden = true;
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') modal.hidden = true;
        });
    </script>
</body>
</html>