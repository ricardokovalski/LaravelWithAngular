@if (Session::has('alert'))
    <div class="alert alert-{{ Session::get('alert')['type'] }} alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button> 
		@if (isset(Session::get('alert')['before']))
			<strong>{{ Session::get('alert')['before'] }}</strong> 
		@endif

		{{ Session::get('alert')['message'] }}

		@if (isset(Session::get('alert')['after']))
			<strong>{{ Session::get('alert')['after'] }}</strong> 
		@endif
	</div>
@endif