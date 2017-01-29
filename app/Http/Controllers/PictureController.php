<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use Storage;
use App\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Discover 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit') ?: 9;

        $filter = $request->get('filter');

        if($filter == 'user') {

            $pictures = Auth::user()->pictures()->latest()->paginate($limit);

        } else {

            $pictures = Picture::latest()->paginate($limit);
            
        }

        

        return view('pictures.discover', compact('pictures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pictures.upload');
    }

    /**
     * Store a new image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $this->validate($request, [
            'title' => 'required',
            'picture' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $picture_path = "uploads/" . $request->file('picture')->store('pictures',  'uploads');

        Auth::user()->pictures()->save(new Picture([
                'title' => $request->get('title'),
                'url' => $picture_path
            ]));

        return redirect()->action('PictureController@index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
