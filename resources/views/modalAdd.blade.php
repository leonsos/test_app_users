<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route("users.store")}}" method="POST">   
              @csrf       
            <div class="row g-3">
                <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" aria-label="First name">
                </div>
                @error('name')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <div class="col">
                    <label for="name" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="oswald@yahoo.com" aria-label="Last name">
                </div>
                @error('email')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col">
                    <label for="name" class="form-label">Passoword</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="*****" aria-label="First name">
                </div>
                @error('password')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <div class="col">
                    <label for="name" class="form-label">Confirm password</label> 
                  <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="repeat ****" aria-label="Last name">
                </div>
                @error('password_confirmation')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col">
                    <label for="name" class="form-label">Dni</label>
                  <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" placeholder="2324241" aria-label="First name">
                </div>
                @error('dni')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
                <div class="col">
                    <label for="name" class="form-label">Phone number</label>
                  <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="+542 232939239" aria-label="Last name">
                </div>
                @error('phone')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col">
                    <label for="name" class="form-label">date of birth</label>
                    <input type="date" id="start" name="date_of_birth" value="" min="2018-01-01" max="2018-12-31" class="form-control @error('date_of_birth') is-invalid @enderror">                  
                </div>
                @error('date_of_birth')
                <div class="invalid-feedback"> {{ $message }} </div>
                 @enderror
                <div class="col">
                    <label for="city" class="form-label">city</label>
                  <input type="text" name="code_of_city" class="form-control @error('code_of_city') is-invalid @enderror" placeholder="+542 232939239" aria-label="Last name">
                </div>
                @error('code_of_city')
                <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>