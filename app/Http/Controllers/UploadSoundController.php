<?php

namespace App\Http\Controllers;

use App\BookAudio;
use App\BookAuthor;
use App\BookCategory;
use App\BookChapter;
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
     * @param \App\Http\Requests\UploadSoundRequest $request
     * @return mixed
     */
    public function uploadAudioPath(UploadSoundRequest $request)
    {
        $soundPath = $this->uploadFile->upload();
        $data      = array(
            'book_id'          => $request->get('book_id'),
            'book_category_id' => 1,
            'book_chap_id'     => 1,
            'chapter_name'     => $request->get('chapter_name'),
            'path'             => $soundPath,
            'total_page'       => $request->get('total_page'),
            'sub_book_chap'    => 'lan wang ji',
            'amoung_listening' => 1,


        );



        return BookAudio::updateOrCreate([
            'book_id' => $request->book_id,
            'chapter_name' => $request->chapter_name,
        ], $data);

    }


}
