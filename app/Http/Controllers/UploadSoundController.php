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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    /**
     * @param \App\Http\Requests\UploadSoundRequest $request
     * @return false|mixed|string
     */


    /**
     * @param \App\Http\Requests\UploadSoundRequest $request
     * @return false|mixed|string
     */
    public function upload($request)
    {
        \Storage::disk('public')->put('audio/', $request->file('path'));
        return $request->file('path')
            ->store('public');

       // return $this->upload->upload();
    }


    public function uploadAudioPath(UploadSoundRequest $request)
    {

        $path = str_replace("public/", "", $this->upload($request));
        //$category = BookCategory::create(['name' => $request->get('category')]);
        // $chapter = BookChapter::create(['name' => $request->get('chapter')]);

        $data = array(
//            'book_category_id' => $category->id,
//            'book_chap_id' => $chapter->id,
//            'path' => $path,
//            'total_page' => $request->get('total_page'),
//            'sub_book_chap' => $request->get('sub_book_chap'),
//            'amoung_listening' => $request->get('amoung_listening')

            'book_category_id' => $category = 1,
            'book_chap_id' => $chapter = 1,
            'path' => $path,
            'total_page' => $request = 1,
            'sub_book_chap' => $request = "pimpim",
            'amoung_listening' => $request = 1

        );

        return BookAudio::create($data);

    }


}