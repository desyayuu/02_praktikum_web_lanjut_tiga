<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function edugames(){
        return 'Halaman edu games';
    }
    public function kidsgames(){
        return 'Halaman kids games';
    }
    public function riristory(){
        return 'Halaman riri story books' ;
    }
    public function kolakkids(){
        return "Halaman kolak kids songs" ;
    }
}
