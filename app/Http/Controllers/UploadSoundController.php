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
//use http\Env\Request;
use Illuminate\Http\Request;

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
            'sub_book_chap' => 'lan wang ji',
            'amoung_listening' => 1,
        );

        return BookAudio::updateOrCreate([
            'book_id' => $request->book_id,
            'chapter_name' => $request->chapter_name,
        ], $data);

    }

    public function showUploadForm(Request $request)
    {
        $data = Books::find($request->id);
        return view("home.view-new-record",$data);
    }

    public function uploadAudioOffline($request)
    {
        \Storage::disk('public')->put('sounds/', $request->file('select_audio'));
        return $request->file('select_audio')
            ->store('public/sounds');
    }

    public function submitOfflineAudio(Request $request)
    {
//        dd($request->id);
//        $book_id = Books::find($request->id);
        $soundPath = str_replace("public/", "", $this->uploadAudioOffline($request));
//        $soundPath = $this->uploadFile->upload();
        $data = array(
            'book_id' => $request->get('book_id'),
            'book_category_id' => 1,
            'book_chap_id' => 1,
            'chapter_name' => $request->get('chapter_name'),
            'path' => $soundPath,
            'total_page' => $request->get('total_page'),
            'sub_book_chap' => "wei wu xian",
            'amoung_listening' => 1,
        );
//        dd($data);
        return redirect()->route('view.book.record.sound')->with('success', 'อัพโหลดหนังสือสำเร็จ');
//        return BookAudio::updateOrCreate([
//            'book_id' => $request->book_id,
//            'chapter_name' => $request->chapter_name,
//        ], $data);


    }


}
