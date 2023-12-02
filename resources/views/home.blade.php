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
    <link rel="stylesheet" href="{{ asset('lightbox.min.css') }}">
    <script type="text/javascript" src="{{ asset('lightbox-plus-jquery.min.js') }}"></script>
    <!------------------LIght BOx for Gallery-------------->
    <title>App sosial media</title>
</head>

<body class="fw-light ">


    <!-------------------------------NAVIGASI ATAU NAVBAR------------------>

    @include('components.navbar')

    <!---------------------------END NAVIGASI ATAU NAVBAR------------------>

    <!-- MODAL LOGOUT-->
    <div class="modal fade" id="staticBackdropLogout" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">MEDIA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    log out
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Log
                            Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--END MODAL LOGOUT-->


    <!-------------------------------------------CONTAINER ATAU GRID--------------------------------->


    <div class="container-fluid">
        <div class="row">


            <!--------------------------COLUMN START ATAU COLOMN PERTAMA (PROFILE, ABOUT, IMAGE, PHOTOS) -------------->

            @include('media.columstart')

            <!---------------------END COLUMN START ATAU COLOMN PERTAMA (PROFILE, ABOUT, IMAGE, PHOTOS) -------------->


            <!-------------------------------------COLUMN MIDDLE ATAU COLUMN TENGAH (POST , FORM POST, ALERT)---------------->
            <div class="col-12 col-lg-6">

                <div class="middle-column">

                    @yield('formposts')

                    @include('components.alert')


                    <!--------------------POST, EDIT POST, SHOW POST AND COMMENT, EDIT,COMMENT---------------------->
                    @yield('posts')

                    @yield('edit')

                    @yield('show')

                    @yield('editComment')
                    <!-------------    END POST, EDIT POST, SHOW POST AND COMMENT, EDIT,COMMENT---------------------->


                </div>
            </div>

            <!--------------------------------END COLUMN MIDDLE ATAU COLUMN TENGAH (POST , FORM POST, ALERT)---------------->


            <!---------------------------COLUMN END ATAU COLUMN TERAKHIR ----------------->

            @include('media.columend')

            <!---------------------END COLUMN END ATAU COLUMN TERAKHIR ----------------->

        </div>
    </div>

    <!---------------------------------------END CONTAINER ATAU GRID--------------------------------->


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
