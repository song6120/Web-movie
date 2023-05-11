<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Category::all();
        return view('admincp.category.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.category.form');
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
                'title'=>'required|unique:categories|max:100',
                'slug'=>'required|unique:categories|max:255',
                'descripsion'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên danh mục này đã tồn tại, vui lòng nhập lại!',
                'slug.unique'=>'Slug danh mục này đã tồn tại, vui lòng nhập lại!',
                'descripsion.required'=>'Mô tả không được để trống',
                'title.required'=>'Tên danh mục không được để trống',
                'slug.required'=>'Slug không được để trống',
            ]
        );
        $category = new Category();
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->descripsion = $data['descripsion'];
        $category->status = $data['status'];
        $category->save();
        toastr()->success('Thêm danh mục thành công','');
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
        $category = Category::find($id);
        $list = Category::all();
        return view('admincp.category.form', compact('list', 'category'));
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
                'title'=>'required|unique:categories|max:100',
                'slug'=>'required|unique:categories|max:255',
                'descripsion'=>'required|max:255',
                'status'=>'required',
            ],
            [
                'title.unique'=>'Tên danh mục này đã tồn tại, vui lòng nhập lại!',
                'slug.unique'=>'Slug danh mục này đã tồn tại, vui lòng nhập lại!',
                'descripsion.required'=>'Mô tả không được để trống',
                'title.required'=>'Tên danh mục không được để trống',
                'slug.required'=>'Slug không được để trống',
            ]
        );
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->slug = $data['slug'];
        $category->descripsion = $data['descripsion'];
        $category->status = $data['status'];
        $category->save();
        toastr()->success('Cập nhật danh mục thành công','');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        toastr()->info('Xóa danh mục thành công','');
        return redirect()->route('category.index');
    }
}
