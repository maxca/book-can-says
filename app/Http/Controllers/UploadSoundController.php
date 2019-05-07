<?php

namespace App\Http\Controllers;

use App\Services\Uploads\UploadSound;
use App\Http\Requests\UploadSoundRequest;

/**
 * Class UploadSoundController
 * @package App\Http\Controllers
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class UploadSoundController extends Controller
{
    /**
     * @var \App\Services\Uploads\UploadSound
     */
    protected $uploadFile;

    /**
     * UploadSoundController constructor.
     * @param \App\Services\Uploads\UploadSound $uploadFile
     */
    public function __construct(UploadSound $uploadFile)
    {
        $this->uploadFile = $uploadFile;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('recorder.index');
    }

    /**
     * @param \App\Http\Requests\UploadSoundRequest $request
     * @return false|mixed|string
     */
    public function upload(UploadSoundRequest $request)
    {
        return $this->uploadFile->upload();
    }
}