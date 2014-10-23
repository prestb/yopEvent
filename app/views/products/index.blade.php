@extends('layouts.main')

@section('content')

	<div id="admin">
		
		<h1>Products Admin Panel</h1> <hr>

		<p>Here you can View, Create, Delete Products</p>

		<h2>Products</h2><hr>

		<ul>
			@foreach($products as $product)
			<li>
				{{ HTML::image($product->image, $product->title, array('width' => '50')) }}
				{{ $product->title }} - 
				{{ Form::open(array('url' => 'admin/products/destroy', 'class' => 'form-inline')) }}
				{{ Form::hidden('id', $product->id) }}
				{{ Form::submit('delete') }}
				{{ Form::close() }}

				{{ Form::open(array('url' => 'admin/products/available', 'class' => 'form-inline')) }}
					{{ Form::hidden('id', $product->id) }}
					{{ Form::select('availaibility', array('1' => 'In Stock', '0' => 'Out of Stock'), $product->availaibility) }}
					{{ Form::submit('Update') }}
				{{ Form::close() }}
			</li>
			@endforeach
		</ul>

		<h2>Create New Product</h2><hr>
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

		{{ Form::open(array('url' => 'admin/products/create', 'files'=>true)) }}
		
		<p>
			{{ Form::label('category_id', 'Category') }}
			{{ Form::select('category_id', $categories) }}
		</p>
		<p>
			{{ Form::label('title') }}
			{{ Form::text('title', Input::old('title')) }}
		</p>
		<p>
			{{ Form::label('description') }}
			{{ Form::textarea('description', Input::old('description')) }}
		</p>
		<p>
			{{ Form::label('price') }}
			{{ Form::text('price', null, array('class' => 'form-price'), Input::old('price')) }}
		</p>
		<p>
			{{ Form::label('image', 'Choose an image') }}
			{{ Form::file('image') }}
		</p>

		{{ Form::submit('Create Product', array('class' => 'secondary-cart-btn')) }}
		{{ Form::close() }}
	</div> <!-- end-admin-div -->

@stop