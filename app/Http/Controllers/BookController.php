<?php

namespace App\Http\Controllers;

use App\BookAuthor;
use App\BookPublisher;
use App\Http\Requests\DeleteBookRequest;
use App\Http\Requests\EditBookFormRequest;
use Illuminate\Http\Request;
use App\BookCategory;
use App\Books;
use App\Http\Requests\SubmitFormCreateBookRequest;


class BookController extends Controller
{
    public function createCategory(){

        return BookCategory::create(['name'=>'general']);

    }

    public function createPublisher(){

        return BookPublisher::create(['name'=>'salmon']);

    }

    public function createAuthor(){

        return BookAuthor::create(['name'=>'Thanachart']);

    }

    public function createBook(){
        $category  = BookCategory::find(1);
        $publisher = BookPublisher::create(['name' => 'samark.ltd']);
        $author    = BookAuthor::create(['name' => 'samark']);

        $data = array(
            'name'          => 'New York 1st Time',
            'book_categories_id' => $category->id,
            'book_author_id'    => $publisher->id,
            'book_publisher_id' => $author->id,
            'total_chapter'      => 10,
            'total_page'         => 50,
            'cover_path'         => '/path/mock',
            'description'        => 'ok',
            'status'             => 'active'
        );

        return Books::create($data);
    }

    public function viewCreateBook(){

        $data = Books::paginate(3);
        return view('blog.create-book', ['data' => $data]);

    }

    public function viewFormCreateBook()
    {
        return view('blog.form');
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
            'book_categories_id' => $category->id,
            'book_author_id'    => $publisher->id,
            'book_publisher_id' => $author->id,
            'total_chapter'      => $request->get('total_chapter'),
            'total_page'         => $request->get('total_page'),
            'cover_path'         => $path,
            'description'        => $request->get('description'),
            'status'             => $request->get('status')
        );

        return Books::create($data);
    }

    private function uploadImage($request)
    {
        return $request->file('cover_image')->store('public/images');
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



}
