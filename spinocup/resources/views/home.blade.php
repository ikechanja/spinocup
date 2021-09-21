@include('header')
<section class="home-wrapper">
    <div class="container">
        <div class="inner">
            @if(session('login_success'))
            <div class="alert-login_success">
                {{session('login_success')}}
            </div>
            @endif
            <p>お帰りなさい！{{Auth::user()->name}}</p>
            <h1>ようこそ、OMODE CHATの世界へ</h1>
            <a class="select-room-link" href="#">部屋を選びに行く</a>
            <a class="change-profile-link" href="#">プロフィールを編集</a>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="logout-btn">ログアウト</button>
            </form>
        </div>
    </div>
</section>