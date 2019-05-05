<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PimController extends Controller
{
   public function welcome() {
       return 'welcome to my site';
   }

   public function viewIndex(){
       return view('home.index');
   }

   public function viewRecorder(){
       return view('home.view-recorder');
   }

   public function viewBook(){
       return view('home.view-book');
   }
}
