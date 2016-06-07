<h2>Subscribe to our Newsletter</h2>
{!!Form::open(['url' => route('mailchimp.store'), 'class' => 'form-inline'])!!}
	<div class="form-group">
		<input type="text" name="email" value="" class="form-control" placeholder="Enter your email" />
		<button class="btn btn-info" type="submit">SUBSCRIBE</button>
	</div>
{!!Form::close()!!}	