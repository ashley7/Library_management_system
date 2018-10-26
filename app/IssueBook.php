<?php

namespace App;

/*
 THIS SOFTWARE WAS WRITTEN BY 

 AUTHOR: THEMBO CHARLES LWANGA
 EMAIL: ashley7520charles@gmail.com
 PHONE: +256787444081

*/ 

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    protected $fillable = ['book_user_id','book_id','user_id','date_issued'];

    public function bookuser()
    {
    	return $this->belongsTo('App\BookUser','book_user_id');
    }

    public function book()
    {
    	return $this->belongsTo('App\Book','book_id');
    }

    public function action_user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
