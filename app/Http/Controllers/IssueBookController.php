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
use App\BookUser;
use App\Book;

class IssueBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("book.book_issued")->with(['book_issues'=>IssueBook::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['books'=>Book::all()->where('status',0),'book_user'=>BookUser::all()];
        return view("book.issue_book")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $issue_book = new IssueBook($request->all());
        $issue_book->user_id = \Auth::user()->id;
        try {
            if (IssueBook::all()->where('book_id',$request->book_id)->where('status','0')->count() == 0) {
                $issue_book->save();
                $book = Book::find($issue_book->book_id);
                $book->status = 1;
                $book->save();
                echo "Saved";
            }else{
                echo "Book is not in Library now.";
            }            

            // set book to not available        
         } catch (\Exception $e) {
            echo "Operation failed. ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $read_issuebook = IssueBook::find($id);
        $read_issuebook->status = 1;
        $read_issuebook->user_id = \Auth::user()->id;
        $read_issuebook->save();

        $avail_book = Book::find($read_issuebook->book_id);
        $avail_book->status = 0;
        $avail_book->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
