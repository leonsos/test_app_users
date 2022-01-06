@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Edit User') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                   
                    <form action="{{route('users.update',$users->id)}}" method="POST" class="row g-3">
                        @csrf
                        {{-- <form class="row g-3"> --}}
                        {{-- @foreach ($users as $user) --}}
                            
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Name</label>
                          <input type="text" class="form-control" id="inputEmail4" value="{{$users->name}}" name="name">
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">Email</label>
                          <input type="email" class="form-control" id="inputPassword4" name="email" readonly value="{{$users->email}}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputEmail4" value="" name="password">
                          </div>
                          <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password confirm</label>
                            <input type="password" name="password_confirm" class="form-control" id="inputPassword4">
                          </div>
                          <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="inputEmail4" value="{{$users->phone}}" name="phone">
                          </div>
                          <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">date of birth</label>
                            <input type="date" class="form-control" id="inputPassword4" max="2004-01-01" value="{{$users->date_of_birth}}" name="date_of_birth">
                          </div>
                        {{-- @endforeach --}}
                            {{-- <div class="col-12">
                              <label for="inputAddress" class="form-label">Address</label>
                              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="col-12">
                              <label for="inputAddress2" class="form-label">Address 2</label>
                              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                            </div> --}}
                            <div class="col-md-6">
                              <label for="inputCity" class="form-label">Pais</label>
                              <input type="text" class="form-control" id="inputCity" value="">
                            </div>
                            <div class="col-md-4">
                              <label for="inputState" class="form-label">city</label>
                              <select id="inputState" class="form-select">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="col-md-2">
                              <label for="inputZip" class="form-label">Dni</label>
                              <input type="text" class="form-control" id="inputZip" readonly value="{{$users->dni}}" name="dni">
                            </div>
                            
                          {{-- </form> --}}
                        {{-- <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Contact</label>
                            <input type="email" class="form-control @error('contact') is-invalid @enderror" id="exampleFormControlInput1" placeholder="name@example.com" name="contact">
                        </div>
                        @error('date_of_birth')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Send my CV" name="subject">
                        </div>
                        @error('date_of_birth')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Body message</label>
                            <textarea class="form-control @error('body') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" placeholder="Hi uncle how are yo?" name="body"></textarea>
                        </div>
                        @error('date_of_birth')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror --}}
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
