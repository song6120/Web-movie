<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Genre::all();
        return view('admincp.genre.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Genre::all();
        return view('admincp.genre.form', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title'=>'required|unique:genres|max:100',
                'slug'=>'required|unique:genres|max:255',
                'descripsion'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên thể loại này đã tồn tại, vui lòng nhập lại!',
                'slug.unique'=>'Slug thể loại này đã tồn tại, vui lòng nhập lại!',
                'descripsion.required'=>'Mô tả không được để trống',
                'title.required'=>'Tên thể loại không được để trống',
                'slug.required'=>'Slug thể loại không được để trống',
            ]
        );
        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->descripsion = $data['descripsion'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect()->back();
        
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
        $genre = Genre::find($id);
        $list = Genre::all();
        return view('admincp.genre.form', compact('list', 'genre'));
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
        $data = $request->validate(
            [
                'title'=>'required|unique:genres|max:100',
                'slug'=>'required|unique:genres|max:255',
                'descripsion'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên thể loại này đã tồn tại, vui lòng nhập lại!',
                'slug.unique'=>'Slug thể loại này đã tồn tại, vui lòng nhập lại!',
                'descripsion.required'=>'Mô tả không được để trống',
                'title.required'=>'Tên thể loại không được để trống',
                'slug.required'=>'Slug thể loại không được để trống',
            ]
        );
        $genre = Genre::find($id);
        $genre->title = $data['title'];
        $genre->slug = $data['slug'];
        $genre->descripsion = $data['descripsion'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::find($id)->delete();
        return redirect()->route('genre.index');
    }
}
