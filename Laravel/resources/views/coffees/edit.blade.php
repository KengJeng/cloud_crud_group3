<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coffee</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/coffee-form.css') }}">
</head>
<body>
    <div class="container">
        <div class="coffee-icon">☕</div>
        <h1>Edit Coffee</h1>
        <p class="subtitle">Update Your Brew Details</p>

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

        <form action="{{ route('coffees.update', $coffee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $coffee->name) }}" required placeholder="e.g., Ethiopian Yirgacheffe">
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" placeholder="Describe the flavor profile...">{{ old('description', $coffee->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $coffee->price) }}" required placeholder="0.00">
            </div>

            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" value="{{ old('category', $coffee->category) }}" placeholder="e.g., Iced Coffee, Hot Coffee">
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
                @if ($coffee->image_path)
                    <p style="margin-top: 10px; color: #666;">Current image:</p>
                    <img src="{{ asset($coffee->image_path) }}" alt="{{ $coffee->name }}" style="width: 150px; height: auto; margin-top: 10px;">
                @endif
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" name="is_available" value="1" id="available" {{ old('is_available', $coffee->is_available) ? 'checked' : '' }}>
                <label for="available">Available</label>
            </div>

            <button type="submit" class="btn-primary">Update Product</button>
        </form>

        <a href="{{ route('coffees.index') }}" class="back-link">← Back to coffees</a>
    </div>
</body>
</html>
