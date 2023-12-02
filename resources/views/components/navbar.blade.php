<nav id="navbar1" class="mb-2 " style="background-color:  rgba(47, 57, 79, 0.918); ">



    <div class="container-fluid ">
        <div class="row ">
            <div class="col-12 col-lg-3 ">
                <a class="navbar-brand " style="font-family: fantasy;" href="#home"><img
                        src="{{ asset('img/loogo_harimau.png') }}" alt="img" width="40px" height="40px"
                        class="rounded-circle mx-2 my-2 "></a>

            </div>

            <div class="col-12 col-lg-6 my-auto">

                <div class="row my-2">
                    <div class="col text-center">
                        <a class="nav-link  rounded-pill nav-i {{ Request::is('home') ? 'bg-custom' : '' }} "
                            href="{{ url('/home') }}">
                            <i class="fa-solid fa-home  nav-icon my-2"></i></a>
                    </div>

                    <div class="col text-center ">
                        <a class="nav-link   rounded-pill nav-i {{ Request::is('profile') ? 'bg-custom' : '' }} "
                            href="/profile"><i class=" fa-solid fa-user  nav-icon my-2"></i></a>
                    </div>
                    <div class="col text-center">
                        <a class="nav-link  rounded-pill nav-i {{ Request::is('#') ? 'bg-custom' : '' }} "
                            href="{{ url('#') }}" href="#about"><i
                                class=" fa-solid fa-address-book  nav-icon my-2"></i></a>

                    </div>
                    <div class="col text-center">
                        <a class="nav-link  rounded-pill nav-i {{ Request::is('#') ? 'bg-custom' : '' }} "
                            href="{{ url('#') }}" href="#about"><i
                                class=" fa-solid fa-users-rectangle  nav-icon my-2 "></i></a>

                    </div>
                    <div class="col text-center ">
                        <a class="nav-link  position-relative nav-i rounded-pill {{ Request::is('#') ? 'bg-custom' : '' }} "
                            href="{{ url('#') }}" href="#about"><i
                                class="fa-solid fa-bell  nav-icon my-2"></i><span
                                class="position-absolute top-50 start-80 translate-middle p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="col-12 col-lg-3 my-auto">
                <form class="form-inline" method="POST" action="{{ route('home.store') }}">
                    @csrf
                    <div class="input-group w-100 my-2">
                        <input type="text" name="posts" id="post" placeholder="cari"
                            class="form-control form-control-md rounded-pill rounded-end position-relative border border-dark border-end-0 shadow-sm">
                        <button type="submit"
                            class="btn   top-50 end-0 rounded-pill rounded-start border-dark border border-start-0 "
                            style="background-color:white">
                            <i class="hover-blue fa-solid fas fa-search"></i>
                        </button>
                        <div class="input-group-append">
                        </div>
                    </div>
                </form>
            </div>

        </div>












        {{-- <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav mx-auto  nav-underline ">

                <li class="nav-item mx-4 ">
                    <a class="nav-link  {{ Request::is('home') ? 'active' : '' }} " href="{{ url('/home') }}"> <i
                            class="hover-yellow fa-solid fa-home"></i> Home </a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link  {{ Request::is('profile') ? 'active' : '' }} " href="/profile"
                        ><i class="hover-yellow fa-solid fa-user"></i> Profile</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link position-relative {{ Request::is('/profile') ? 'active' : '' }} "
                        href="{{ url('/profile') }}" href="#about"><i class="hover-yellow fa-solid fa-bell"></i> Notif
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">+99
                            <span class="visually-hidden">unread messages</span></span></a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link  {{ Request::is('/profile') ? 'active' : '' }} " href="{{ url('/profile') }}"
                        href="#about"><i class="hover-yellow fa-solid fa-address-book"></i> Users</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link  {{ Request::is('/profile') ? 'active' : '' }} " href="{{ url('/profile') }}"
                        href="#about"><i class="hover-yellow fa-solid fa-users-rectangle"></i> Grup</a>
                </li>

                <div class=" bg-transparent border-0 ">
                    <div class="card-header bg-transparent">
                        <form class="form-inline" method="POST" action="{{ route('home.store') }}">
                            @csrf
                            <div class="input-group w-100 ">
                                <input type="text" name="posts" id="post" placeholder="cari"
                                    class="form-control form-control-md rounded-pill rounded-end position-relative border border-dark border-end-0 shadow-sm">
                                <button type="submit"
                                    class="btn   top-50 end-0 rounded-pill rounded-start border-dark border border-start-0 "
                                    style="background-color:white">
                                    <i class="hover-blue fa-solid fas fa-search"></i>
                                </button>
                                <div class="input-group-append">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </ul>


        </div>


 --}}

    </div>


</nav>
