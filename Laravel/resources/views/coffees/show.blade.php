<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $coffee->name }} - Coffee Details</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/coffee-show.css') }}">
</head>
<body>
    <div class="container">
        <div class="coffee-header">
            <div class="coffee-icon">☕</div>
            <div>
                <h1>{{ $coffee->name }}</h1>
                <p class="subtitle">Coffee Details</p>
            </div>
        </div>

        @if ($coffee->image_path)
            <div class="image-container">
                <img src="{{ asset($coffee->image_path) }}" alt="{{ $coffee->name }}" class="coffee-image">
            </div>
        @else
            <div class="image-container">
                <div class="no-image">
                    <span>☕</span>
                    <p>No image available</p>
                </div>
            </div>
        @endif

        <div class="details">
            <div class="detail-row">
                <div class="detail-label">Product ID</div>
                <div class="detail-value">#{{ $coffee->id }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Category</div>
                <div class="detail-value">{{ $coffee->category ?? 'Not specified' }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Price</div>
                <div class="price">₱{{ number_format($coffee->price, 2) }}</div>
            </div>

            @if ($coffee->description)
                <div class="detail-row">
                    <div class="detail-label">Description</div>
                    <div class="detail-value">{{ $coffee->description }}</div>
                </div>
            @endif

            <div class="detail-row">
                <div class="detail-label">Availability</div>
                <div>
                    <span class="availability {{ $coffee->is_available ? 'available' : 'unavailable' }}">
                        {{ $coffee->is_available ? '✓ Available' : '✗ Out of Stock' }}
                    </span>
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Last Updated</div>
                <div class="detail-value">{{ $coffee->updated_at->format('M d, Y - H:i A') }}</div>
            </div>
        </div>

        <div class="actions">
            <a href="{{ route('coffees.edit', $coffee->id) }}" class="btn btn-primary">Edit Coffee</a>
            <a href="{{ route('coffees.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</body>
</html>