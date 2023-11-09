<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <!------------------LIght BOx for Gallery-------------->
    <link rel="stylesheet" href="lightbox.min.css">
    <script type="text/javascript" src="{{ asset('lightbox-plus-jquery.min.js') }}"></script>
    <!------------------LIght BOx for Gallery-------------->
    <title>Application-1</title>
</head>

<body class="fw-light">


    <!-------------------------------NAvigation Starts------------------>

    @include('components.navbar')

    <!---------------------------------------------Ends navigation------------------------------>



    <!-------------------------------------------Start Grids layout for lg-xl-3 columns and (xs-lg 1 columns)--------------------------------->


    <div class="container">
        <div class="row">


            <!--------------------------left columns  start -- profile,about,photos -------------->

            @include('media.columstart')

            <!--------------------------Ends Left columns-->

            <!---------------------------------------Middle columns  start---------------->

            <div class="col-12 col-lg-6">


                <div class="middle-column">
                    @if (request('home'))
                    @else
                        <input type="hidden" name="category" value="{{ request('category') }}">

                        <div class="card">



                            <div class="card-header bg-transparent">
                                <form class="form-inline" method="POST" action="{{ route('home.store') }}">
                                    @csrf


                                    <div class="input-group w-100">
                                        <input type="text" name="posts" id="post" placeholder="Post"
                                            class="form-control form-control-md rounded">

                                        <div class="input-group-append">

                                            <button type="submit" class="btn ">
                                                <i class="hover-blue fa-solid fa-paper-plane"></i>
                                            </button>

                                            <button class="btn   top-0 end-0 border-0 " type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseExamplePost"
                                                aria-expanded="false" aria-controls="collapseExamplePost"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="kirim">

                                                <i class=" fa-solid fa-folder"></i>
                                            </button>


                                        </div>



                                    </div>
                                    <div class="collapse" id="collapseExamplePost">
                                        <div class="card card-body bottom-0 end-0">

                                            <a class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="hapus"> <i class="hover-red fa-solid fa-trash"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                </i></a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    @endif

                    {{-- alert atau pemeberitahuan atau notif // bahwa login kita sudah berhasil --}}
                    @if (session()->has('loginberhasil'))
                        <div class="card-body mt-2 ">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>{{ session('loginberhasil') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    {{-- alert atau pemeberitahuan atau notif yang kedua // bahwa login kita sudah berhasil --}}
                    @if (session()->has('loginberhasil'))
                        <div class="card-body mt-2  ">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <small>ini web seperti forum , mengajukan pertanyaan atau permasalahan apapun , dan
                                    orang akan memberi
                                    comentar</small>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    {{-- alert atau pemeberitahuan atau notif // bahwa post kita sudah berhasil --}}
                    @if (session('berhasil'))
                        <div class="card-body mt-2  ">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <small>{{ session('berhasil') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    {{-- alert atau pemeberitahuan atau notif Hapus // bahwa post kita sudah berhasil di Hapus --}}
                    @if (session('hapus'))
                        <div class="card-body mt-2  ">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <small>{{ session('hapus') }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif



                    <!--------------------content post--colum middle---------------------->
                    @yield('posts')

                    @yield('edit')

                    @yield('show')
                    <!--------------------End content post---------------------->


                </div>

            </div>



            <!------------------------Middle column Ends---------------->

            <!---------------------------Statrs Right Columns----------------->

            @include('media.columend')



            <!------------------------Light BOx OPtions------------->
            <script>
                lightbox.option({

                })
            </script>




            <!------------------------Light BOx OPtions------------->

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>



</body>

</html>
