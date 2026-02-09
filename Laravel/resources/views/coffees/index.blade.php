<!DOCTYPE html>
<html>
<head>
    <title>Coffee Menu</title>
</head>
<body>

<h1>☕ Coffee Menu</h1>


<p>
    <a href="{{ route('coffees.create') }}">
        <button>Add Coffee ☕</button>
    </a>
</p>


@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

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
          
            @if ($coffee->image_path)
                <img src="{{ asset($coffee->image_path) }}" width="100">
            @else
                No image
            @endif
        </td>
        <td>
            <a href="{{ route('coffees.show', $coffee->id) }}">
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
