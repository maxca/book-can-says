<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRenderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index(ImageRenderRequest $request)  {
        if(Storage::exists($request->file_name)) {
            return Storage::get($request->file_name);
        }

    }
}
