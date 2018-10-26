@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Book titles</div>

                <div class="card-body">
                    <!-- <form> -->
                        <label>Title *</label>
                        <input type="text" id="name" class="form-control">

                        <label>Auther *</label>
                        <input type="text" id="auther" class="form-control">

                        <label>Location</label>
                        <input type="text" id="location" class="form-control">

                        <label>ISBN</label>
                        <input type="text" id="isbn" class="form-control">

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
                url: "{{ route('book_title.store') }}",
            data: {
                name: $("#name").val(),
                auther: $("#auther").val(),
                isbn: $('#isbn').val(),                             
                location: $('#location').val(),                             
                _token: "{{Session::token()}}"
            },
                success: function(result){
                    // alert(result)
                    $('#main_text').text(result);
                    $('#name').val(" ")
                    $('#isbn').val(" ")
                    $('#auther').val(" ")
                    $('#location').val(" ")

                    $("#save_title").attr("disabled", false);
                    $('#save_title').text("Add new book");
                  }
        })
    });
</script>
@endpush
