<?php

namespace App\Http\Controllers;

/*
 THIS SOFTWARE WAS WRITTEN BY 

 AUTHOR: THEMBO CHARLES LWANGA
 EMAIL: ashley7520charles@gmail.com
 PHONE: +256787444081

*/ 

use Illuminate\Http\Request;
use App\Book;
use App\BookTitle;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("book.title_list")->with(['book_titles'=>BookTitle::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("book.create_book")->with(['book_titles'=>BookTitle::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save_book = new Book($request->all());
        try {
            if (Book::all()->where('serial_number',$request->serial_number)->where('book_title_id',$request->book_title_id)->count() == 0) {
                $save_book->save();
                echo "Saved";
            }else{
                echo "Book Number ".$request->serial_number." is already recorded.";
            }
            
        } catch (\Exception $e) {
            echo "Operation failed ".$e->getMessage();            
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
        //
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
        try {
            Book::destroy($id);
        } catch (\Exception $e) {}
        return back();
    }
}
