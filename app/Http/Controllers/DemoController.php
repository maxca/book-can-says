<?php

namespace App\Http\Controllers;

use App\Books;
use App\Http\Requests\PlaySoundBookRequest;
use App\Http\Requests\ReviewBookRequest;
use App\Http\Requests\ViewBookCategoryRequest;
use App\Http\Requests\ViewBookDetailRequest;
use App\Http\Requests\ViewBooksRequest;


class DemoController extends Controller
{
    public function viewBooks(ViewBooksRequest $request)
    {
        return view('demo.books');
    }

    public function viewBookDetail(ViewBookDetailRequest $request, $bookId)
    {
        $book = Books::where('id', $bookId)->with(['category', 'publisher', 'authors', 'chapter', 'review','audio'])->first();
        return view('demo.book-detail')->with(['book' => $book]);
    }

    public function viewBookCategory(ViewBookCategoryRequest $request)
    {
        return view('demo.book-category');
    }

    public function playSoundBook(PlaySoundBookRequest $request)
    {

    }

    public function reviewBook(ReviewBookRequest $request)
    {

    }
}
