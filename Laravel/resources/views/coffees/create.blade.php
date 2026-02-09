<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coffee</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2E0D14 0%, #1a0a0d 100%);
            min-height: 100vh;
            padding: 40px 20px;
            color: #EFE1D5;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(239, 225, 213, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(239, 225, 213, 0.1);
        }

        h1 {
            font-family: 'Cinzel', serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 10px;
            color: #EFE1D5;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .subtitle {
            text-align: center;
            color: #EFE1D5;
            opacity: 0.7;
            margin-bottom: 40px;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-error {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff6b6b;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: #51cf66;
        }

        .alert ul {
            list-style: none;
            padding-left: 0;
        }

        .alert li {
            padding: 5px 0;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #EFE1D5;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 18px;
            background: rgba(239, 225, 213, 0.08);
            border: 1px solid rgba(239, 225, 213, 0.2);
            border-radius: 10px;
            color: #EFE1D5;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #EFE1D5;
            background: rgba(239, 225, 213, 0.12);
            box-shadow: 0 0 0 3px rgba(239, 225, 213, 0.1);
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(239, 225, 213, 0.4);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="file"] {
            padding: 10px 18px;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background: #EFE1D5;
            color: #2E0D14;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            margin-right: 10px;
            transition: all 0.3s ease;
        }

        input[type="file"]::file-selector-button:hover {
            background: #d4c4b5;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #EFE1D5;
        }

        .checkbox-group label {
            margin: 0;
            cursor: pointer;
        }

        .btn-primary {
            width: 100%;
            padding: 15px;
            background: #EFE1D5;
            color: #2E0D14;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Cinzel', serif;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #d4c4b5;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(239, 225, 213, 0.2);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #EFE1D5;
            text-decoration: none;
            opacity: 0.7;
            transition: opacity 0.3s ease;
            text-align: center;
            width: 100%;
        }

        .back-link:hover {
            opacity: 1;
        }

        .coffee-icon {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 20px;
        }
    </style>
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
