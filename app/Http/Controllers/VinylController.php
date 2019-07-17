<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vinyl;

class VinylController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vinyls = Vinyl::all();

        return view('vinyls.index', compact('vinyls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vinyls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'band'  => 'required',
        ]);

        $vinyl = new Vinyl([
            'title' => $request->get('title'),
            'band'  => $request->get('band'),
            'year'  => $request->get('year'),
            'genre' => $request->get('genre'),
            'state' => $request->get('state'),
            'cover' => $request->get('cover')
        ]);
        $vinyl->save();

        return redirect('/vinyls')->with('success', 'Vinyl saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vinyl = Vinyl::find($id);

        return view('vinyls.edit', compact('vinyl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'band'  => 'required',
        ]);

        $vinyl = Vinyl::find($id);

        $vinyl->title = $request->get('title');
        $vinyl->band  = $request->get('band');
        $vinyl->year  = $request->get('year');
        $vinyl->genre = $request->get('genre');
        $vinyl->state = $request->get('state');
        $vinyl->cover = $request->get('cover');

        $vinyl->save();

        return redirect('/vinyls')->with('success', 'Vinyl updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vinyl = Vinyl::find($id);
        $vinyl->delete();

        return redirect('/vinyls')->with('success', 'Vinyl deleted!');
    }
}
