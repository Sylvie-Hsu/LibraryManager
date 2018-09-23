<?php

namespace App\Http\Controllers;

use App\Card;


class CardsController extends Controller
{
    public function index()
    {
        $cards=Card::all();
        return view('cardinsert',compact('cards'));
    }

    public function store()
    {

        $card =new Card;

        $card->cno = request('cno');
        $card->name = request('name');
        $card->department = request('department');
        $card->type = request('type');


        $card->save();

        return redirect('/cardinsert');
    }

    public function delete()
    {

        if($card=Card::where('cno',request('cardcno'))->first())
        {
            $borrowed=\App\Record::where([
                ['cno',request('cardcno')],
                ['return_date',null],
            ])->first();

            if(!$borrowed)
            {
                Card::where('cno',request('cardcno'))
                    ->delete();

                $info="Success";
                return view('carddelete',compact('info'));
            }
            $info="Have No-returned-book";
             return view('carddelete',compact('info'));
        }

        $info="No Card Record";
        return view('carddelete',compact('info'));
    } 
}
