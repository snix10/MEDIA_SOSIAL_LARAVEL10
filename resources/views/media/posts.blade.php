@extends('home')

@section('posts')
    @foreach ($posts as $post)
        <div class="card mt-3">
            <div class="card-body ">

                <!---------tombol menu (hapus,edit,report)----------->
                <button class="btn position-absolute top-0 end-0 border-0 hover-yellow" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample{{ $post->id }}" aria-expanded="false"
                    aria-controls="collapseExample{{ $post->id }}">

                    <i class=" fa-solid fa-ellipsis-vertical"></i>
                </button>

                <div class="collapse collapse-horizontal position-absolute top-0 end-0 mx-4"
                    id="collapseExample{{ $post->id }}">
                    <div class="row  mx-2 mt-1 border-0">

                        @if (auth())
                        <div class="col">
                            <form action="{{ route('home.destroy', $post->id) }}" class="text-dark" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Hapus" method="post">
                                @csrf
                                @method('DELETE')

                                <button class=" btn btn-sm hover-red fa-solid fa-trash bg-transparent border-0 dark"
                                    type="submit" value=""></button>
                            </form>
                        </div>
                    @else

                    @endif


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

                <!-- Modal -->
                <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-footer">
                                <div class="mx-3 position-absolute top-50 start-0 translate-middle-y my-auto">
                                    Hapus post</div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="">
                        <img src="{{ asset('img/avatar-dhg.png') }}" alt="img" width="45px" height="45px"
                            class="rounded-circle mr-3 ">
                    </div>
                    <div class=" mt-1 mx-1 ">
                        <a href="" class="text-decoration-none text-dark">
                        <h6>{{ $post->user->name }}</h6>
                    </a>
                        <div class="lh-1">
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </div>

                    </div>
                </div>

                <div class="media-body">


                    <p class="card-text text-justify">{{ $post->posts }}</p>



                    <div class="row no-gutters mb-3">
                        <div class="col-6 p-1 text-center">

                            <img src="img/adventure-alps-clouds-2259810.jpg" alt="" class="img-fluid mb-2">
                            <img src="img/aerial-view-architectural-design-buildings-2228123.jpg" alt=""
                                class="img-fluid">


                        </div>

                        <div class="col-6 p-1 text-center">

                            <img src="img/celebration-colored-smoke-dark-2297472.jpg" alt="" class="img-fluid mb-2">
                            <img src="img/bodybuilding-exercise-fitness-2294361.jpg" alt="" class="img-fluid">
                        </div>
                    </div>

                    <div class="position-absolute bottom-0 end-0 my-3 mx-3"><a href="{{ route('home.show', $post->id) }}"
                            class="btn hover-blue fa-solid fa-comment-dots bg-transparent border-0 dark"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Comment"><span
                            class="position-absolute top-50 start-100 hover-blue translate-middle badge rounded-pill text-dark">{{$post->coments_count}}
                            <span class="visually-hidden">unread messages</span></span></div></a>

                </div>


            </div>
        </div>
    @endforeach
    <div class="my-4">
        {{ $posts->links() }}
    </div>
@endsection
