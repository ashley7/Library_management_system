<?php

namespace App;

/*
 THIS SOFTWARE WAS WRITTEN BY 

 AUTHOR: THEMBO CHARLES LWANGA
 EMAIL: ashley7520charles@gmail.com
 PHONE: +256787444081

*/ 

use Illuminate\Database\Eloquent\Model;

class BookTitle extends Model
{
    protected $fillable = ['name','auther','isbn','location'];

    public function book()
    {
    	return $this->hasMany('App\Book');
    }
}
