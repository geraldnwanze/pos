<h1>selling page</h1>

<input type="text" id="search-barcode" placeholder="enter barcode to search" list="barcode" autocomplete="off">
<input type="text" id="search-product" placeholder="start typing to search" list="products" autocomplete="off">

<datalist id="products">
    @forelse ($products as $product)
        <option value="{{ $product->name }}">
    @empty
        
    @endforelse
</datalist>

<datalist id="barcode">
    @forelse ($products as $product)
        <option value="{{ $product->barcode }}">
    @empty
        
    @endforelse
</datalist>