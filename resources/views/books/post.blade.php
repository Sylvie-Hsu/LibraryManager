<div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Press</th>
                                                <th>Year</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($books as $book)
                                                <th scope="row">{{ $book->bno }}</th>
                                                <td>{{$book->title}}</td>
                                                <td>{{$book->category}}</td>
                                                <td>{{$book->author}}</td>
                                                <td>{{$book->press}}</td>
                                                <td>{{$book->year}}</td>
                                                <td>{{$book->price}}</td>
                                                <td>{{$book->total}}</td>
                                                <td><span class="badge badge-success">{{$book->stock}}</span></td>
                                                @endforeach
                                            </tr>
                                    
{{--                                             <tr>
                                                <th scope="row">2</th>
                                                <td>Kolor Tea Shirt For Women</td>
                                                <td><span class="badge badge-success">Tax</span></td>
                                                <td>January 30</td>
                                                <td class="color-success">$55.32</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Blue Backpack For Baby</td>
                                                <td><span class="badge badge-danger">Extended</span></td>
                                                <td>January 25</td>
                                                <td class="color-danger">$14.85</td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>