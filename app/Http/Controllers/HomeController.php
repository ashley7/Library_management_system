<?php

namespace App\Http\Controllers;

/*
 THIS SOFTWARE WAS WRITTEN BY 

 AUTHOR: THEMBO CHARLES LWANGA
 EMAIL: ashley7520charles@gmail.com
 PHONE: +256787444081

*/ 

use Illuminate\Http\Request;
use App\IssueBook;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view("book.book_issued")->with(['book_issues'=>IssueBook::all()->where('status',0)]);
        return view("home");
    }
}