<?php

namespace App\Http\Controllers;

use App\Manager;

class ManagersController extends Controller
{

    public function index()
    {

    	if($manager = Manager::where('id',request('managerid'))->first()){
    		if(request('password') == $manager->password)
    		{
    			return view('layout',compact('manager','iderror','pswerror'));
    		}
    		else{
    			$iderror='';
    	   	 	$pswerror='Password Error';
    			return view('login', compact('iderror','pswerror'));
    		}
    	}
    	else
    	{
    		$iderror='Manager ID Error';
    	   	$pswerror='';
    		return view('login', compact('iderror','pswerror'));
    	}
    }

     public function store()
    {

        $manager =new Manager;

        $manager->id = request('id');
        $manager->password = encrypt(request('password'));
        $manager->mana_name = request('mana_name');
        $manager->contact = request('contact');


        $card->save();

        return redirect('/cardinsert');
    }
}
