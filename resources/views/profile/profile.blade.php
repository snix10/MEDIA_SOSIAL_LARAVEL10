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

<body>
    @include('components.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="middle-column">
                <div class="card col-12 col-lg-8 mx-auto text-center rounded-md shadow" style="border-radius:">
                    @mobile
                        <div class="card rounded"><img src="{{ asset('img/city_n.jpg') }}" alt=""
                                class="card-img-top " width="auto" height="150px">
                            <img src="{{ asset('img/loogo_harimau.png') }}" alt="img" width="100px" height="100px"
                                class="rounded-circle mt-n5 position-absolute top-100 start-50 translate-middle">

                        </div>
                    @elsemobile
                        <div class="card rounded"><img src="{{ asset('img/city_n.jpg') }}" alt=""
                                class="card-img-top " width="auto" height="300px">
                            <img src="{{ asset('img/loogo_harimau.png') }}" alt="img" width="100px" height="100px"
                                class="rounded-circle mt-n5 position-absolute top-100 start-50 translate-middle">

                        </div>
                    @endmobile




                    <h3 class=" my-5 mx-auto">{{ auth()->user()->name }}</h3>

                </div>



            </div>
        </div>
    </div>

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
