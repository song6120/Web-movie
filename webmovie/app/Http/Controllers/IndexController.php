<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\country;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use DB;

class IndexController extends Controller
{
    public function timkiem(){
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $category = Category::where('status', 1)->get();
            $genre = Genre::orderBy('id', 'DESC')->get();
            $country = Country::orderBy('id', 'DESC')->get();
            $movie = Movie::where('title', 'LIKE', '%'.$search.'%')->orderby('ngaycapnhat', 'DESC')->paginate(40);
            $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
            $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
            return view('pages.search', compact('category', 'genre', 'country', 'search', 'movie', 'movie_sidebar', 'movie_trailer'));
        }else{
            return redirect()->to('/');
        }
    }
    public function home(){
        $movie_hot = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->get();
        $category = Category::where('status', 1)->get();
        $category_home = Category::with('movie')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        return view('pages.home', compact('category', 'genre', 'country', 'category_home', 'movie_hot', 'movie_sidebar','movie_trailer'));
    }

    public function category($slug){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $cate_slug = Category::where('slug', $slug)->first();
        $movie = Movie::where('category_id', $cate_slug->id)->orderby('ngaycapnhat', 'DESC')->paginate(40);
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        return view('pages.category', compact('category', 'genre', 'country', 'cate_slug', 'movie', 'movie_sidebar', 'movie_trailer'));
    }
    public function year($year){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $year = $year;
        $movie = Movie::where('year', $year)->orderby('ngaycapnhat', 'DESC')->paginate(40);
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        return view('pages.year', compact('category', 'genre', 'country', 'year', 'movie', 'movie_sidebar', 'movie_trailer'));
    }
    public function tags($tag){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $tag = $tag;
        $movie = Movie::where('tags', 'LIKE', '%'.$tag.'%')->orderby('ngaycapnhat', 'DESC')->paginate(40);
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        return view('pages.tags', compact('category', 'genre', 'country', 'tag', 'movie', 'movie_sidebar', 'movie_trailer'));
    }
    public function genre($slug){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $genre_slug = Genre::where('slug', $slug)->first();
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_genre = Movie_Genre::where('genre_id', $genre_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $mov){
            $many_genre[] = $mov->movie_id;
        }
        $movie = Movie::whereIn('id', $many_genre)->orderby('ngaycapnhat', 'DESC')->paginate(40);
        return view('pages.genre', compact('category', 'genre', 'country', 'genre_slug', 'movie', 'movie_sidebar', 'movie_trailer'));

    }
    public function country($slug){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $country_slug = Country::where('slug', $slug)->first();
        $movie = Movie::where('country_id', $country_slug->id)->orderby('ngaycapnhat', 'DESC')->paginate(40);
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        return view('pages.country', compact('category', 'genre', 'country', 'country_slug', 'movie', 'movie_sidebar', 'movie_trailer'));
    }
    public function movie($slug){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie = Movie::with('category','genre','country','movie_genre')->where('slug', $slug)->where('status', 1)->first();
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();
        $episode_first = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first();
        $episode_list = Episode::with('movie')->where('movie_id', $movie->id)->get();
        $episode_count = $episode_list->count();
        return view('pages.movie', compact('category', 'episode_first','genre', 'country', 'movie','related', 'movie_sidebar', 'movie_trailer', 'episode', 'episode_count'));
    }
    public function episode(){
        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        return view('pages.episode', compact('category', 'genre', 'country'));
    }
    public function watch($slug, $tap){
        if(isset($tap)){
            $tapphim = $tap;
        }else{
            $tapphim = 1;
        }
        $tapphim = substr($tap, 4, 11);

        $category = Category::where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->get();
        $country = Country::orderBy('id', 'DESC')->get();
        $movie_sidebar = Movie::where('movie_hot', 1)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie_trailer = Movie::where('resolution', 5)->where('status', 1)->orderby('ngaycapnhat', 'DESC')->take('10')->get();
        $movie = Movie::with('category','genre','country','movie_genre','episode')->where('slug', $slug)->where('status', 1)->first();

        $episode = Episode::where('movie_id', $movie->id)->where('episode', $tapphim)->first();
        //return response()->json($movie);
        $related = Movie::with('category', 'genre', 'country')->where('category_id', $movie->category->id)->orderby(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        return view('pages.watch', compact('category', 'genre', 'country','movie_sidebar', 'movie_trailer', 'movie', 'episode', 'tapphim', 'related'));
    }
}
