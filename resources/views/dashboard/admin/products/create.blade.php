<h1>create product</h1>

<form action="{{ route('dashboard.admin.products.store') }}" method="post">
    @csrf
    <input type="text" name="barcode" placeholder="barcode">
    <input type="text" name="name" placeholder="name of product">
    <input type="number" name="quantity" placeholder="quantity of product">
    <input type="number" name="price" placeholder="price of product">
    <button>create</button>
</form>

<x-alert />