<?php

namespace App\Http\Controllers;

use App\BookAudio;
use App\BookAuthor;
use App\BookPublisher;
use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\EditBookFormRequest;
use App\Http\Requests\UploadSoundRequest;
use Illuminate\Http\Request;
use App\BookCategory;
use App\Books;
use App\Http\Requests\SubmitFormCreateBookRequest;
use App\Http\Controllers\UploadSoundController;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{


    public function viewWelcome()
    {
        return view("home.index");
    }

    public function viewBook()
    {

        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->where('publish_status','publisher')
//            ->where('user_id',auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
//        return $data;
        return view("home.view-book", $data);

    }


    public function viewBlind()
    {

        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
//            ->where('publish_status','publish')
//            ->where('user_id',auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
//        return $data;
        return view("home.view-blind", $data);

    }


    public function viewFormCreateBook()
    {
        $data['category'] = BookCategory::all();
        return view('home.form')->with($data);
    }

    private function uploadImage($request)
    {
        \Storage::disk('public')->put('images/', $request->file('cover_image'));
        return $request->file('cover_image')
            ->store('public');
    }

    private function uploadPdf($request)
    {
        if ($request->has('pdf')) {
            \Storage::disk('public')->put('pdfs/', $request->file('pdf'));
            return $request->file('pdf')
                ->store('public');
        }
        return null;

    }

    public function submitFormCreateBook(SubmitFormCreateBookRequest $request)
    {
        $path      = str_replace("public/", "", $this->uploadImage($request));
        $pathPdf   = str_replace("public/", "", $this->uploadPdf($request));
        $category  = BookCategory::create(['name' => $request->get('category')]);
        $publisher = BookPublisher::create(['name' => $request->get('publisher_name')]);
        $author    = BookAuthor::create(['name' => $request->get('author_name')]);
        $data      = array(
            'name'              => $request->get('name'),
            'user_id'           => auth()->user()->id,
            'book_category_id'  => $category->id,
            'book_publisher_id' => $publisher->id,
            'book_author_id'    => $author->id,
            'total_chapter'     => $request->get('total_chapter'),
            'total_page'        => $request->get('total_page'),
            'cover_page'        => $path,
            'description'       => $request->get('description'),
            'pdf'               => $pathPdf,
//            'status'             => $request->get('status')
        );

        Books::create($data);
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.books');
        } else {
            return redirect()->route('home.view-book');
        }

    }


    public function viewCreateBook()
    {
//        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
//            ->orderBy('created_at', 'DESC');
//
//        return view('home.view-create-book',$data);
        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);

        return view("home.view-create-book", $data);
    }


    public function viewFormEditBook(EditBookFormRequest $request)
    {
        $data = Books::find($request->id);

        return view('home.view-form-editBook', ['data' => $data]);
    }

    public function submitEditBook(EditBookFormRequest $request)
    {
        //dd($request->all());

        $path      = str_replace("public/", "", $this->uploadImage($request));
        $category  = BookCategory::create(['name' => $request->get('category')]);
        $publisher = BookPublisher::create(['name' => $request->get('publisher_name')]);
        $author    = BookAuthor::create(['name' => $request->get('author_name')]);

        $data = array(
            'book_categories_id' => $category->id,
            'book_author_id'     => $publisher->id,
            'book_publisher_id'  => $author->id,
            'name'               => $request->get('name'),
            'total_chapter'      => $request->get('total_chapter'),
            'total_page'         => $request->get('total_page'),
            'cover_path'         => $path,
            'description'        => $request->get('description'),
            'status'             => $request->get('status')
        );


        Books::find($request->id)->update($data);
        return redirect()->route('book.list');
    }

    public function deleteBook(DeleteBookRequest $request)
    {
        Books::find($request->id)->delete();
        return redirect()->route('book.list');
    }

    public function recordAudio()
    {
        return view('home.view-new-record');
    }

    public function viewListening()
    {
        return view('home.listening');
    }


}
