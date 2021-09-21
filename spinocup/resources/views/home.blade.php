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
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="logout-btn">ログアウト</button>
            </form>
        </div>
    </div>
</section>