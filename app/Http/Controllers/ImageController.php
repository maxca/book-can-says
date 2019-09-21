<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRenderRequest;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * @param \App\Http\Requests\ImageRenderRequest $request
     * @return mixed
     */
    public function index(ImageRenderRequest $request)
    {

        if (Storage::exists($request->get('file_name'))) {

            return Storage::get($request->get('file_name'));
        }
    }



    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testView()
    {
        return view('test.index');
    }
}
