<nav id="navbar1" class="navbar navbar-expand-lg navbar-dark mb-2" style="background-color:  rgba(47, 57, 79, 0.918); ">
    <div class="container-fluid">

        <a class="navbar-brand " style="font-family: fantasy;" href="#home"></a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mx-auto nav-underline ">

                <li class="nav-item mx-4 ">
                    <a class="nav-link  {{ Request::is('home') ? 'active' : '' }} " href="{{ url('/home') }}"> <i
                            class="hover-yellow fa-solid fa-home"></i> Home </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link  {{ Request::is('/profile') ? 'active' : '' }} " href="{{ url('/profile') }}"
                        href="#about"><i
                        class="hover-yellow fa-solid fa-user"></i> Profile</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link position-relative {{ Request::is('/profile') ? 'active' : '' }} " href="{{ url('/profile') }}"
                        href="#about"><i
                        class="hover-yellow fa-solid fa-bell"></i> Notif <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">+99 <span class="visually-hidden">unread messages</span></span></a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link  {{ Request::is('/profile') ? 'active' : '' }} " href="{{ url('/profile') }}"
                        href="#about"><i
                        class="hover-yellow fa-solid fa-address-book"></i> Users</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link " href="#contact">Contact</a>
                </li>
                <li class="nav-item mx-4">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="nav-link d-flex align-items-center gap-2 text-danger" type="submit"
                            href="#">
                            Log out
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</nav>
