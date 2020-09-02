

<form action="{{route('postFile')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="myfile">
    <input type="submit">
</form>
