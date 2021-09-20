@include('header')
<section class="register-wrapper">
    <div class="container">
        <h1 class="register-h1">ようこそ、OMOIDE CHATの世界へ。</h1>
        <p class="register-paragraph-1">チルアウトを忘れずに。</p>
        <div class="inner">
            <form class="register-form" method="POST" action="{{route('store')}}">
                @csrf
                <p>メールアドレス</p>
                <input type="email" class="register-input" name="email">
                <p>名前（アルファベットのみ）</p>
                <input type="text" class="register-input" name="name">
                <p>パスワード</p>
                <input type="password" class="register-input" name="password">
                <p>プロフィール（簡単にどうぞ）</p>
                <textarea class="register-textarea" name="profile"></textarea>
                <input type="submit" class="input-submit" value="新規会員登録">
            </form>
        </div>
    </div>
</section>