<?php

namespace App\Http\Controllers;

use App\BookAudio;
use App\BookAuthor;
use App\BookCategory;
use App\BookPublisher;
use App\Services\Uploads\UploadSound;
use App\Http\Requests\UploadSoundRequest;
use App\Http\Controllers\BookController;

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

    public function uploadAudioPath($request){

        $path      = $this->upload($request);

        $data = array(
            'book_categories_id' => $request =1,
            'book_chap_id'      => $request =1,
            'path'         => $path,
            'total_page'         => $request =1,
            'sub_book_chap'         => $request = "test",
            'amoung_listening'        => $request = 1,
        );

        BookAudio::creat($data);

        return "ssssssssssssssssssss";
    }


}