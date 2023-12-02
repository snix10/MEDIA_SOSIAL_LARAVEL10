@extends('home')

<!--------FORM POST--------->
@section('formposts')
    <input type="hidden" name="category" value="{{ request('category') }}">


    <form class="form-inline" method="POST" action="{{ route('home.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="input-group w-100 rounded-pill shadow">
            <div class="btn   top-50 start-0 rounded-pill rounded-end border border-end-0" data-bs-toggle="collapse"
                data-bs-target="#collapseExamplePost" aria-expanded="false" aria-controls="collapseExamplePost"
                style="background-color:white">
                <i class="hover-blue fas fa-file-image"></i>
            </div>
            <input type="text" name="posts" id="post" placeholder=""
                class="form-control form-control-md position-relative border border-end-0  border-start-0 shadow-sm">
            <button type="submit" class="btn   top-50 end-0 rounded-pill rounded-start  border border-start-0 "
                style="background-color:white">
                <i class="hover-blue fa-solid fa-paper-plane"></i>
            </button>
        </div>

        <div class="collapse" id="collapseExamplePost">
            <div class=" bottom-0 end-0 mt-2">
                <div class="input-group w-100 ">
                    <input type="file" name="files[]" id="post" placeholder="post" multiple
                        class="form-control form-control-md  border  shadow rounded-pill">
                </div>
            </div>
        </div>
    </form>
@endsection
<!--------FORM POST--------->

<!--------TAMPILAN POST--------->
@section('posts')
    @foreach ($posts as $post)
        <div class="card mt-3 shadow">
            <div class="card-body ">

                <!---------MENU EDIT , DELETTE , REPORT----------->
                <button class="btn position-absolute top-0 end-0 border-0 hover-yellow " type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseExample{{ $post->id }}" aria-expanded="false"
                    aria-controls="collapseExample{{ $post->id }}">

                    <i class=" fa-solid fa-ellipsis-vertical"></i>
                </button>

                <div class="collapse collapse-horizontal position-absolute top-0 end-0 mx-4 "
                    id="collapseExample{{ $post->id }}">
                    <div class="row  mx-2 mt-1 border-0">


                        @if (auth()->user()->id === $post->users_id)
                            <div class="col">
                                <form action="{{ route('home.destroy', $post->id) }}" class="text-dark"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" method="post">
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
                        @else
                            <div class="col"><button
                                    class="btn btn-sm hover-blue fa-solid fa-headset bg-transparent border-0 dark"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Laporkan"></button></div>
                        @endif




                    </div>
                </div>
                <!---------END MENU EDIT , DELETTE , REPORT----------->

                <!---------USER PHOTO, TIME ,NAME------->
                <div class="d-flex flex-row bd-highlight mb-3">
                    <div class="">
                        @if ($post->user->photoprofile === null)
                            <i class="fas fa-user-circle" style="font-size: 45px"></i>
                        @else
                            <img src="{{ asset('img/avatar-dhg.png') }}" alt="img" width="45px" height="45px"
                                class="rounded-circle mr-3 ">
                        @endif

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

                    <!---------TEXT POST-------->
                    <p class="card-text text-justify mb-2">{{ $post->posts }}</p>


                    <!----------IMAGE POST------->

                    <div class="row no-gutters mb-5 d-flex justify-content-center">
                        <div class="col-6 p-1 text-center ">
                            <a href="images/{{ $post->image }}" data-lightbox="{{ $post->image }}">
                                <img src="images/{{ $post->image }}" alt="" class="img-fluid mx-auto rounded">
                            </a>
                        </div>
                    </div>


                    <!--------TOMBOL COMMENT----->
                    <div class="position-absolute bottom-0 end-0 my-3 mx-3"><a href="{{ route('home.show', $post->id) }}"
                            class="btn hover-blue  fas fa-comment-alt bg-transparent border-0 dark" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Comment"><span
                                class="position-absolute top-50 start-100 hover-blue translate-middle badge rounded-pill text-dark">{{ $post->coments_count }}
                                <span class="visually-hidden">unread messages</span></span></a></div>

                    <div class="position-absolute bottom-0 start-0 my-3 mx-1"><a
                            href="{{ route('home.show', $post->id) }}"
                            class="btn hover-blue  fas fa-comment-alt bg-transparent border-0 dark"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Comment"><span
                                class="position-absolute top-50 start-100 hover-blue translate-middle badge rounded-pill text-dark">{{ $post->coments_count }}
                                <span class="visually-hidden">unread messages</span></span></a></div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="my-4">
        {{ $posts->links() }}
    </div>
@endsection
<!--------END TAMPILAN POST--------->
