<form class=" d-inline mt-1" action="{{url('admin/tshirts')}}" method="POST">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{{$id}}">
    <button class="btn btn-danger btn-sm" type="submit">{{$text}}</button>
</form>
