@extends('home')

@section('edit')

        <div class="card my-3">
            <div class="card-header">
                edit
                <a href="/home" class="btn position-absolute top-0 end-0 ">
                    <i class="hover-yellow fa-solid fa-circle-xmark"></i>
                </a>
            </div>
            <div class="card-body ">



                <div class="">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="">
                            <img src="{{ asset('img/avatar-dhg.png') }}" alt="img" width="45px" height="45px"
                                class="rounded-circle mr-3 ">
                        </div>
                        <div class=" mt-1 mx-1 ">
                            <h6>{{ auth()->user()->name }}</h6>
                            <p class="lh-1">
                                <small>edited</small>
                            </p>
                        </div>
                    </div>

                    <div class="media-body">

                        <form action="{{ route('home.update', $posts->id) }}" method="post">
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
                                <textarea name="posts" autofocus class="form-control bg-transparent border-0" id="exampleFormControlTextarea1" style="font-size:small "
                                    rows="3">{{ $posts->posts }}</textarea>
                            </div>
                            </p>

                        </form>

                    </div>
                </div>
            </div>
        </div>

@endsection
