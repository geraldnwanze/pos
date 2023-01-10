<h1>products</h1>

<a href="{{ route('dashboard.admin.products.create') }}">create product</a>
<hr>
<input type="text" id="search-product" placeholder="start typing to search">
<hr>
<table border="1">
    <th>sn</th>
    <th>barcode</th>
    <th>name</th>
    <th>quantity</th>
    <th>price</th>
    <th>action</th>

    @forelse ($products as $product)
        <tr>
            <td>1</td>
            <td>{{ $product->barcode }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <a href="{{ route('dashboard.admin.products.edit', $product->id) }}">edit</a>
                <button>restock</button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100%">no data available</td>
        </tr>
    @endforelse
    {{ $products->links() }}
</table>

<x-alert />