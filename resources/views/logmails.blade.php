@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <table class="table" id="mailsLogs">
                        <thead>
                          <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">user id</th>
                            <th scope="col">Log date</th>
                            <th scope="col">tables</th>
                            <th scope="col">type</th>
                            <th></th>
                          </tr>
                        </thead>                        
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
   <script>
       $(document).ready(function() {                         
            $('#mailsLogs').DataTable({
                processing:true,
                serverSider:true,
                ajax:'{!!route('mailslogs')!!}',
                columns:[
                    {data:'id'},
                    {data:'user_id'},
                    {data:'log_date'},
                    {data:'table_name'},
                    {data:'log_type'},
                    {data:'btn'},                                                                                              
                ]
            });                         
        });

   </script>
   @if ($message = Session::get('success'))
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                text: '{{ $message }}',
            })
        </script>  
    @endif
@endsection