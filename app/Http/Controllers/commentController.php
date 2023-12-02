<?php

namespace App\Http\Controllers;
use App\Models\coments;
use App\Models\posts;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\commentNotification;


class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('media.show',[


            'comments' => coments::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {

        $this->validate($request, [
            'coments' => ['required'],
            'image_coments' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        // jika file atau gambar NULL/tidak ada data , maka akan menjalankan fungsi ini.
        if ($request->file('files') === NULL) {
            coments::create([
                'posts_id' => $id,
                'users_id' => auth()->id(),
                'coments'   => $request->coments,
            ]);
          // jika file atau gambar ada atau mempunyai data , maka akan menjalankan fungsi ini.
            }else {
            foreach ($request->file('files') as $key => $file) {
                $filename = time().rand(1,200).'.'.$file->extension();
                $file->move(public_path('coments_image'),$filename);
                coments::create([
                    'image_coments' => $filename,
                    'posts_id' => $id,
                    'users_id' => auth()->id(),
                    'coments'   => $request->coments,

                ]);
              }
            }

            $coments = coments::find($id);

            $coments->user->Notify( new commentNotification($coments)); // notifikasi untuk user yang postingannya di komentari.

        return redirect()->back()->with('comment','comment berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coments = coments::find($id);


        $this->authorize('update', $coments ); // untuk menyeleksi siapa saja yang berhak menjalankan fungsi ini.

        return view('media.editComment',[
            'comment' => coments::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $coments = coments::find($id);

        $this->authorize('update', $coments ); // untuk menyeleksi siapa saja yang berhak menjalankan fungsi ini.

        $this->validate($request, [
            'coments' => ['required'],
        ]);

        $coments->update([
            'users_id' => auth()->id(),
            'coments'   => $request->coments,
        ]);

        return to_route('home.show',[$coments->posts_id])->with('editComment','comment berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Request $request)
    {
        $coments = coments::find($id);

        $this->authorize('delete', $coments); // untuk menyeleksi siapa saja yang berhak menghapus

        // menghapus file atau gambar pada folder public/comments_image
        $file = public_path('comments_image/'.$coments->image_coments);
        if (file_exists($file)) {
            @unlink($file);
        }

        $coments -> delete();

        return redirect()->back()->with('hapusComent','comment berhasil dihapus');


    }
}
