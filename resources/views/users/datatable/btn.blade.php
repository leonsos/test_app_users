<form action="{{route('users.delete',$id)}}">
    @csrf
    @method('delete')
    <a href="{{route('users.edit',$id)}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
</form>