<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pigry</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    @livewireStyles
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
                    Pigry
                </a>
                <nav>
                    <ul class="header-nav">
                        @if (Auth::check())
                            <li class="header-nav__item">
                                <a class="header-nav__link" href="/weight_logs/goal_setting">目標体重設定</a>
                            </li>
                            <li class="header-nav__item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button class="header-nav__button">ログアウト</button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    @livewireScripts
</body>

</html>
