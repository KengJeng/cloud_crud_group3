<!DOCTYPE html>
<html>
<head>
    <title>{{ $coffee->name }}</title>
</head>
<body>

<h1>☕ {{ $coffee->name }}</h1>

<img src="{{ asset($coffee->image_path) }}" width="300">

<p><strong>Category:</strong> {{ $coffee->category }}</p>
<p><strong>Description:</strong> {{ $coffee->description }}</p>
<p><strong>Price:</strong> ₱{{ number_format($coffee->price, 2) }}</p>

@if ($coffee->is_available)
    <button>Order Now</button>
@else
    <p><em>Currently unavailable</em></p>
@endif

<br><br>
<a href="/coffees">← Back to Coffee Menu</a>

</body>
</html>
