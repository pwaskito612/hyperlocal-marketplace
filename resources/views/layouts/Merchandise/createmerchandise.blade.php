<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    @include('includes.style')
</head>
<body>
    @include('pages.Merchandise.createmerchandise');
    @include('includes.js')
</body>
</html>