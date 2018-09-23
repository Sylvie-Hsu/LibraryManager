<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books=Book::paginate(10);
        return view('bookstorage',compact('books'));
    }



    public function show()
    {
        // if(request('content')==null)
        // {
        //     $book = Book::where('bno','000')->first();
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('bno',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('category',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('title',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('press',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('year',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('author',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('price',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('total',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else if($book = Book::where('stock',request('content'))->first()){
        //     return view('booksearch', compact('book'));
        // }
        // else{
        //     $book = Book::where('bno','000')->first();
        //     return view('booksearch', compact('book'));
        // }    

        $search = request('content');
        $from = request('from');
        $to = request('to');
        $books = Book::where(function ($query) use ($search) {
                if ($search) {
                    $query->where('bno', 'like', '%' . $search . '%')
                        ->orWhere('category', 'like', '%' . $search . '%')
                        ->orWhere('title', 'like', '%' . $search . '%')
                        ->orWhere('press', 'like', '%' . $search . '%')
                        ->orWhere('year', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('total', 'like', '%' . $search . '%')
                        ->orWhere('stock', 'like', '%' . $search . '%');

                }
            })
            ->orderBy('bno', 'asc')
            ->paginate(10);

            if($from&&$to)
            {
                $books=Book::where(function ($query) use ($search) {
                if ($search) {
                    $query->where('bno', 'like', '%' . $search . '%')
                        ->orWhere('category', 'like', '%' . $search . '%')
                        ->orWhere('title', 'like', '%' . $search . '%')
                        ->orWhere('press', 'like', '%' . $search . '%')
                        ->orWhere('year', 'like', '%' . $search . '%')
                        ->orWhere('author', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('total', 'like', '%' . $search . '%')
                        ->orWhere('stock', 'like', '%' . $search . '%');

                    }
                })
                ->orderBy('bno', 'asc')
                ->paginate(10);
            }
        //追加额外参数，例如搜索条件
        // $appendData = $data->appends(array(
        //     'search' => $search,
        //     'customer_type' => $customer_type,
        //     'perPage' => $perPage,
        // ));
        return view('booksearch', compact('books'));
    }


    public function store()
    {
        $this->validate(request(),[
            'stock'=>'required|min:0'
        ]);

        $book =new Book;

        $book->bno = request('bno');
        $book->category = request('category');
        $book->title = request('title');
        $book->press = request('press');
        $book->year = request('year');
        $book->author = request('author');
        $book->price = request('price');
        $book->total = request('total');
        $book->stock = request('stock');

        $book->save();

        return redirect('/bookstorage');
    }

    public function upload()
    {
        $file=request('path');
        $conn=file_get_contents($file);
        $conn=iconv("GB2312","UTF-8",$conn);
        // $conn=str_replace("\r\n","<br/>",file_get_contents($file_path));
        $arrays=explode("\r\n",$conn);
        $key=0;
        foreach($arrays as $array)
        {
            $book[$key]=explode(" ",$array);
            $key=$key+1;
        }

        for($i=1;$i<$key;$i++)
        {
            $brand =new Book;

            $brand->bno = $book[$i][0];
            $brand->category = $book[$i][2];
            $brand->title = $book[$i][1];
            $brand->press = $book[$i][4];
            $brand->year = $book[$i][5];
            $brand->author = $book[$i][3];
            $brand->price = $book[$i][6];
            $brand->total = $book[$i][7];
            $brand->stock = $book[$i][8];

            $brand->save();
        }


        return redirect('/bookupload');
    }
}