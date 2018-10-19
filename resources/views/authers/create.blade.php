<form method="post" action=" {{ route('customers.store') }} ">
    @csrf
    <input type="text" name = "name" placeholder="nhap ten" >
    <input type="text" name = "dob" placeholder="nhap dob" >
    <input type="text" name = "email" placeholder="nhap email" >
    <div class="form-group">
        <label for="exampleFormControlSelect1">Tỉnh thành</label>
        <select class="form-control" name="city_id">
            @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
    <input type="text"
           class="form-control"
           id="inputFileName"
           name="inputFileName">
    <input type="file"
           class="form-control-file"
           id="inputFile"
           name="inputFile">
    <input type="submit" value="submit">
</form>