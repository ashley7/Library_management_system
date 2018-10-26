<?php

namespace App;

/*
 THIS SOFTWARE WAS WRITTEN BY 

 AUTHOR: THEMBO CHARLES LWANGA
 EMAIL: ashley7520charles@gmail.com
 PHONE: +256787444081

*/ 

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['serial_number','book_title_id'];

    public function booktitle()
    {
    	return $this->belongsTo('App\BookTitle','book_title_id');
    }
}
