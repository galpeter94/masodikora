<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CopyController extends Controller
{
   
    public function copiesCount($title){
        $pieces = DB::table('copies as c')
        ->join('books as b', 'c.book_id', 'b.id')
        ->where('author', $author)
        ->where('title', $title)
        ->count();
        
        return $pieces;
    }

}
