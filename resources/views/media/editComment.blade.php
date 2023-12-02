@extends('home')

@section('editComment')
    <div class="card my-3">
        <div class="card-header">
            edit comment
                <a href="{{ url()->previous() }}" class="btn position-absolute top-0 end-0 ">
                    <i class="hover-blue fa-solid fa-circle-xmark"></i>
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
                            <small>edited comment</small>
                        </p>
                    </div>
                </div>

                <div class="media-body">

                    <form action="{{ route('comment.update', [$comment->id, $comment]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn position-absolute top-0 end-0 mt-5">
                            <i class="hover-blue fa-solid fa-paper-plane"></i>
                        </button>

                        <p class="card-text text-justify">
                        <div class="mb-3">
                            <textarea name="coments" autofocus class="form-control bg-transparent border-0" id="exampleFormControlTextarea1"
                                rows="3">{{ $comment->coments }}</textarea>
                        </div>
                        </p>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
