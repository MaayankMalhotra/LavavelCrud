<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('product.create')}}">Create a Product</a>
        </div>
        <form method="post" action="{{ route('products.delete-multiple') }}">
    @csrf
    @method('delete')

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($products as $product )
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>
                    <a href="{{ route('products.edit', ['product' => $product]) }}">Edit</a>
                </td>
                <td>
                    <input type="checkbox" name="selected_products[]" value="{{ $product->id }}">
                </td>
            </tr>
        @endforeach
    </table>

    <button type="submit">Delete Selected</button>
</form>
    </div>
</body>
</html>