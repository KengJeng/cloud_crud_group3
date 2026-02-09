<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Menu</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/coffee-menu.css') }}">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="coffee-icon">☕</div>
            <h1>Coffee Menu</h1>
            <p class="subtitle">Explore Our Finest Brews</p>
        </div>

        <div class="actions">
            <a href="{{ route('coffees.create') }}" class="btn-add">
                <span>+</span> Add New Coffee
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="coffee-grid">
            @foreach ($coffees as $coffee)
            <div class="coffee-card" onclick="window.location.href='{{ route('coffees.show', $coffee->id) }}'">
                <div class="coffee-image-container">
                    @if ($coffee->image_path)
                        <img src="{{ asset($coffee->image_path) }}" alt="{{ $coffee->name }}" class="coffee-image">
                    @else
                        <div class="no-image-placeholder">
                            <span>☕</span>
                        </div>
                    @endif
                </div>
                
                <div class="coffee-content">
                    <div class="coffee-header">
                        <h3 class="coffee-name">{{ $coffee->name }}</h3>
                        <span class="coffee-id">#{{ $coffee->id }}</span>
                    </div>
                    
                    <div class="coffee-category">{{ $coffee->category }}</div>
                    
                    <div class="coffee-price">₱{{ number_format($coffee->price, 2) }}</div>
                    
                    <div class="coffee-actions">
                        <a href="{{ route('coffees.edit', $coffee->id) }}" class="btn-edit" onclick="event.stopPropagation()">
                            Edit
                        </a>
                        <button onclick="event.stopPropagation(); deleteCoffee({{ $coffee->id }})" class="btn-delete">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($coffees->isEmpty())
        <div class="empty-state">
            <div class="empty-icon">☕</div>
            <h3>No Coffee Yet</h3>
            <p>Start by adding your first coffee to the menu</p>
        </div>
        @endif
    </div>

    <script>
    function deleteCoffee(id) {
        if (!confirm('Are you sure you want to delete this coffee?')) {
            return;
        }

        fetch(`/coffees/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload();
        })
        .catch(error => {
            console.error(error);
            alert('Failed to delete coffee');
        });
    }
    </script>
</body>
</html>