<h1>Admin dashboard</h1>

<a href="{{ route('dashboard.admin.users.index') }}">users</a>
<a href="{{ route('dashboard.admin.products.index') }}">products</a>
<hr>
<form action="{{ route('dashboard.logout') }}" method="post">
@csrf
<button>logout</button>
</form>