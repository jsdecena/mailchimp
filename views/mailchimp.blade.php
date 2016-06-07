<h2>Subscribe to our Newsletter</h2>

<form action="{{route('mailchimp.store')}}" class="form-inline" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<div class="form-group">
		<input type="text" name="email" value="" class="form-control" placeholder="Enter your email" />
		<button class="btn btn-info" type="submit">SUBSCRIBE</button>
	</div>
</form>