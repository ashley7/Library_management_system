@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Add Book</h2>

                <div class="card-body">
                    <!-- <form> -->
                        <label>Choose Book Title</label>
                        <select id="booktitle_id" class="form-control">
                            <option></option>
                        @foreach($book_titles as $title)
                            <option value="{{$title->id}}">{{$title->name}}</option>
                        @endforeach    
                        </select>                       

                        <label>Enter serial number</label>
                        <input type="text" id="serial_number" class="form-control">

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
     $("#booktitle_id").chosen();
    // $("#book_id").chosen();
    $("#save_title").click(function() {
         $("#save_title").attr("disabled", true);
         $('#save_title').text("Processing ...");
         $('#main_text').text("");
        $.ajax({
                type: "POST",
                url: "{{ route('book.store') }}",
            data: {
                book_title_id: $("#booktitle_id").val(),
                serial_number: $("#serial_number").val(),
                _token: "{{Session::token()}}"
            },
            success: function(result){
                // alert(result)
                $('#main_text').text(result);
                // $('#booktitle_id').val(" ")
                $('#serial_number').val(" ")

                $("#save_title").attr("disabled", false);
                $('#save_title').text("Add new book");
              }
        })
    });
</script>
@endpush
