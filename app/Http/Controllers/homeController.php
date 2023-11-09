<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\coments;
use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('media.posts',[


            'posts' => posts::latest()->paginate(20)->withQueryString(),
        ]);
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'posts' => ['required'],
        ]);

        posts::create([
            'users_id' => auth()->id(),
            'posts'   => $request->posts,
        ]);

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
        return view('media.edit',[
            'posts' => posts::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'posts' => ['required'],
        ]);


        $posts = posts::find($id);

        $posts->update([
            'users_id' => auth()->id(),
            'posts'   => $request->posts,
        ]);

        return to_route('home.index')->with('berhasil','post berhasil di Edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posts = posts::find($id);


        $posts->delete();

        session()->flash('hapus','Post berhasil di hapus');

        return to_route('home.index');
    }
}
