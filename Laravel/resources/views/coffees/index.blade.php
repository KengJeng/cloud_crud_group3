<!DOCTYPE html>
<html>
<head>
    <title>Coffee Menu</title>
</head>
<body>

<h1>☕ Coffee Menu</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
    </tr>

    @foreach ($coffees as $coffee)
    <tr>
        <td>
            <img src="{{ asset($coffee->image_path) }}" width="100">
        </td>
        <td>
            <a href="/coffees/{{ $coffee->id }}">
                {{ $coffee->name }}
            </a>
        </td>
        <td>{{ $coffee->category }}</td>
        <td>₱{{ number_format($coffee->price, 2) }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>
