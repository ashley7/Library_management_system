@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-header">Book Users</h2>

                
                <div class="card-body">
                    <a href="{{route('book_user.create')}}" style="float: right;" class="btn btn-primary">Add book user</a>
                <br><br>
                    <table class="table table-hover" id="book_list">
                        <thead>
                            <th>Name</th> <th>Number</th> <th>Type</th> <th>Actions</th>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                              <tr>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->number}}</td>
                                  <td>{{$user->type}}</td>
                                  <td>
                                    <form style="float: right;" action="/book_user/{{$user->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this book user?');">
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