<?php

namespace App\Http\Controllers;

use App\Books;
use App\Http\Requests\AdminUpdateBookRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewBooks()
    {

        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
        return view('admin.manage-book')->with($data);
    }

    public function approveBook(AdminUpdateBookRequest $request, $bookId)
    {
        $book = Books::find($bookId);
        $book->update($request->all());
        return $book;
    }

}
