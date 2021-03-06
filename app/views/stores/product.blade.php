@extends('layouts.main')

@section('content')


<div id="product-image">
	    {{ HTML::image($product->image, $product->title) }}
	</div><!-- end product-image -->
	<div id="product-details">
	    <h1>{{ $product->title }}</h1>
	    <p>{{ $product->description }}</p>

	    <hr />

	    <form action="#" method="post">
	        <label for="qty">Qty:</label>
	        <input type="text" id="qty" name="qty" value="1" maxlength="2">

	        <button type="submit" class="secondary-cart-btn">
	            {{ HTMl::image('img/white-cart.gif', 'Add to Cart') }}
	             ADD TO CART
	        </button>
	    </form>
	</div><!-- end product-details -->
	<div id="product-info">
	    <p class="price">$ {{ $product->price }}</p>
	    <p>
	    	Availability: 
	    	<span class="{{ Availability::displayClass($product->availaibility)}}">
	    		{{ Availability::display($product->availaibility )}}
	    	</span>
	    </p>
	    <p>Product Code: <span>{{ $product->id }}</span></p>
</div><!-- end product-info -->

@stop