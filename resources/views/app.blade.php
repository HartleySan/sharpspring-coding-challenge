<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title></title>
        <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
        <link href="{{ mix('css/vendor.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <App :server-data="{{ json_encode($data, JSON_UNESCAPED_SLASHES) }}">
        </App>
        <script src="{{ mix('js/manifest.js') }}">
        </script>
        <script src="{{ mix('js/vendor.js') }}">
        </script>
        <script src="{{ mix('js/app.js') }}">
        </script>
    </body>
</html>