{{-- alert atau pemeberitahuan atau notif // bahwa login kita sudah berhasil --}}
@if (session()->has('loginberhasil'))
    <div class="card-body mt-2">
        <div class="alert alert-primary alert-dismissible fade show rounded-pill" role="alert">
            <strong>{{ session('loginberhasil') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

{{-- alert atau pemeberitahuan atau notif yang kedua // bahwa login kita sudah berhasil --}}
@if (session()->has('loginberhasil'))
    <div class="card-body mt-2 ">
        <div class="alert alert-primary alert-dismissible fade show rounded-pill" role="alert">
            <small>ini web seperti forum , mengajukan pertanyaan atau permasalahan apapun , dan
                orang akan memberi
                comentar</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

{{-- alert atau pemeberitahuan atau notif // bahwa post kita sudah berhasil --}}
@if (session('berhasil'))
    <div class="card-body mt-2 ">
        <div class="alert alert-primary alert-dismissible fade show rounded-pill" role="alert">
            <small><i class="far fa-check-circle"> </i> {{ session('berhasil') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif


{{-- alert atau pemeberitahuan atau notif Hapus // bahwa post kita sudah berhasil di Hapus --}}
@if (session('hapus'))
    <div class="card-body mt-2 ">
        <div class="alert alert-danger  alert-dismissible fade show rounded-pill" role="alert">
            <i class="far fa-check-circle"></i> <small> {{ session('hapus') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif


{{-- alert atau pemeberitahuan atau notif // bahwa komentar kita sudah berhasil --}}
@if (session('comment'))
<div class="card-body mt-2  ">
    <div class="alert alert-primary alert-dismissible fade show rounded-pill" role="alert">
        <small><i class="far fa-check-circle"></i> {{ session('comment') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

{{-- alert atau pemeberitahuan atau notif // bahwa komentar kita sudah berhasil dihapus --}}
@if (session('hapusComent'))
<div class="card-body mt-2  ">
    <div class="alert alert-danger alert-dismissible fade show rounded-pill" role="alert">
        <small><i class="far fa-check-circle"></i> {{ session('hapusComent') }}</small>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
