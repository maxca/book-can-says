<?php

namespace App\Http\Controllers;

use App\Books;

class SimpleController extends Controller
{
    public function testRenderViewViaHasMany()
    {
        $data['books'] = Books::with(['category', 'publisher', 'author', 'chapter'])
            ->orderBy('updated_at', 'desc')
            ->paginate(4);
        return view('test.hasmany', $data);
    }

    public function testRenderViewViaHasOne()
    {

    }
}