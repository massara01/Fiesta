
<h1> loggedin as {{ auth()->user()->name }}</h1>
<a class="" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}" >logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf

    
</form>

