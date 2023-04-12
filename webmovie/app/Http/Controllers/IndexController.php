<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;

class IndexController extends Controller
{
    public function home(){
        $category = Category::where('status', 1)->get();
        $category_home = Category::with('movie')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home'));
    }

    public function category($slug){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug'));
    }
    public function genre($slug){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug'));
    }
    public function country($slug){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug'));
    }
    public function movie(){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view('pages.movie', compact('category', 'genre', 'country'));
    }
    public function episode(){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view('pages.episode', compact('category', 'genre', 'country'));
    }
    public function watch(){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view('pages.watch', compact('category', 'genre', 'country'));
    }
}
