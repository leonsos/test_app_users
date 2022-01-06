@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Create User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                   
                    <form action="{{route('users.store')}}" method="POST" class="row g-3">
                        @csrf                        
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Name</label>
                          <input type="text" class="form-control" id="inputEmail4" name="name">
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">Email</label>
                          <input type="email" class="form-control" id="inputPassword4" name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputEmail4" name="password">
                          </div>
                          <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password confirm</label>
                            <input type="password" name="password_confirm" class="form-control" id="inputPassword4">
                          </div>
                          <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="inputEmail4" name="phone">
                          </div>
                          <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">date of birth</label>
                            <input type="date" class="form-control" id="inputPassword4" max="2004-01-01" name="date_of_birth">
                          </div>                        
                          <div class="col-md-4">
                            <label for="inputState" class="form-label">country</label>
                            <select class="form-select" id="country">
                              <option selected>Choose...</option>
                              @foreach ($country as $list)
                                  <option value="{{$list->id}}">{{$list->name}}</option>
                              @endforeach
                            </select>
                          </div>
                            <div class="col-md-4">
                              <label for="inputState" class="form-label">state</label>
                              <select class="form-select" id="state">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label for="inputState" class="form-label">city</label>
                              <select  class="form-select" id="city" name="code_of_city">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="inputZip" class="form-label">Dni</label>
                              <input type="text" class="form-control" id="inputZip" name="dni">
                            </div>                           
                         
                    </div>
                    <div class="card-footer" style="display: flex;justify-content:space-between;">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  $(document).ready(function() {
      jQuery("#country").change(function () {
        let cid=jQuery(this).val()
        $.ajax({
            url:'{!!route('getstate')!!}',
            type:'post',
            data:'cid='+cid+'&_token={{csrf_token()}}',
            success:function(response){
              jQuery("#state").html(response)
            }
        });
      });
      jQuery("#state").change(function () {
        let sid=jQuery(this).val()
        $.ajax({
            url:'{!!route('getcity')!!}',
            type:'post',
            data:'sid='+sid+'&_token={{csrf_token()}}',
            success:function(response){
              jQuery("#city").html(response)
            }
        });
      })          
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
