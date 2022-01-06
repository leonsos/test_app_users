<form action="{{route('users.delete',$id)}}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
</form>
    {{-- <button type="submit" class="btn btn-primary mb-3 btn-sm ">delete</button>--}}