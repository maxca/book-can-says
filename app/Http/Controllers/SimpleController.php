<?php

namespace App\Http\Controllers;


use App\SimpleBooks;

class SimpleController extends Controller
{
    public function testRenderViewViaHasMany()
    {
        $data['books'] = SimpleBooks::with(['category', 'publisher', 'author', 'chapter'])
            ->orderBy('updated_at', 'desc')
            ->paginate(12);
        return view('test.hasmany', $data);
    }

    public function testRenderViewViaHasOne()
    {

    }
}