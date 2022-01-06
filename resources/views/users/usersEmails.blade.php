@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive"  style="padding:1.25rem;">
            <div class="text-button" style="display: flex;justify-content:space-between;">
                <h2 class="mb-4 h5">{{ __('Emails send') }}</h2>
                {{-- <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Create</button>            --}}
            </div>

            <table class="table table-hover" id="users">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Name') }}</th>
                        <th class="border-gray-200">{{ __('contact') }}</th>
                        <th class="border-gray-200">{{ __('subject') }}</th>
                        <th class="border-gray-200">{{ __('body') }}</th>
                        <th></th>                        
                    </tr>
                </thead> 
                <tbody>
                    @foreach ($getData as $data)
                        <tr>
                            <td><span class="fw-normal">{{ $data->name }}</span></td>
                            <td><span class="fw-normal">{{ $data->contact }}</span></td>
                            <td><span class="fw-normal">{{ $data->subject }}</span></td>
                            <td><span class="fw-normal">{{ $data->body }}</span></td>
                            <td>
                                <form action="#" method="post">
                                    <a href="" class="btn btn-primary btn-sm">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>                          
                        </tr>
                    @endforeach
                </tbody>               
            </table>
            {{-- <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $users->links() }}
            </div> --}}
        </div>
    </div>
    @include('modalAdd')
@endsection

@section('scripts')
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
   <script>
       $(document).ready(function() {
            $('#users').DataTable();           
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