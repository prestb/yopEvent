@extends('layouts.main')

@section('content')

	<div id="new-account">
	    <h1>Create New Account</h1>

	    {{ Form::open(array('url' => 'users/signup', 'method'=>'post'))}}

	    @if($errors->has())
	    <div id="form-errors">
	    
	    	<p id="form-errors" class="form-errors">The following errors occured: </p>

	    	<ul>
	    		@foreach($errors->all() as $error)
	    			<li>{{ $error }}</li>
	    		@endforeach
	    	</ul>
	    </div><!-- end-error-div-->
	    @endif

	        <p>
	            <label for="firstname">
	                <span class="required-field">*</span> FIRST NAME:
	            </label>
	            <input type="text" id="firstname" name="firstname">
	        </p>
	        <p>
	            <label for="lastname">
	                <span class="required-field">*</span> LAST NAME:
	            </label>
	            <input type="text" id="lastname" name="lastname">
	        </p>
	        <p>
	            <label for="email">
	                <span class="required-field">*</span> EMAIL:
	            </label>
	            <input type="email" id="email" name="email">
	        </p>
	        <p>
	            <label for="password">
	                <span class="required-field">*</span> PASSWORD:
	            </label>
	            <input type="password" id="password" name="password">
	        </p>
	        <p>
	            <label for="password_confirm">
	                <span class="required-field">*</span> CONFIRM PASSWORD:
	            </label>
	            <input type="password" id="password_confirm" name="password_confirm">
	        </p>
	        <p>
	            <label for="telephone">
	                <span class="required-field">*</span> TELEPHONE:
	            </label>
	            <input type="text" id="telephone" name="telephone" placeholder="99-99-99-99">
	        </p>

	        <p>Fields marked with <span class="required-field">*</span> are required.</p>

	        <hr />

	        <input type="submit" value="CREATE NEW ACCOUNT" class="secondary-cart-btn">
	    </form>
	</div><!-- end new-account -->

@stop