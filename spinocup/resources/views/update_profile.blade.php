@include('header')
<section class="register-wrapper">
    <div class="container">
        <h1 class="register-h1">プロフィール編集画面です。</h1>
        <p class="register-paragraph-1">チルアウトを忘れずに。</p>
        <div class="inner">
            <form class="register-form" method="POST" action="{{route('update')}}">
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
                <input type="email" class="register-input" name="email" value="{{$profile->email}}">
                <p>名前（アルファベットのみ）</p>
                @if ($errors->has('name'))
                <div class="sign-error">
                    {{ $errors->first('name') }}
                </div>
                @endif
                <input type="text" pattern="^[0-9A-Za-z]+$" class="register-input" name="name" value="{{$profile->name}}">
                <p>プロフィール（簡単にどうぞ）</p>
                @if ($errors->has('profile'))
                <div class="sign-error">
                    {{ $errors->first('profile') }}
                </div>
                @endif
                <textarea class="register-textarea" name="profile" value="{{$profile->profile}}">{{$profile->profile}}</textarea>
                <input type="hidden" name="id" value="{{$profile->id}}">
                <input type="submit" class="input-submit" value="更新する">
            </form>
        </div>
    </div>
</section>