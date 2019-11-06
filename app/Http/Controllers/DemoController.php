<?php

namespace App\Http\Controllers;

use App\BookAudio;
use App\Books;
use App\Http\Requests\PlaySoundBookRequest;
use App\Http\Requests\ReviewBookRequest;
use App\Http\Requests\ViewBookCategoryRequest;
use App\Http\Requests\ViewBookDetailRequest;
use App\Http\Requests\ViewBooksRequest;
use App\Services\Sound\PlaySoundService;


class DemoController extends Controller
{
    protected $playSound;

    public function __construct(PlaySoundService $playSound)
    {
        $this->playSound = $playSound;
    }

    public function viewBooks(ViewBooksRequest $request)
    {
        return view('demo.books');
    }

    public function viewBookDetail(ViewBookDetailRequest $request, $bookId)
    {
        $sound = $this->playSound->getJsonDataForPlugin($bookId);
        $book  = Books::where('id', $bookId)->with(['audio' => function ($query) {
            $query->where('status', 'active');
        }])->first();

        return view('demo.book-detail')
            ->with(['book' => $book])
            ->with(['sound' => $sound]);
    }


    public function viewBookCategory(ViewBookCategoryRequest $request)
    {
        return view('demo.book-category');
    }

    public function viewAudioList()
    {
        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
        return view('home.view-audio-list', $data);
    }

    public function viewVerifyAudio()
    {
        $data['books'] = Books::with(['category', 'publisher', 'authors', 'chapter', 'review', 'audio'])
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
//        return $data;
//        dd($data);
        return view('admin.view-verify-audio', $data);
    }

    public function playSoundBook(PlaySoundBookRequest $request)
    {

    }

    public function reviewBook(ReviewBookRequest $request)
    {

    }

    public function testPlayer()
    {
        return view('demo.test-player');
    }
}
