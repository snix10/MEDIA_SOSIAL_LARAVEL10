@extends('home')

@section('edit')
    <div class="card mt-1 mb-5">
        <div class="card-header">
            edit
            {{-- @dd(url()->previous()) --}}
            <a href={{ url()->previous() }} class="btn position-absolute top-0 end-0 ">
                <i class="hover-yellow fa-solid fa-circle-xmark"></i>
            </a>
        </div>
        <div class="card-body ">



            <div class="">
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
                        <h6>{{ auth()->user()->name }}</h6>
                        <p class="lh-1">
                            <small>edited</small>
                        </p>
                    </div>
                </div>

                <div class="media-body">

                    <form action="{{ route('home.update', $post->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn position-absolute top-0 end-0 mt-5">
                            <i class="hover-blue fa-solid fa-paper-plane"></i>
                        </button>
                        <a href="/home" class="btn position-absolute top-0 end-0 ">
                            <i class="hover-yellow fa-solid fa-circle-xmark"></i>
                        </a>
                        <p class="card-text text-justify">
                        <div class="mb-3">
                            <textarea name="posts" autofocus class="form-control bg-transparent border-0" id="exampleFormControlTextarea1"
                                rows="3">{{ $post->posts }}</textarea>
                        </div>
                        </p>

                        <div class="row no-gutters mb-3 d-flex justify-content-center">
                            <div class="col-5 p-1 text-center ">
                                <a href="{{ asset('/') }}images/{{ $post->image }}" data-lightbox="{{ $post->image }}">
                                    <img src="{{ asset('/') }}images/{{ $post->image }}" alt=""
                                        class="img-fluid  rounded">
                                </a>
                            </div>
                        </div>

                        <div class="input-group w-100 ">
                            <input type="file" name="files[]" id="post" placeholder="post" multiple
                                class="form-control form-control-md  border border-dark shadow-sm rounded-pill">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
