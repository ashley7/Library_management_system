@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">Book titles</h2>

                
                <div class="card-body">
                    <a href="{{route('book_title.create')}}" style="float: right;" class="btn btn-primary">Add book title</a>
                <br><br>
                    <table class="table table-hover" id="book_list">
                        <thead>
                             <th>Title</th> <th>Author</th> <th>Location</th> <th>ISBN</th> <th>Number of Books</th> <th>Books Available</th> <th>Books Not Available</th> <th>Actions</th>
                        </thead>

                        <tbody>
                            @foreach($book_titles as $titles)
                            <?php
                              $counter = 0;
                             ?>
                              <tr>
                                  <td>{{$titles->name}}</td>
                                  <td>{{$titles->auther}}</td>
                                  <td>{{$titles->location}}</td>
                                  <td>{{$titles->isbn}}</td>
                                  <td>{{$titles->book->count()}}</td>
                                  <td>
                                    @foreach($titles->book as $books)
                                      @if($books->status == 1)
                                        <?php $counter++; ?>
                                      @endif 
                                    @endforeach

                                    {{$titles->book->count() - $counter}}
                                  </td>
                                  <td>{{$counter}}</td>
                                  <td>
                                    <a href="{{route('book_title.show',$titles->id)}}" class="btn btn-primary">View Books</a>
                                  </td>
                              </tr>
                            @endforeach                            
                        </tbody>
                    </table>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@include('layouts.datatable')