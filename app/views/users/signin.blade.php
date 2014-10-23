@extends('layouts.main')

@section('content')

<section id="signin-form">
    <h1>I have an account</h1>
    {{ Form::open(array('url' => 'users/signin', 'method' => 'post'))}}
        <p>
            {{ HTML::image('img/email.gif', 'Email Address' ) }}
            <input type="email" name="email" placeholder="Email Address">
        </p>
        <p>
            {{ HTML::image('img/password.gif', 'Password') }}
            <input type="password" name="password" placeholder="Password">
        </p>

        <button type="submit" class="secondary-cart-btn">
            SIGN IN
        </button>
    </form>
</section><!-- end signin-form -->
<section id="signup">
    <h2>I'm a new customer</h2>
    <h3>You can create an account in just a few simple steps.<br>
        Click below to begin.</h3>

    {{ HTML::link('users/signup', 'CREATE NEW ACCOUNT', array('class' => 'default-btn')) }}
</section><!--- end signup -->

@stop