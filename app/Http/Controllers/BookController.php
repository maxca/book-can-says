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

class BookController extends Controller
{


    public function viewWelcome(){
        return view("home.index");
    }

    public function viewBook(){
        $books = Books::all()
            ->sortByDesc('created_at')
            ->toArray();
        return view("home.view-book",compact('books'));
    }


    public function viewFormCreateBook()
    {
        // get category data for create view
        // in view relationship can be 1-1 only
        // because view can select only one category per book
        // if you want to select multiple you just create check box input
        // and then send input category by array value $bookCategory[0] or get value by simple request like
        // $request->bookCategory;
        // cat many to many if you want to do it ,something you just do it is , pivot table why not ?
        // because Book table just can save only 1 value of category per book right ?
        // step for create book via multiple category
        // 1. crete book
        // 2. when you create book success you can get book id for next step
        // 3. create bookCategory by bookId and CategoryId
        // 4. getting data with pivot table  and important bookCategory not create for this step.
        // bookCategory can create before that . that mean the category of book can create by alone via backoffice
        // view can call category and using by model like bellow this. -->
        $data['category'] = BookCategory::all();
        return view('home.form')->with($data);
    }

    public function submitFormCreateBook(SubmitFormCreateBookRequest $request)
    {
        //dd หยุดการcompile code
//            dd($request->all());


        $path      = str_replace("public/","",$this->uploadImage($request));
        $category  = BookCategory::create(['name'=>$request->get('category')]);
        $publisher = BookPublisher::create(['name' =>$request->get('publisher_name')]);
        $author    = BookAuthor::create(['name' =>$request->get('author_name')]);

        $data = array(
            'name'          => $request->get('name'),
            'book_category_id' => $category->id,
            'book_publisher_id'    => $publisher->id,
            'book_author_id' => $author->id,
            'total_chapter'      => $request->get('total_chapter'),
            'total_page'         => $request->get('total_page'),
            'cover_page'         => $path,
            'description'        => $request->get('description'),
            'status'             => $request->get('status')
        );

            Books::create($data);

            return redirect()->route('view-create-book',compact('data'));


    }

    public function viewCreateBook(){
        $data = Books::all()
            ->toArray();
        return view("home.view-create-book",compact('data'));
    }

    private function uploadImage($request)
    {
       return \Storage::disk('public')->put('images/',$request->file('cover_image'));
        return $request->file('cover_image')
            ->store('public/images');
    }

    public function viewFormEditBook(EditBookFormRequest $request){
        $data = Books::find($request->id);
        return view('blog.form-edit',['data'=>$data]);
    }

    public function submitEditBook(EditBookFormRequest $request){
        //dd($request->all());

        $path      = str_replace("public/","",$this->uploadImage($request));
        $category  = BookCategory::create(['name'=>$request->get('category')]);
        $publisher  = BookPublisher::create(['name'=>$request->get('publisher_name')]);
        $author  = BookAuthor::create(['name'=>$request->get('author_name')]);

        $data = array(
            'book_categories_id' => $category->id,
            'book_author_id'    => $publisher->id,
            'book_publisher_id' => $author->id,
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

    public function deleteBook(DeleteBookRequest $request){
        Books::find($request->id)->delete();
        return redirect()->route('book.list');
    }

    public function recordAudio(){
        return view('home.view-new-recorder');
    }

    public function viewListening(){
        return view('home.listening');
    }



}
