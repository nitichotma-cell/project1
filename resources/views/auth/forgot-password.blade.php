{{-- filepath: c:\laragon\www\passakorn1\resources\views\index.blade.php --}}
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ร้านค้าของเรา</title>

    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; color: #222; }
        header { padding: 18px 7%; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; }
        .logo { color: #1683d8; font-size: 24px; font-weight: bold; text-decoration: none; }
        button, .button { border: 0; border-radius: 6px; padding: 10px 16px; cursor: pointer; font-size: 15px; }
        .button-primary { background: #1683d8; color: white; }
        .button-light { background: #eef6fc; color: #1683d8; }
        .hero { padding: 85px 20px; text-align: center; color: white; background: linear-gradient(#0007, #0007), url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&w=1800&q=85') center/cover; }
        .hero h1 { font-size: 42px; margin: 0 0 12px; }
        .products { max-width: 1100px; margin: auto; padding: 45px 20px; }
        .products h2 { text-align: center; margin-bottom: 28px; }
        .product-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 22px; }
        .product { border: 1px solid #eee; border-radius: 10px; overflow: hidden; }
        .product img { width: 100%; height: 220px; object-fit: cover; display: block; }
        .product-info { padding: 16px; }
        .product-info h3 { margin: 0 0 8px; }
        .price { color: #1683d8; font-weight: bold; }
        footer { padding: 22px; text-align: center; background: #f5f7fa; color: #666; }

        #auth-modal[hidden] { display: none; }
        #auth-modal { position: fixed; inset: 0; z-index: 5; display: grid; place-items: center; padding: 16px; background: #0009; }
        .auth-card { width: min(100%, 460px); padding: 28px; border-radius: 12px; background: white; }
        .auth-top { display: flex; justify-content: space-between; align-items: center; }
        .close-button { background: transparent; font-size: 24px; padding: 0 8px; }
        .tabs { display: flex; margin: 15px 0 22px; border-bottom: 1px solid #ddd; }
        .tab { flex: 1; padding: 12px; color: #666; background: white; border-radius: 0; }
        .tab.active { color: #1683d8; border-bottom: 2px solid #1683d8; }
        .auth-form[hidden] { display: none; }
        .auth-form label { display: block; margin: 13px 0 6px; }
        .auth-form input { width: 100%; padding: 11px; border: 1px solid #ccd3dc; border-radius: 6px; }
        .auth-form .button { width: 100%; margin-top: 18px; }
        .forgot-link { display: block; margin-top: 10px; text-align: right; color: #1683d8; text-decoration: none; }
        .forgot-link:hover { text-decoration: underline; }
        .error { color: #c62828; margin: 8px 0; }

        @media (max-width: 700px) {
            header { padding: 15px; }
            .hero h1 { font-size: 32px; }
            .product-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header>
        <a class="logo" href="{{ route('index') }}">ร้านค้าของเรา</a>

        <div>
            @auth
                <span>สวัสดี, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button class="button-light" type="submit">ออกจากระบบ</button>
                </form>
            @else
                <button class="button-light" type="button" data-open-auth="login">เข้าสู่ระบบ</button>
                <button class="button button-primary" type="button" data-open-auth="register">สมัครสมาชิก</button>
            @endauth
        </div>
    </header>

    <main>
        <section class="hero">
            <h1>เลือกซื้อสินค้าคุณภาพ</h1>
            <p>สินค้าดี ราคาคุ้มค่า พร้อมบริการที่ใส่ใจ</p>
            <a class="button button-primary" href="#products">เลือกชมสินค้า</a>
        </section>

        <section class="products" id="products">
            <h2>สินค้าแนะนำ</h2>
            <div class="product-grid">
                <article class="product">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80" alt="นาฬิกาข้อมือ">
                    <div class="product-info">
                        <h3>นาฬิกาข้อมือ</h3>
                        <p>ดีไซน์เรียบง่าย เหมาะกับทุกโอกาส</p>
                        <span class="price">฿1,290</span>
                    </div>
                </article>

                <article class="product">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80" alt="หูฟัง">
                    <div class="product-info">
                        <h3>หูฟังคุณภาพดี</h3>
                        <p>ฟังเพลงชัด ใส่สบาย ใช้งานสะดวก</p>
                        <span class="price">฿890</span>
                    </div>
                </article>

                <article class="product">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=800&q=80" alt="รองเท้าผ้าใบ">
                    <div class="product-info">
                        <h3>รองเท้าผ้าใบ</h3>
                        <p>น้ำหนักเบา ใส่สบายในทุกวัน</p>
                        <span class="price">฿1,590</span>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer>© {{ date('Y') }} ร้านค้าของเรา</footer>

    <div id="auth-modal" @if (!$errors->any()) hidden @endif>
        <section class="auth-card" role="dialog" aria-modal="true" aria-label="บัญชีผู้ใช้">
            <div class="auth-top">
                <strong>บัญชีผู้ใช้</strong>
                <button class="close-button" type="button" data-close-auth aria-label="ปิด">×</button>
            </div>

            @if ($errors->any())
                <p class="error">{{ $errors->first() }}</p>
            @endif

            <div class="tabs">
                <button class="tab {{ old('_auth_form') !== 'register' ? 'active' : '' }}" type="button" data-auth-tab="login">เข้าสู่ระบบ</button>
                <button class="tab {{ old('_auth_form') === 'register' ? 'active' : '' }}" type="button" data-auth-tab="register">สมัครสมาชิก</button>
            </div>

            <form class="auth-form" id="login-form" method="POST" action="{{ route('login') }}" @if (old('_auth_form') === 'register') hidden @endif>
                @csrf
                <input type="hidden" name="_auth_form" value="login">

                <label for="login-email">อีเมล</label>
                <input id="login-email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>

                <label for="login-password">รหัสผ่าน</label>
                <input id="login-password" type="password" name="password" autocomplete="current-password" required>

                @if (Route::has('password.request'))
                    <a class="forgot-link" href="{{ route('password.request') }}">ลืมรหัสผ่าน?</a>
                @endif

                <label><input type="checkbox" name="remember" value="1"> จดจำฉัน</label>
                <button class="button button-primary" type="submit">เข้าสู่ระบบ</button>
            </form>

            <form class="auth-form" id="register-form" method="POST" action="{{ route('register') }}" @if (old('_auth_form') !== 'register') hidden @endif>
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

                <button class="button button-primary" type="submit">สมัครสมาชิก</button>
            </form>
        </section>
    </div>

    <script>
        const modal = document.getElementById('auth-modal');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const tabs = document.querySelectorAll('[data-auth-tab]');

        document.querySelectorAll('[data-open-auth]').forEach((button) => {
            button.addEventListener('click', () => {
                modal.hidden = false;
                switchTab(button.dataset.openAuth);
            });
        });

        document.querySelector('[data-close-auth]').addEventListener('click', () => {
            modal.hidden = true;
        });

        modal.addEventListener('click', (event) => {
            if (event.target === modal) modal.hidden = true;
        });

        tabs.forEach((tab) => {
            tab.addEventListener('click', () => switchTab(tab.dataset.authTab));
        });

        function switchTab(selected) {
            const showRegister = selected === 'register';
            loginForm.hidden = showRegister;
            registerForm.hidden = !showRegister;

            tabs.forEach((tab) => {
                tab.classList.toggle('active', tab.dataset.authTab === selected);
            });
        }
    </script>
</body>
</html>