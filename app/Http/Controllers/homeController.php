<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\user;
use App\Models\coments;
use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('media.posts', [


            'posts' => posts::latest()->paginate(50),
        ]);
    }



    public function store(Request $request)
    {


        $this->validate($request, [
            'posts' => ['required'],
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // jika file atau gambar NULL/tidak di isi maka akan menjalankan ini.
        if ($request->file('files') === NULL) {
            posts::create([
            'users_id' => auth()->id(),
            'posts'   => $request->posts,

        ]);
        // tetapi jika file atau gambar berisi data maka akan menjalankan ini.
        }else {
            foreach ($request->file('files') as $key => $file) {
            $filename = time().rand(1,200).'.'.$file->extension(); // 726427262.jpg (sesuai format file gambar)
            $file->move(public_path('images'),$filename); // dimasukan ke public/images
            posts::create([
            'users_id' => auth()->id(),
            'posts'   => $request->posts,
            'image' => $filename,
            ]);

        }
        }


        return to_route('home.index')->with('berhasil','post berhasil ditambahkan');

    }



    /**
     * Display the specified resource.
     */
    public function show(posts $posts, $id)
    {

        return view('media.show',[

            'post' => posts::find($id)->load('coments','coments.user','user')



        ]);




    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posts = posts::find($id);


        $this->authorize('update', $posts );

        return view('media.edit',[
            'post' => posts::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd($request);
        $this->validate($request, [
            'posts' => ['required'],
        ]);


        $posts = posts::find($id);

        $this->authorize('update', $posts );

        // jika ada file atau gambar baru. akan di hapus file atau gambar yang sebelumnya ada.
        if($request->hasFile('files')) {
            $file = public_path('images/'.$posts->image);
            if (file_exists($file)) {
                @unlink($file);
            }
            // dan akan menginput file atau gambar baru.
            foreach ($request->file('files') as $key => $file) {
                $filename = time().rand(1,200).'.'.$file->extension(); // 726427262.jpg (sesuai format file gambar)
                $file->move(public_path('images'),$filename); // dimasukan ke public/images
                }
                $posts->update([
                    'users_id' => auth()->id(),
                    'posts'   => $request->posts,
                    'image'   => $filename
                ]);
        }

        // jika tidak ada file atau gambar baru maka ini yang akan di jalankan
        $posts->update([
            'users_id' => auth()->id(),
            'posts'   => $request->posts,

        ]);

        return redirect()->back()->with('berhasil','post berhasil di Edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id , User $user ,Request $request)
    {

        $posts = posts::find($id);

        $this->authorize('delete', $posts ); // untuk menyeleksi user yang berhak menghapus.

        // jika ada file  atau gambar, yang sesuai dengan data base, didalam folder public/images maka akan di hapus.
        $file = public_path('images/'.$posts->image);
        if (file_exists($file)) {
            @unlink($file);
        }
        // jika ada file  atau gambar, yang sesuai dengan data base (table comment), didalam folder public/coments_image maka akan di hapus.
        foreach ($posts->coments as $key => $coments) {
            $file = public_path('coments_image/'.$coments->image_coments);
            if (file_exists($file)) {
                @unlink($file);
            }
        }

        $posts->coments()->delete();
        $posts->delete();

        session()->flash('hapus','Post berhasil di hapus');

        return to_route('home.index');
    }
}
