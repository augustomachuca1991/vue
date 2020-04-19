@extends('layouts.app')

@section('content')
		<div class="container">
			<mi-pensamiento></mi-pensamiento>
		</div>
		
@endsection


@section('js')
	 
      <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
	  <script>
	    // Enable pusher logging - don't include this in production
	    Pusher.logToConsole = true;

	    var pusher = new Pusher('fc71604184ab3f47bf1c', {
	      cluster: 'eu',
	      forceTLS: true
	    });

	    var channel = pusher.subscribe('mi-canal');
	    channel.bind('mi-evento', function(data) {
	      alert(JSON.stringify(data));
	    });
	  </script>
@endsection