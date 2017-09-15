<h2>Subscribe to our Newsletter</h2>
@if(session()->has('message'))
    <div class="box no-border">
        <div class="box-tools">
            <p class="alert alert-success alert-dismissible">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </p>
        </div>
    </div>
@elseif(session()->has('error'))
    <div class="box no-border">
        <div class="box-tools">
            <p class="alert alert-danger alert-dismissible">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </p>
        </div>
    </div>
@endif
<form action="{{route('mailchimp.store')}}" class="form-inline" method="post">
	<input type="hidden" name="_token" value="{{csrf_token()}}" />
	<div class="form-group">
		<input type="text" name="email" value="" class="form-control" placeholder="Enter your email" />
		<button class="btn btn-info" type="submit">SUBSCRIBE</button>
	</div>
</form>