@include('header')
<section class="register-wrapper">
    <div class="container">
        <h1 class="register-h1">ようこそ、OMOIDE CHATの世界へ。</h1>
        <p class="register-paragraph-1">チルアウトを忘れずに。</p>
        <div class="inner">
            <form class="register-form" method="POST" action="{{route('store')}}">
                @csrf
                @if(session('error_msg'))
                <div class="sign-error">
                    {{session('error_msg')}}
                </div>
                @endif
                <p>メールアドレス</p>
                @if ($errors->has('email'))
                <div class="sign-error">
                    {{ $errors->first('email') }}
                </div>
                @endif
                <input type="email" class="register-input" name="email">
                <p>名前（アルファベットのみ）</p>
                @if ($errors->has('name'))
                <div class="sign-error">
                    {{ $errors->first('name') }}
                </div>
                @endif
                <input type="text" pattern="^[0-9A-Za-z]+$" class="register-input" name="name">
                <p>パスワード</p>
                @if ($errors->has('password'))
                <div class="sign-error">
                    {{ $errors->first('password') }}
                </div>
                @endif
                <input type="password" class="register-input" name="password">
                <p>プロフィール（簡単にどうぞ）</p>
                @if ($errors->has('profile'))
                <div class="sign-error">
                    {{ $errors->first('profile') }}
                </div>
                @endif
                <textarea class="register-textarea" name="profile"></textarea>
                <input type="submit" class="input-submit" value="新規会員登録">
            </form>
        </div>
    </div>
</section>