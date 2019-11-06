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
use RealRashid\SweetAlert\Facades\Alert;
use App\Providers\SweetAlertServiceProvider;

class BookController extends Controller
{


    public function viewWelcome()
    {
        return view("home.index");
    }

    public function viewBook()
    {

//        $fliter = $request->get('category');
        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->where('publish_status', 'publisher')
//            ->where('book_category_id','=',$fliter)
            //  ->where('user_id',auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
        return view("home.view-book", $data);


    }


    public function viewBookCategory(Request $request)
    {
        $fliter = $request->get('category');
        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->where('publish_status', 'publisher')
            ->where('book_category_id', '=', $fliter)
            //  ->where('user_id',auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
        return view("home.view-book-category", $data);


    }


    public function viewBlind(Request $request)
    {

//        $fliter = $request->get('category');

        $book = Books::with('authors', 'category', 'publisher', 'chapter', 'audio');
        if ($request->has('category')) {
            $book = $book->where('book_category_id', $request->get('category'));
        }

        $book = $book->whereHas('audio')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);

        $data['books'] = $book;
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
       //return null;
    }

    public function submitFormCreateBook(SubmitFormCreateBookRequest $request)
    {


        $path = str_replace("public/", "", $this->uploadImage($request));
        $pathPdf = str_replace("public/", "", $this->uploadPdf($request));
//        $category = BookCategory::create(['name' => $request->get('category')]);
        $publisher = BookPublisher::create(['name' => $request->get('publisher_name')]);
        $author = BookAuthor::create(['name' => $request->get('author_name')]);
        $data = array(
            'name' => $request->get('name'),
            'user_id' => auth()->user()->id,
            'book_category_id' => $request->get('category'),
            'book_publisher_id' => $publisher->id,
            'book_author_id' => $author->id,
            'total_chapter' => $request->get('total_chapter'),
            'total_page' => $request->get('total_page'),
            'cover_page' => $path,
            'description' => $request->get('description'),
            'pdf' => $pathPdf,
//            'status'             => $request->get('status')
        );


        Books::create($data);
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.books')->with('alert', 'สร้างข้อมูลหนังสือสำเร็จ');
        } else {
            return redirect()->route('home.view-book-list')->with('alert', 'สร้างข้อมูลหนังสือสำเร็จ');
        }

    }


    public function viewCreateBook()
    {

        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);

        return view("home.view-create-book", $data);
    }


    public function viewFormEditBook(EditBookFormRequest $request)
    {
        $data = Books::where('id', $request->id)->with('authors', 'category', 'publisher', 'chapter')->first();

        return view('home.view-edit-form', ['data' => $data]);

    }

    public function updateEditBook(EditBookFormRequest $request)
    {
//        $data = Books::find($request->id);
//        $data->update($request->all());
        $book = Books::where('id', $request->id)
            ->with('authors', 'category', 'publisher', 'chapter')->first();
        foreach ($book->authors as $key => $authors) {
            $authors->name = $request->get('author_name');
            $authors->save();
        }
        foreach ($book->publisher as $key => $publisher) {
            $publisher->name = $request->get('publisher_name');
            $publisher->save();
        }

        $books = array(
            'book_categories_id' => $request->get('category'),
            'book_author_id' => $publisher->id,
            'book_publisher_id' => $authors->id,
            'name' => $request->get('name'),
//            'total_chapter' => $request->get('total_chapter'),
//            'total_page' => $request->get('total_page'),
//            'description' => $request->get('description'),
            'status' => $request->get('status')
        );
        //dd($books);


        $book->update($books);

        return redirect()->route('home.view-book-list')
            ->with(['data' => $book]);

    }


    public function deleteBook(DeleteBookRequest $request)
    {

        $books = Books::find($request->id)->delete();
        BookAudio::where('book_id', $request->id)->delete();
        return redirect()->route('home.view-book-list')->with('alert', 'ลบข้อมูลหนังสือสำเร็จ');

    }

    public function submitEditBook(EditBookFormRequest $request)
    {
        $path = str_replace("public/", "", $this->uploadImage($request));
//        $category = BookCategory::create(['name' => $request->get('category')]);
        $publisher = BookPublisher::create(['name' => $request->get('publisher_name')]);
        $author = BookAuthor::create(['name' => $request->get('author_name')]);

        $data = array(
            'book_categories_id' => $request->get('category'),
            'book_author_id' => $publisher->id,
            'book_publisher_id' => $author->id,
            'name' => $request->get('name'),
            'total_chapter' => $request->get('total_chapter'),
            'total_page' => $request->get('total_page'),
            'cover_path' => $path,
            'description' => $request->get('description'),
            'status' => $request->get('status')
        );

//        Alert::success('Success Title', 'Success Message');

        Books::find($request->id)->update($data);
        return redirect()->route('home.view-book-list');
    }

    public function recordAudio()
    {
        $data = Books::with('authors', 'category', 'publisher', 'chapter')
            ->where('publish_status', 'publisher')->first();
        return view('home.view-new-record')->with(['data'=>$data]);
    }

    public function viewListening()
    {
        return view('home.listening');
    }

    public function viewBookList()
    {
        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
        return view('admin.view-book-list', $data);
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
//        $posts = Books::table('posts')
        $data['books'] = Books::with('authors', 'category', 'publisher', 'chapter')
            ->where('name', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
//        return $data;
        return view("home.view-book", $data);

    }


    public function switchModes(Request $request)
    {
        $book = Books::with('authors', 'category', 'publisher', 'chapter', 'audio');
        if ($request->has('category')) {
            $book = $book->where('book_category_id', $request->get('category'));
        }

        $book = $book->whereHas('audio')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);

        $data['books'] = $book;
        return view("home.view-blind-d", $data);

    }

}
