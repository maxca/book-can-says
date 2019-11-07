<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRenderRequest;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\FileNotFoundException;

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

    public function download(ImageRenderRequest $request)
    {

        if (Storage::exists($request->get('file_name'))) {

            return Storage::download($request->get('file_name'));
        }
    }

    public function showPDF(ImageRenderRequest $request)
    {
        $fileName = '/public/pdfs/' . $request->get('file_name');
        if (Storage::exists($fileName)) {
            $contents = Storage::get($fileName);
            return response($contents)->withHeaders([
                'Content-Type' => 'application/pdf',
            ]);
        }
        throw FileNotFoundException();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function testView()
    {
        return view('test.index');
    }
}
