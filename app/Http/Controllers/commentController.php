<?php

namespace App\Http\Controllers;
use App\Models\coments;
use App\Models\posts;
use App\Models\User;
use Illuminate\Http\Request;

class commentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('media.show',[


            'comments' => coments::latest()->paginate(20)->withQueryString(),
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


        coments::create([
            'posts_id' => $id,
            'users_id' => auth()->id(),
            'coments'   => $request->coment,
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Request $request,posts $posts,coments $coments)
    {
        $coments = coments::find($id);

        $this->authorize('delete', $coments );


        $coments -> delete();

        return redirect()->back()->with('comment','comment berhasil dihapus');


    }
}
