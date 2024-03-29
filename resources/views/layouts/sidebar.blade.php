<aside class="side-bar">
    <section class="side-bar-head">
        <div class="logo"><img src="{{asset('assets/images/logo.png')}}" alt="Ambo University Logo"></div>
        <div class="user-info">
            <div class="user-photo"></div>
            <div class="user-status">
                <h5 class="user-name">Administrator</h5>
                <h6 class="user-type">Logged In As <span>Admin</span></h6>
            </div>
        </div>
    </section>
    @yield('side-bar-content')
</aside>