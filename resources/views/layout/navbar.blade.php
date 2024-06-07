<a class="sidebar-toggle">
    <i class="hamburger align-self-center"></i>
</a>

@if(auth()->guard('admin')->check())

<div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
            </a>
            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('/') }}assets/appstack.bootlab.io/img/avatars/SMKSLF.jpg" class="avatar img-fluid rounded-circle me-1"  alt="Chris Wood" /> <span class="text-dark">Saya</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" href="{{ route('login') }}">Log out</button>
                </form>
            </div>
        </li>
    </ul>
</div>
@elseif (auth()->guard('siswa')->check())

<div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">
        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
            </a>
            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="{{ asset('img/'.auth()->guard('siswa')->user()->foto) }}" class="avatar img-fluid rounded-circle me-1" /> <span class="text-dark">{{ auth()->guard('siswa')->user()->nama }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <form action="{{ route('logoutsiswa') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" href="{{ route('loginsiswa') }}">Log out</button>
                </form>
            </div>
        </li>
    </ul>
</div>

@endif
