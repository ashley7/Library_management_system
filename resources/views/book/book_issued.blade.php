@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">Books issued to Users</h2>

                
                <div class="card-body">
                    <a href="{{route('book_user.create')}}" style="float: right;" class="btn btn-primary">Add book user</a>
                <br><br>
                    <table class="table table-hover" id="book_list">
                        <thead>
                            <th>Date issued</th> <th>Name</th> <th>Number</th> <th>Type</th> 
                            <th>Book title</th> <th>Status</th>  <th>By</th> <th>Return date</th> <th>Actions</th>
                        </thead>

                        <tbody>
                            @foreach($book_issues as $user)
                              <tr>
                                  <td>{{$user->created_at}}</td>
                                  <td>{{$user->bookuser->name}}</td>
                                  <td>{{$user->bookuser->number}}</td>
                                  <td>{{$user->bookuser->type}}</td>
                                  <td>{{$user->book->booktitle->name}} by {{$user->book->booktitle->auther}} ({{$user->book->serial_number}})</td>
                                  <td>
                                    @if($user->status == 0)
                                     <span class="text-danger">Issued</span>
                                     @else
                                     <span class="text-success">Recieved</span>
                                    @endif 
                                  </td>
                                  
                                  <td>{{$user->action_user->name}}</td>
                                  <td>{{$user->date_issued}}</td>
                                  <td>
                                    @if($user->status == 0)
                                     <a class="btn btn-primary" href="{{route('issue_book.edit',$user->id)}}">Recieve</a>

                                     @else
                                       {{$user->updated_at}}
                                     @endif
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