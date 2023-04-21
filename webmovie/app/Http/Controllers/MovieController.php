<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Carbon\Carbon;
use File;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category', 'country', 'movie_genre', 'genre')->orderBy('id', 'DESC')->get();
        $path = public_path()."/json/";
        if(!is_dir($path)) {mkdir($path, 0777, true);}
        File::put($path.'movies.json', json_encode($list));

        return view('admincp.movie.index', compact('list'));
    }
    public function update_year(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];
        $movie->save();
    }
    public function update_topview(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];
        $movie->save();
    }
    public function update_season(Request $request){
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];
        $movie->save();
    }
    public function filter_topview(Request $request){
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('ngaycapnhat','DESC')->take(20)->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if($mov->resolution==0){
                $text = 'HD';
            }elseif($mov->resolution==1){
                $text = 'SD';
            }elseif($mov->resolution==2){
                $text = 'HDCam';
            }else{
                $text = 'Cam';
            }
            $output = '<div class="item post-37176">
                            <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                            <div class="item-link">
                                <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb" alt="'.$mov->title.'" title="'.$mov->title.'" />
                                <span class="is_trailer">'.$text.'</span>
                            </div>
                            <p class="title">'.$mov->title.'</p>
                        </a>
                        <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                        <div style="float: left;">
                            <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                            <span style="width: 0%"></span>
                            </span>
                        </div>
                        </div>';
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list = Movie::with('category', 'country', 'genre')->orderBy('id', 'DESC')->get();
        $list_genre = Genre::all();
        return view('admincp.movie.form', compact('list', 'category', 'country', 'genre', 'list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->name_english = $data['name_english'];
        $movie->descripsion = $data['descripsion'];
        $movie->tags = $data['tags'];
        $movie->time = $data['time'];
        $movie->sotap = $data['sotap'];
        $movie->status = $data['status'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->resolution = $data['resolution'];
        $movie->subtitle = $data['subtitle'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->slug = $data['slug'];
        $movie->year = $data['year'];
        $movie->category_id = $data['category_id'];
        $movie->country_id = $data['country_id'];
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }
        
        $get_image = $request->file('image');
        $path = 'uploads/movie/';

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        $movie->movie_genre()->attach($data['genre']);
        return redirect()->route('movie.index');
        
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
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $movie = Movie::find($id);
        $list_genre = Genre::all();
        $movie_genre = $movie->movie_genre;
        return view('admincp.movie.form', compact('category', 'country', 'genre', 'movie', 'list_genre','movie_genre'));
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
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->trailer = $data['trailer'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->sotap = $data['sotap'];
        $movie->name_english = $data['name_english'];
        $movie->descripsion = $data['descripsion'];
        $movie->status = $data['status'];
        $movie->subtitle = $data['subtitle'];
        $movie->resolution = $data['resolution'];
        $movie->year = $data['year'];
        $movie->movie_hot = $data['movie_hot'];
        $movie->slug = $data['slug'];
        $movie->time = $data['time'];
        $movie->tags = $data['tags'];
        $movie->category_id = $data['category_id']; 
        $movie->country_id = $data['country_id'];
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');
        foreach($data['genre'] as $key => $gen){
            $movie->genre_id = $gen[0];
        }
        $get_image = $request->file('image');
        $path = 'uploads/movie/';

        if($get_image){
            if(file_exists('uploads/movie/'.$movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }else{
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move($path, $new_image);
                $movie->image = $new_image;
            }
        }
        $movie->save();
        $movie->movie_genre()->sync($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();
        Episode::whereIn('movie_id', [$movie->id])->delete();
        $movie->delete();

        return redirect()->back();
    }
}
