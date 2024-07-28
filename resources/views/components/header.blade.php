<header class="row py-1">
    <a class="col-12 col-md-6 d-flex align-items-center logo-container text-decoration-none text-dark" href="/dashboard">
        <img src="{{ asset('no-background-logo.png') }}" alt="Bank Logo">
        <span>MARIAMMAN INDIAN BANK</span>
    </a>
    <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-flex-end align-items-center">
        <ul class="list-inline mb-sm-0">
            @guest
            <li class="list-inline-item"><a class="text-decoration-none text-muted h6" href="{{ url('login') }}">Netbanking</a></li>
            @endguest
            <li class="list-inline-item"><a class="text-decoration-none text-muted h6" href="{{ url('contactus') }}">Contact Us</a></li>
            @auth
            <li class="list-inline-item">
                <a class="text-decoration-none text-muted h6" href="{{ url('logout') }}">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endauth
        </ul>
    </div>
</header>