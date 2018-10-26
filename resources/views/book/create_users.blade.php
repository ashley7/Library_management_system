@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Add Book User</h2>

                <div class="card-body">
                    <!-- <form> -->
                        <label>Name</label>
                        <input type="text" id="name" class="form-control">

                        <label>Choose Book Title</label>
                        <select id="type" class="form-control">
                            <option></option>
                            <option value="student">Student</option>
                            <option value="staff">Staff</option>                           
                        </select>                       

                        <label>Enter number</label>
                        <input type="text" id="number" class="form-control">

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
    $("#save_title").click(function() {
         $("#save_title").attr("disabled", true);
         $('#save_title').text("Processing ...");
         $('#main_text').text("");
        $.ajax({
                type: "POST",
                url: "{{ route('book_user.store') }}",
            data: {
                name: $("#name").val(),
                number: $("#number").val(),
                type: $("#type").val(),
                _token: "{{Session::token()}}"
            },
            success: function(result){
                // alert(result)
                $('#main_text').text(result);
                $('#name').val(" ")
                $('#number').val(" ")
                $('#type').val(" ")

                $("#save_title").attr("disabled", false);
                $('#save_title').text("Add new user");
              }
        })
    });
</script>
@endpush