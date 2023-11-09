@extends('home')

@section('show')
    {{-- alert atau pemeberitahuan atau notif // bahwa komentar kita sudah berhasil --}}
    @if (session('comment'))
        <div class="card-body mt-2  ">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <small>{{ session('comment') }}</small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="card my-3">
        <div class="card-header">
            komentar
            <a href="/home" class="btn position-absolute top-0 end-0 " data-bs-toggle="tooltip" data-bs-placement="top"
                title="Close">
                <i class="hover-yellow fa-solid fa-circle-xmark"></i>
            </a>
        </div>
        <div class="card-body ">

            <!---------tombol menu (hapus,edit,report)----------->
            <button class="btn position-absolute top-0 end-0 border-0 mt-5 hover-yellow" type="button"
                data-bs-toggle="collapse" data-bs-target="#edit{{ $post->id }}" aria-expanded="false"
                aria-controls="edit{{ $post->id }}">

                <i class=" fa-solid fa-ellipsis-vertical"></i>
            </button>

            <div class="collapse collapse-horizontal position-absolute top-0 end-0 mx-4 mt-5" id="edit{{ $post->id }}">
                <div class="row  mx-2 mt-1 border-0">

                    <div class="col">
                        <form action="{{ route('home.destroy', $post->id) }}" class="text-dark" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Hapus" method="post">
                            @csrf
                            @method('DELETE')

                            <button class=" btn btn-sm hover-red fa-solid fa-trash bg-transparent border-0 dark"
                                type="submit" value=""></button>
                        </form>
                    </div>

                    <div class="col"><a href="{{ route('home.edit', $post->id) }}"
                            class="btn btn-sm hover-yellow fa-solid fa-pen-to-square bg-transparent border-0 dark"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></a>
                    </div>

                    <div class="col"><button
                            class="btn btn-sm hover-blue fa-solid fa-headset bg-transparent border-0 dark"
                            data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Laporkan"></button></div>

                </div>
            </div>
            <!---------End tombol menu (hapus,edit,report)----------->




            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="">
                    <img src="{{ asset('img/avatar-dhg.png') }}" alt="img" width="45px" height="45px"
                        class="rounded-circle mr-3 ">
                </div>
                <div class=" mt-2 mx-1 ">
                    <h6>{{ $post->user->name }}</h6>
                    <p class="lh-1">
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </p>

                </div>
            </div>

            <div class="media-body">


                <p class="card-text text-justify">{{ $post->posts }}</p>


            </div>

            <!----------------form input comment---------->
            <form action="{{ route('comment.store', $post->id) }}" method="POST">

                @csrf
                <div class="input-group w-100 mt-3">

                    <input type="text" name="coment" id="post" placeholder="Comment"
                        class="form-control form-control-md rounded" autofocus>

                    <div class="input-group-append">

                        <button type="submit" class="btn ">
                            <i class="hover-blue fa-solid fa-paper-plane"></i>
                        </button>
                    </div>

                </div>
            </form>
            <!----------------end form input comment---------->

            <!------------------comment body------------------->
            <div class="my-2">komentar</div>
            @foreach ($post->coments as $comment)
                <div class="card mt-3">
                    <div class="card-body  ">

                        <!---------tombol menu (hapus,edit,report)----------->
                        <button class="btn position-absolute top-0 end-0 border-0 hover-yellow" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample{{ $comment->id }}" aria-expanded="false"
                            aria-controls="collapseExample{{ $comment->id }}">

                            <i class=" fa-solid fa-ellipsis-vertical"></i>
                        </button>

                        <div class="collapse collapse-horizontal position-absolute top-0 end-0 mx-4"
                            id="collapseExample{{ $comment->id }}">
                            <div class="row  mx-2 mt-1 border-0">

                                <div class="col">
                                    <form action="{{ route('comment.destroy', [$comment->id, $comment]) }} "
                                        class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"
                                        method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class=" btn btn-sm hover-red fa-solid fa-trash bg-transparent border-0 dark"
                                            type="submit" value=""></button>
                                    </form>
                                </div>

                                <div class="col"><a href="{{ route('home.edit', $comment->id) }}"
                                        class="btn btn-sm hover-yellow fa-solid fa-pen-to-square bg-transparent border-0 dark"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></a>
                                </div>

                                <div class="col"><button
                                        class="btn btn-sm hover-blue fa-solid fa-headset bg-transparent border-0 dark"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Laporkan"></button></div>

                            </div>
                        </div>
                        <!---------End tombol menu (hapus,edit,report)----------->





                        <div class="d-flex flex-row bd-highlight mb-3">
                            <div class="">
                                <img src="{{ asset('img/avatar-dhg.png') }}" alt="img" width="45px"
                                    height="45px" class="rounded-circle mr-3 ">
                            </div>
                            <div class=" mt-1 mx-1 ">
                                <h6>{{ $comment->user->name }}</h6>
                                <p class="lh-1">
                                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                                </p>

                            </div>
                        </div>

                        <div class="media-body">


                            <p class="card-text text-justify">{{ $comment->coments }}</p>

                        </div>


                    </div>

                </div>
                <!---------------- end comment body ---------------->
            @endforeach
        </div>
    </div>
@endsection
