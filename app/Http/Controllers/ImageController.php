<?php

namespace App\Http\Controllers;

use App\Album;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['image', 'albumImage', 'create', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::with('images')->get();
        //dd($albums);
        //return $albums;
        return view('images.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::all();
        return view('images.create', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'album' => 'required|min:3|max:50',
            'image' => 'required'
        ]);
        $album = Album::create(['name' => $request->get('album')]);
        if($request->hasFile('image')){
            foreach($request->file('image') as $image){
                $path = $image->store('uploads', 'public');
                Image::create([
                    'name' => $path,
                    'album_id' => $album->id
                ]);
            }
            return "<div class='alert alert-success'>Зургийн цомог болон зураг амжилттай үүсгэлээ.</div>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $albums = Album::findOrFail($id);
        return view('images.gallery', compact('albums'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deletedimage = Image::findOrFail($id);
        $filePath = $deletedimage->name;
        $deletedimage->delete();
        \Storage::delete(['public/'.$filePath]);
        return redirect('/album')->with('Message', 'Зураг амжилттай устлаа.');
    }
    public function image(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'image' => 'required'
        ]);

        if($request->hasFile('image')){
            $albumId = $request->id;
            foreach($request->file('image') as $image){
                $path = $image->store('uploads', 'public');
                Image::create([
                    'name' => $path,
                    'album_id' => $albumId
                ]);
            }
            return redirect()->back()->with("Message", "Зургийг амжилттай үүсгэлээ.");
        }
    }
    public function albumImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        if($request->hasFile('image')){
            $albumId = $request->id;
            $file = $request->file('image');
            $path = $file->store('uploads', 'public');
            Album::where('id', $albumId)->update([
                'image' => $path
            ]);
            return redirect()->back()->with("Message", "Альбомын зургийг амжилттай шинэчлэлээ.");
        }
    }
}
