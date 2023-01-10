<h1>edit product</h1>

<form action="{{ route('dashboard.admin.products.update', $product->id) }}" method="post">
    @csrf
    @method('PATCH')
    <input type="text" name="barcode" placeholder="barcode" value="{{ $product->barcode }}">
    <input type="text" name="name" placeholder="name of product" value="{{ $product->name }}">
    <input type="number" name="quantity" placeholder="quantity of product" value="{{ $product->quantity }}">
    <input type="number" name="price" placeholder="price of product" value="{{ $product->price }}">
    <button>update</button>
</form>