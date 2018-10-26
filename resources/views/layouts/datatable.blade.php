@push('scripts')
     <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>

    <script>
       $(document).ready(function() {
            $('#book_list').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excel',
                      
                    },
                    {
                        extend: 'pdf',                        
                    },
                    {
                        extend: 'print',
                        messageTop: null
                    }
                ]
            } );
        } );
    </script>
@endpush