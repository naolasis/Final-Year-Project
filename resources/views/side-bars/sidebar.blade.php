<aside class="side-bar">
    <section class="side-bar-head">
        <div class="logo"><img class="logo" src="{{asset('assets/images/logo.png')}}" alt="Ambo University Logo"></div>
        <div class="user-info">
            <div class="user-photo"><img class="user-photo" src="{{asset('storage/'.auth()->user()->image)}}" alt="User Photo"></div>
            <div class="user-status">
                <h5 class="user-name">{{ auth()->user()->username }}</h5>
                <h6 class="user-type">Logged In As <span>{{ ucfirst(auth()->user()->role) }}</span></h6>
            </div>
        </div>
    </section>
    @yield('side-bar-content')
</aside>