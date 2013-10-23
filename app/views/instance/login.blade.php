@extends('instance.layout')
@section('instanceContent')
	<div class="col-md-12 contentlog">
		<div class="login-box">
			<h4>Login</h4>
			@if (Session::has('login_errors'))
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Invalid login. Please try again.
			</div>
			@endif

			<form class="form-horizontal" method="POST" action="{{ URL::route('login') }}">
				<div class="control-group">
					<label class="control-label" for="email"><p class="formlog">E-mail</p></label>
					<div class="controls">
						<input type="text" name="email" id="email" placeholder="Email" value="{{{ Input::old('email') }}}">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="password"><p class="formlog">Password</p></label>
					<div class="controls">
						<input type="password" name="password" id="password" placeholder="Password">
					</div>
				</div>

				<div class="control-group">
					<div class="controls">
						<label class="checkbox">
							<input type="checkbox"> Remember me
						</label>
						<button type="submit" class="btn btn-inverse">Sign in</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop