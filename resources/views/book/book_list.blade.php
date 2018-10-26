@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">{{$title->name}} By {{$title->auther}}</h2>
                
                <div class="card-body">
                    <a href="{{route('book.create')}}" style="float: right;" class="btn btn-primary">Add Books</a>
                    <br><br>
                    <table class="table table-hover" id="book_list">
                        <thead>
                            <th>Serial Number</th> <th>Status</th> <th>Actions</th>
                        </thead>

                        <tbody>
                            @foreach($title->book as $books)
                              <tr>
                                   <td>{{$books->serial_number}}</td>
                                  <td>
                                    @if($books->status == 0)
                                      <span class="btn btn-success">Available</span>
                                    @else
                                       <span class="btn btn-warning">Not available</span>
                                    @endif
                                  </td>                                 
                                  <td>
                                    <form style="float: right;" action="/book/{{$books->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                         <input type="submit"  class="btn btn-danger" value="Delete" />
                                    </form>
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