<div class="col-12 col-lg-3">

    <div class="left-column">


        <div class="card card-left1 mb-4">

            <!---------tombol menu (hapus,edit,report)----------->
            <button class="btn position-absolute top-0 end-0 border-0 hover-yellow" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $post->id }}" aria-expanded="false"
                aria-controls="collapseExample{{ $post->id }}">

                <i class=" fa-solid fa-gear"></i>
            </button>

            <div class="collapse collapse-horizontal position-absolute top-0 end-0 mx-4"
                id="collapseExample{{ $post->id }}">
                <div class="row  mx-2 mt-1 border-0">

                    <div class="col">
                        <form action="/logout" method="post">
                            @csrf


                            <button class="btn btn-sm hover-red fa-solid fa-headset bg-transparent border-0 dark"
                                data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Log out" type="submit"></button>
                        </form>
                    </div>

                </div>
            </div>
            <!---------End tombol menu (hapus,edit,report)----------->

            <img src="{{ asset('img/city_n.jpg') }}" alt="" class="card-img-top img-fluid">
            <div class="card-body text-center ">
                <img src="{{ asset('img/avatar-dhg.png') }}" alt="img" width="100px" height="100px"
                    class="rounded-circle mt-n5">

                <h6 class="card-title fw-light">{{ auth()->user()->name }}</h6>

                <p class="card-text text-justify mb-2">belajar pemrograman , fullstack web developer.
                </p>
                <ul class="list-unstyled nav justify-content-center">
                    <a href="#" class="text-dark text-decoration-none">
                        <li class="nav-item">Friends <br> <strong>12M</strong></li>
                    </a>
                    <a href="#" class="text-dark text-decoration-none">
                        <li class="nav-item">Enimes <br> <strong>1</strong></li>
                    </a>
                </ul>

            </div>
        </div>

        <div class="card shadow-sm card-left2 mb-4">

            <div class="card-body">

                <h5 class="mb-3 card-title">About <small><a href="#" class="ml-1">Edit</a></small></h5>

                <p class="card-text"> <i class="fas fa-calendar-week mr-2"></i> Went to <a href="#"
                        class="text-decoration-none">oh canada</a></p>

                <p class="card-text"> <i class="fas fa-user-friends mr-2"></i> Become a friend with <a href="#"
                        class="text-decoration-none">obama</a></p>
                <p class="card-text"> <i class="far fa-building mr-2"></i> Work at <a href="#"
                        class="text-decoration-none">Github</a></p>
                <p class="card-text"> <i class="fas fa-home mr-2"></i> Live in <a href="#"
                        class="text-decoration-none">San francisco</a></p>
                <p class="card-text"> <i class="fas fa-map-marker mr-2"></i> From <a href="#"
                        class="text-decoration-none">Seattle, WA</a></p>

            </div>

        </div>

        <div class="card shadow-sm card-left3 mb-4">

            <div class="card-body">
                <h5 class="card-title">Photos<small class="ml-2"><a href="#">.Edit
                        </a></small>
                </h5>

                <div class="row">
                    <div class="col-6 p-1">
                        <a href="img/left1.jpg" data-lightbox="id"><img src="img/left1.jpg" alt="img"
                                class="img-fluid my-2"></a>
                        <a href="img/left2.jpg" data-lightbox="id"><img src="img/left2.jpg" alt="img"
                                class="img-fluid my-2"></a>
                        <a href="img/left3.jpg" data-lightbox="id"><img src="img/left3.jpg" alt="img"
                                class="img-fluid my-2"></a>

                    </div>


                    <div class="col-6 p-1">
                        <a href="img/left4.jpg" data-lightbox="id"><img src="img/left4.jpg" alt="img"
                                class="img-fluid my-2"></a>
                        <a href="img/left5.jpg" data-lightbox="id"><img src="img/left5.jpg" alt="img"
                                class="img-fluid my-2"></a>
                        <a href="img/left6.jpg" data-lightbox="id"><img src="img/left6.jpg" alt="img"
                                class="img-fluid my-2"></a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
