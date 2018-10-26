@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Issue Books</h2>

                <div class="card-body">
                    <!-- <form> -->
                        <label>Choose Book</label>
                        <select id="book_id" class="form-control">
                            <option></option>
                        @foreach($books as $book)
                            <option value="{{$book->id}}">{{$book->booktitle->name}} ({{$book->serial_number}})</option>
                        @endforeach    
                        </select>                       

                        <label>Book User</label>
                        <select id="book_user_id" class="form-control">
                            <option></option>
                        @foreach($book_user as $user)
                            <option value="{{$user->id}}">{{$user->name}} ({{$user->type}} - {{$user->number}})</option>
                        @endforeach    
                        </select> 

                        <label>Return date</label>
                        <input type="date" id="date_issued" class="form-control">
                        <br><br>
                        <button id="save_title" class="btn btn-primary">Save</button>
                    <!-- </form>--> 

                    <br><br>
                    <p id="main_text"></p>                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">

    $("#book_user_id").chosen();
    $("#book_id").chosen();

    $("#save_title").click(function() {
         $("#save_title").attr("disabled", true);
         $('#save_title').text("Processing ...");
         $('#main_text').text("");
        $.ajax({
                type: "POST",
                url: "{{ route('issue_book.store') }}",
            data: {
                book_user_id: $("#book_user_id").val(),
                book_id: $("#book_id").val(),
                date_issued: $("#date_issued").val(),
                _token: "{{Session::token()}}"
            },
            success: function(result){
                // alert(result)
                $('#main_text').text(result);
                $('#date_issued').val(" ")

                $("#save_title").attr("disabled", false);
                $('#save_title').text("Issue next book");
              }
        })
    });
</script>
@endpush