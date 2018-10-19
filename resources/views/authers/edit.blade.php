<form method="post" action=" {{ route('customers.update', $customer->id) }} ">
    @csrf
    <input type="text" name = "name" value="{{ $customer->name }}" >
    <input type="text" name = "dob" value="{{ $customer->dob }}" >
    <input type="text" name = "email" value="{{ $customer->email }}" >
    <div class="form-group">
        <select class="form-control" name="city_id" value="{{ $customer->city_id }}">
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