@extends('home')

@section('show')
    <div class="card mb-5 mt-1 shadow">
        <div class="card-header">
            Post dan Komentar
            <a href="{{ url()->previous() }}" class="btn position-absolute top-0 end-0 " data-bs-toggle="tooltip"
                data-bs-placement="top" title="Close">
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
                <div class="row mx-2  mt-1 border-0">

                    @if (auth()->user()->id === $post->users_id)
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
                                class="btn btn-sm hover-yellow fa-solid fa-pen-to-square bg-transparent border-0 dark "
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></a>
                        </div>
                    @else
                        <div class="col"><button
                                class="btn btn-sm hover-blue fa-solid fa-headset bg-transparent border-0 dark"
                                data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Laporkan"></button></div>
                    @endif
                </div>
            </div>
            <!---------End tombol menu (hapus,edit,report)----------->




            <div class="d-flex flex-row bd-highlight mb-3">
                <div class="">
                    @if ($post->user->photoprofile === null)
                        <i class="fas fa-user-circle" style="font-size: 45px"></i>
                    @else
                        <img src="{{ asset('img/avatar-dhg.png') }}" alt="img" width="45px" height="45px"
                            class="rounded-circle mr-3 ">
                    @endif
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


                <div class="row no-gutters mb-3 d-flex justify-content-center">
                    <div class="col-5 p-1 text-center ">
                        <a href="{{ asset('/') }}images/{{ $post->image }}" data-lightbox="{{ $post->image }}">
                            <img src="{{ asset('/') }}images/{{ $post->image }}" alt=""
                                class="img-fluid  rounded">
                        </a>
                    </div>
                </div>


            </div>

            <!----------------form input comment---------->
            <form action="{{ route('comment.store', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group w-100 mt-3 ">
                    <div class="btn   top-50 start-0 rounded-pill rounded-end border-dark border border-end-0"
                        data-bs-toggle="collapse" data-bs-target="#collapseExampleComment" aria-expanded="false"
                        aria-controls="collapseExampleComment" style="background-color:white">
                        <i class="hover-blue fas fa-file-image"></i>
                    </div>
                    <input type="text" name="coments" placeholder=""
                        class="form-control form-control-md  border border-dark border-end-0 border-start-0 shadow-sm">
                    <button type="submit"
                        class="btn   top-50 end-0 rounded-pill rounded-start border-dark border border-start-0 "
                        style="background-color:white">
                        <i class="hover-blue fa-solid fa-paper-plane"></i>
                    </button>
                </div>

                <div class="collapse" id="collapseExampleComment">
                    <div class=" bottom-0 end-0">
                        <div class="input-group w-100 mt-2">
                            <input type="file" name="files[]" id="" placeholder="post" multiple
                                class="form-control form-control-md border border-dark shadow-sm rounded-pill">
                        </div>
                    </div>
                </div>
            </form>
            <!----------------end form input comment---------->

            <!------------------comment body------------------->
            <div class="my-2">komentar {{ $post->coments_count }}</div>
            @foreach ($post->coments as $comment)
                <div class="card mt-3">
                    <div class="card-body  ">

                        <!---------tombol menu (hapus,edit,report)   comments----------->
                        <button class="btn position-absolute top-0 end-0 border-0 hover-yellow" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $comment->id }}"
                            aria-expanded="false" aria-controls="collapseExample{{ $comment->id }}">

                            <i class=" fa-solid fa-ellipsis-vertical"></i>
                        </button>

                        <div class="collapse collapse-horizontal position-absolute top-0 end-0 mx-4"
                            id="collapseExample{{ $comment->id }}">
                            <div class="row  mx-2 mt-1 border-0">

                                @if (auth()->user()->id === $comment->users_id)
                                    <div class="col">
                                        <form action="{{ route('comment.destroy', [$comment->id, $comment]) }} "
                                            class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Hapus" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class=" btn btn-sm hover-red fa-solid fa-trash bg-transparent border-0 dark"
                                                type="submit" value=""></button>
                                        </form>
                                    </div>

                                    <div class="col"><a href="{{ route('comment.edit', [$comment->id, $comment]) }}"
                                            class="btn btn-sm hover-yellow fa-solid fa-pen-to-square bg-transparent border-0 dark"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></a>
                                    </div>
                                @else
                                    <div class="col"><button
                                            class="btn btn-sm hover-blue fa-solid fa-headset bg-transparent border-0 dark"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Laporkan"></button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!---------End tombol menu (hapus,edit,report)   comments----------->





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

                            <div class="row no-gutters d-flex justify-content-center">
                                <div class="col-6 p-1 text-center ">
                                    <a href="{{ asset('/') }}coments_image/{{ $comment->image_coments }}"
                                        data-lightbox="{{ $comment->image_coments }}">
                                        <img src="{{ asset('/') }}coments_image/{{ $comment->image_coments }}"
                                            alt="" class="img-fluid mx-auto rounded">
                                    </a>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
                <!---------------- end comment body ---------------->
            @endforeach
        </div>
    </div>
@endsection
