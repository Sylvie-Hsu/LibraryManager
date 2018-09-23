<?php

namespace App\Http\Controllers;

use App\Record;

class RecordsController extends Controller
{
    public function show()
    {

    	if(request('cardnum')!=null){
    		$records=\App\Record::join('books','records.bno','=','books.bno')
    			->where('cno',request('cardnum'))
    		    ->get();
            return view('recordsearch', compact('records'));
        }
		else{
            $records=\App\Book::all();
            return view('recordsearch', compact('records'));
        }    
    }

    public function store()
    {
    	$borrowbook=\App\Book::where('bno',request('borrowbno'))->first();
    	$borrowcard=\App\Card::where('cno',request('borrowcno'))->first();

    	if(request('borrowbno')==null||request('borrowcno')==null)
    	{
    		$feedback='';
    		return view('recordborrow', compact('feedback'));
    	}

    	if($borrowbook->stock > 0)
    	{
    		if($borrowcard)
    		{
    			\App\Book::where('bno',request('borrowbno'))
                    ->decrement('stock');

    			$record = new Record;

    			$record->bno = request('borrowbno');
    			$record->cno = request('borrowcno');
    			$record->borrow_date = now();
                $record->manager_id = 'admin';

                $record->save();

    			$feedback='Borrow Success';
    			return view('recordborrow', compact('feedback'));
    		}
    		$feedback='Incorrect Permission';
    		return view('recordborrow', compact('feedback'));
    	}
    	$feedback='Stock Shortage';
    	return view('recordborrow', compact('feedback'));
    }

    public function index()
    {
    	$returnbook=\App\Book::where('bno',request('returnbno'))->first();
    	$returncard=\App\Card::where('cno',request('returncno'))->first();
        $borrowed=Record::where([
            ['bno',request('returnbno')],
            ['cno',request('returncno')],
            ['return_date',null],
        ])->get();

    	if($returnbook)
    	{
    		if($returncard)
    		{
    			if($borrowed)
    			{
                    Record::where([
                        ['bno',request('returnbno')],
                        ['cno',request('returncno')],
                        ['return_date',null],
                        ])
                        ->update(['return_date'=>now()]);

                    \App\Book::where('bno',request('returnbno'))
                        ->increment('stock');				

    				$feedbacks='Return Success';
    				return view('recordreturn', compact('feedbacks'));
    			}
    			$feedbacks='No borrow record';
    			return view('recordreturn', compact('feedbacks'));
    		}
    		$feedbacks='Incorrect Permission';
    		return view('recordreturn', compact('feedbacks'));
    	}
    	$feedbacks='Incorrect Book';
    	return view('recordreturn', compact('feedbacks'));
    }
}
