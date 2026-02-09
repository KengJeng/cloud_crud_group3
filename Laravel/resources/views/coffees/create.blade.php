<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coffee</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/coffee-form.css') }}">
</head>
<body>
    <div class="container">
        <div class="coffee-icon">☕</div>
        <h1>Create Coffee</h1>
        <p class="subtitle">Craft Your Perfect Brew</p>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('coffees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g., Ethiopian Yirgacheffe">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" placeholder="Describe the flavor profile...">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}" required placeholder="0.00">
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" value="{{ old('category') }}" placeholder="e.g., Single Origin">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" name="is_available" value="1" id="available" {{ old('is_available') ? 'checked' : '' }}>
                <label for="available">Available</label>
            </div>

            <button type="submit" class="btn-primary">Create Product</button>
        </form>

        <a href="{{ route('coffees.index') }}" class="back-link">← Back to coffees</a>
    </div>
</body>
</html>