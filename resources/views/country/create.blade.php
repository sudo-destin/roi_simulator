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
        <h1>Add country</h1>
    </div>

        <form action="/country" method="POST">    

        @csrf
        <div class="mb-3">
            <label for="country">Country</label>
            <input type="text" class="form-control" name="name" placeholder="Enter country name">
        </div>

        <button type="submit">Send</button>
     
    </form>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>