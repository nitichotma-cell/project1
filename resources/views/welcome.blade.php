{{-- filepath: c:\laragon\www\passakorn1\resources\views\welcome.blade.php --}}
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ / สมัครสมาชิก</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #222;
        }

        .account-hero {
            min-height: 600px;
            padding: 24px 16px;
            display: grid;
            place-items: center;
            background:
                linear-gradient(rgba(15, 23, 42, .48), rgba(15, 23, 42, .48)),
                url('https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=2000&q=85')
                center / cover no-repeat;
        }

        .account-card {
            width: min(100%, 525px);
            padding: 36px 38px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 45px rgba(0, 0, 0, .25);
        }

        .account-tabs {
            display: flex;
            margin-bottom: 26px;
            border-bottom: 1px solid #dfe3e8;
        }

        .account-tab {
            flex: 1;
            padding: 14px 8px;
            border: 0;
            border-bottom: 2px solid transparent;
            background: transparent;
            color: #687386;
            font-size: 16px;
            cursor: pointer;
        }

        .account-tab.active {
            color: #1683d8;
            border-bottom-color: #1683d8;
        }

        .account-form[hidden] {
            display: none;
        }

        .account-form h1 {
            margin: 0 0 24px;
            font-size: 28px;
        }

        .account-form label {
            display: block;
            margin: 14px 0 8px;
            font-weight: 600;
        }

        .account-form input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #cfd6df;
            border-radius: 8px;
            font-size: 16px;
        }

        .account-form input:focus {
            outline: 2px solid rgba(22, 131, 216, .2);
            border-color: #1683d8;
        }

        .account-submit {
            width: 100%;
            margin-top: 24px;
            padding: 14px;
            border: 0;
            border-radius: 8px;
            background: #1683d8;
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
        }

        .account-submit:hover {
            background: #116db6;
        }

        .shop-info {
            max-width: 1140px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        .shop-info h2 {
            margin: 0 0 30px;
            text-align: center;
        }

        .shop-info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .shop-info-item {
            padding: 24px;
            border-radius: 8px;
            background: #f5f7fa;
        }

        .shop-info-item h3 {
            margin-top: 0;
        }

        @media (max-width: 600px) {
            .account-hero {
                min-height: 560px;
            }

            .account-card {
                padding: 28px 22px;
            }

            .shop-info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <main>
        <section class="account-hero">
            <div class="account-card">
                <div class="account-tabs" role="tablist" aria-label="บัญชีผู้ใช้">
                    <button
                        class="account-tab active"
                        type="button"
                        role="tab"
                        aria-selected="true"
                        data-auth-tab="login">
                        เข้าสู่ระบบ
                    </button>
                    <button
                        class="account-tab"
                        type="button"
                        role="tab"
                        aria-selected="false"
                        data-auth-tab="register">
                        สมัครสมาชิก
                    </button>
                </div>

                <form class="account-form" id="login-form" method="POST" action="{{ url('/login') }}">
                    @csrf
                    <h1>เข้าสู่ระบบ</h1>

                    <label for="login-email">อีเมล</label>
                    <input
                        id="login-email"
                        type="email"
                        name="email"
                        autocomplete="email"
                        required>

                    <label for="login-password">รหัสผ่าน</label>
                    <input
                        id="login-password"
                        type="password"
                        name="password"
                        autocomplete="current-password"
                        required>

                    <button class="account-submit" type="submit">เข้าสู่ระบบ</button>
                </form>

                <form class="account-form" id="register-form" method="POST" action="{{ url('/register') }}" hidden>
                    @csrf
                    <h1>สมัครสมาชิก</h1>

                    <label for="register-name">ชื่อ</label>
                    <input
                        id="register-name"
                        type="text"
                        name="name"
                        autocomplete="name"
                        required>

                    <label for="register-email">อีเมล</label>
                    <input
                        id="register-email"
                        type="email"
                        name="email"
                        autocomplete="email"
                        required>

                    <label for="register-password">รหัสผ่าน</label>
                    <input
                        id="register-password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        required>

                    <label for="register-password-confirmation">ยืนยันรหัสผ่าน</label>
                    <input
                        id="register-password-confirmation"
                        type="password"
                        name="password_confirmation"
                        autocomplete="new-password"
                        required>

                    <button class="account-submit" type="submit">สมัครสมาชิก</button>
                </form>
            </div>
        </section>

        <section class="shop-info">
            <h2>ช้อปกับเรา</h2>
            <div class="shop-info-grid">
                <div class="shop-info-item">
                    <h3>สินค้าหลากหลาย</h3>
                    <p>เลือกชมสินค้าได้สะดวก พร้อมข้อมูลสินค้าเพื่อช่วยตัดสินใจ</p>
                </div>
                <div class="shop-info-item">
                    <h3>สั่งซื้อสะดวก</h3>
                    <p>สมัครสมาชิกเพื่อจัดการบัญชีและติดตามรายการสั่งซื้อได้ง่าย</p>
                </div>
                <div class="shop-info-item">
                    <h3>บริการใส่ใจ</h3>
                    <p>เราพร้อมช่วยเหลือและดูแลคุณตลอดการเลือกซื้อสินค้า</p>
                </div>
            </div>
        </section>
    </main>

    <script>
        const authTabs = document.querySelectorAll('[data-auth-tab]');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');

        authTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                const showRegister = tab.dataset.authTab === 'register';

                authTabs.forEach(function (button) {
                    const isActive = button === tab;
                    button.classList.toggle('active', isActive);
                    button.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });

                loginForm.hidden = showRegister;
                registerForm.hidden = !showRegister;
            });
        });
    </script>
</body>
</html>