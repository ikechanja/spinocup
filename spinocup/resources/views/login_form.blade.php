@include ('header')
<section class="login-wrapper">
    <div class="container">
        <div class="inner">
            <h1 class="login-h1">お帰りなさい。さぁ、OMOIDEを話そう</h1>
            <p class="login-paragraph-1">チルアウトを忘れずに。</p>
            <form class="login-form" method="POST" action="{{route('login')}}">
                @csrf
                <p>メールアドレス</p>
                @if ($errors->has('notMatch'))
                <div class="sign-error">
                    {{ $errors->first('notMatch') }}
                </div>
                @endif
                @if ($errors->has('email'))
                <div class="sign-error">
                    {{ $errors->first('email') }}
                </div>
                @endif
                <input class="login-input" type="email" name="email">
                <p>パスワード</p>
                @if ($errors->has('password'))
                <div class="sign-error">
                    {{ $errors->first('password') }}
                </div>
                @endif
                <input class="login-input" type="password" name="password">
                <input class="login-submit" type="submit" value="ログイン">
            </form>
        </div>
    </div>
</section>