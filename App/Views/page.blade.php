<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--подключили фреймворк vue.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.3/vue.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    @include('header')
    @yield('content')
    @include('footer')
</body>
</html>