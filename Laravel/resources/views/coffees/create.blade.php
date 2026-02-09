<!DOCTYPE html>
<html>
<head>
    <title>Create Coffee</title>
</head>
<body>
    <h1>Create Coffee Product</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('coffees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <br>

        <div>
            <label>Description</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <br>

        <div>
            <label>Price</label><br>
            <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}" required>
        </div>

        <br>

        <div>
            <label>Category</label><br>
            <input type="text" name="category" value="{{ old('category') }}">
        </div>

        <br>

        <div>
            <label>Image</label><br>
            <input type="file" name="image">
        </div>

        <br>

        <div>
            <label>
                <input type="checkbox" name="is_available" value="1" {{ old('is_available') ? 'checked' : '' }}>
                Available
            </label>
        </div>

        <br>

        <button type="submit">Create Product</button>
    </form>

    <br>
    <a href="{{ route('coffees.index') }}">Back to coffees</a>
</body>
</html>
