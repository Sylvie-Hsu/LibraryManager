<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	public function isComplete()
	{
		return false;
	}

    public function scopePrice($bno)
    {
 //   	$price=App\Book('books')->where('bno',$bno);
 //   	return App\Book::where('bno',1)->getData();
    	return $bno->where('bno',0);
    }
}
