@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} de user</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                               My Data..
                            </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                @if (auth()->check())
                                    <div class="row justify-content-center">
                                        <div class="col-md-4"><strong>Name: {{auth()->user()->name}}</strong></div>
                                        <div class="col-md-4"><strong>Email: {{auth()->user()->email}}</strong></div>
                                        <div class="col-md-4"><strong>Phone: {{auth()->user()->phone}}</strong></div>                                   
                                    </div>  
                                    <div class="row justify-content-center">                                   
                                        <div class="col-md-4"><strong>Dni: {{auth()->user()->dni}}</strong></div>
                                        <div class="col-md-4"><strong>Date birth: {{auth()->user()->date_of_birth}}</strong></div>
                                        <div class="col-md-4"><strong>City: {{auth()->user()->code_of_city}}</strong></div>
                                    </div>                     
                                @endif
                            </div>
                            </div>
                        </div>                       
                    </div>
                    <form action="{{route("users.senddata")}}" method="POST">
                        @csrf
                        <div class="mb-3">
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
                        @enderror
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
