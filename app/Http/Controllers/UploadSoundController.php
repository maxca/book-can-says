<?php

namespace App\Http\Controllers;

use App\BookAudio;
use App\BookAuthor;
use App\BookCategory;
use App\BookChapter;
use App\BookPublisher;
use App\Books;
use App\Services\Uploads\UploadSound;
use App\Http\Requests\UploadSoundRequest;
use App\Http\Controllers\BookController;
use http\Env\Request;

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
        $data = array(
            'book_id' => $request->get('book_id'),
            'book_category_id' => 1,
            'book_chap_id' => 1,
            'chapter_name' => $request->get('chapter_name'),
            'path' => $soundPath,
            'total_page' => $request->get('total_page'),
            'sub_book_chap' => "pimpim",
            'amoung_listening' => 1,
        );

        return BookAudio::updateOrCreate([
            'book_id' => $request->book_id,
            'chapter_name' => $request->chapter_name,
        ], $data);

    }

    public function uploadAudioOffline($request)
    {

        if ($request->has('audio')) {
            \Storage::disk('public')->put('sounds/', $request->file('audio'));
            return $request->file('audio')
                ->store('public');
        }
        return null;

//        $this->validate($request,
//            ['select_audio' => 'required|audio']);
//        $audio = $request->file(' select_audio ');
//        $new_name = rand() . '.' . $audio->getClientOriginalExtension();
//        $audio->move(public_path('sound'), $new_name);
//        return back()->with('success', ‘อัพโหลดไฟล์เรียบร้อยแล้ว’)->with('path', $new_name);


    }

    public function submitOfflineAudio(UploadSoundRequest $request)
    {
        $soundPath = str_replace("public/", "", $this->uploadAudioOffline($request));
//        $soundPath = $this->uploadFile->upload();
        $data = array(
            'book_id' => $request->get('book_id'),
            'book_category_id' => 1,
            'book_chap_id' => 1,
            'chapter_name' => $request->get('chapter_name'),
            'path' => $soundPath,
            'total_page' => $request->get('total_page'),
            'sub_book_chap' => "pimpim",
            'amoung_listening' => 1,
        );

        return BookAudio::updateOrCreate([
            'book_id' => $request->book_id,
            'chapter_name' => $request->chapter_name,
        ], $data);


    }


}
