<?php

namespace App;

/*
 THIS SOFTWARE WAS WRITTEN BY 

 AUTHOR: THEMBO CHARLES LWANGA
 EMAIL: ashley7520charles@gmail.com
 PHONE: +256787444081

*/ 

use Illuminate\Database\Eloquent\Model;


class BookUser extends Model
{
    protected $fillable = ['name','number','type'];
}
