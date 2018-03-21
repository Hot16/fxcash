<?php

namespace App\Http\Controllers\Api;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return $images;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request_all = $request->all();
        $rules = [
            'newimages.*' => 'required|file|mimes:jpg,png,jpeg'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors_arr = ['error' => $errors->first()];
            return $errors_arr;
        }

        $files = $request->file('newimages');
        foreach ($files as $file) {
            $random_name = str_random(8);
            $destinationPath = 'files';
            $extension = $file->getClientOriginalExtension();
            $filename = $random_name . '.' . $extension;
            $uploadSuccess = $file->move($destinationPath, $filename);
            Image::create([
                'name' => $filename
            ]);
        }
        return Image::all();
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
    public function destroy()
    {
        //
    }

    public function clear()
    {

        DB::table('images')->truncate();

        return Image::all();
    }
}
