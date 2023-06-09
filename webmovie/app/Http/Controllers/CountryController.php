<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Country::all();
        return view('admincp.country.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Country::all();
        return view('admincp.country.form', compact('list'));
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
                'title'=>'required|unique:countries|max:100',
                'slug'=>'required|unique:countries|max:255',
                'descripsion'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên quốc gia này đã tồn tại, vui lòng nhập lại!',
                'slug.unique'=>'Slug quốc gia này đã tồn tại, vui lòng nhập lại!',
                'descripsion.required'=>'Mô tả không được để trống',
                'title.required'=>'Tên quốc gia không được để trống',
                'slug.required'=>'Slug quốc gia không được để trống',
            ]
        );
        $country = new Country();
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->descripsion = $data['descripsion'];
        $country->status = $data['status'];
        $country->save();
        return redirect()->route('country.index');
        
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
        $country = Country::find($id);
        $list = Country::all();
        return view('admincp.country.form', compact('list', 'country'));
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
                'title'=>'required|unique:countries|max:100',
                'slug'=>'required|unique:countries|max:255',
                'descripsion'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên quốc gia này đã tồn tại, vui lòng nhập lại!',
                'slug.unique'=>'Slug quốc gia này đã tồn tại, vui lòng nhập lại!',
                'descripsion.required'=>'Mô tả không được để trống',
                'title.required'=>'Tên quốc gia không được để trống',
                'slug.required'=>'Slug quốc gia không được để trống',
            ]
        );
        $country = Country::find($id);
        $country->title = $data['title'];
        $country->slug = $data['slug'];
        $country->descripsion = $data['descripsion'];
        $country->status = $data['status'];
        $country->save();
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::find($id)->delete();
        return redirect()->route('country.index');
    }
}
