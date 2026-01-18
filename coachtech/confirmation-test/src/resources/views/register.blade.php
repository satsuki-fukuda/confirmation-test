<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">FashionablyLate</a>
            <nav>
                <a href="/login" class="login-btn">login</a>
            </nav>
        </div>
    </header>

    <main>
        <h2 class="register__title">Register</h2>
            <div class="register__container">
                <form class="register-form" action="/register" method="post">
                @csrf
                    <div class="form-group">
                        <label for="name">お名前</label>
                        <input type="text" id="name" name="name" placeholder="例）山田 太郎" value="{{ old('name') }}">
                            <div class="form__error">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" id="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}">
                            <div class="form__error">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="password">パスワード</label>
                        <input type="password" id="password" name="password" placeholder="例）coachtech06">
                            <div class="form__error">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                    </div>

                    <button type="submit" class="register-btn">登録</button>
                </form>
            </div>
        </main>
</body>
</html>
