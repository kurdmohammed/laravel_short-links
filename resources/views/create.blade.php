<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container ">
    <form action="/store/" method="post">
    @csrf
        <div class="form-group ">
            <label for="">Paste Your Url:</label>
            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror">
            @error('url')
            <p class='invalid-feedback'>{{$message}}</p>
            @enderror

            <div class="form-group ">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
        </div>
        </form>
    </div>
</body>

</html>