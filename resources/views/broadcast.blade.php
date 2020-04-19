<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pusher Test</title>
</head>
<body>
    

    <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>

    
    
    <!--<script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
        var key_pusher = 'fc71604184ab3f47bf1c';
        var pusher = new Pusher(key_pusher, {
          cluster: 'eu',
          forceTLS: true
        });

        var channel = pusher.subscribe('mi-canal');
        channel.bind('mi-evento', function(data) {
          alert(JSON.stringify(data));
          //console.log (data.data)
        });
    </script>-->
</body>
</html>
