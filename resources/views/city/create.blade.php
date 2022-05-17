<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solar Irradiance Editor</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <div class="mb-3">
        <h1>Add City</h1>
    </div>

    <form action="/city" method="POST"> 
        @csrf
        <div class="mb-3">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" placeholder="Enter city name">
        </div>

        <div class="mb-3">
            <select name="country_id" class="form-control">
                <option value="">Select Country</option>
            @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>    
            @endforeach
            </select>
        </div>

        <button type="submit">Send</button>

    </form>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>