<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD+ | Tambah Donasi</title>

    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #ffffff;
            padding: 40px 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 40px 50px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .header i {
            font-size: 30px;
            color: #2d7d8a;
            margin-right: 15px;
        }

        .header h1 {
            font-size: 24px;
            color: #2d7d8a;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #f7f9fc;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #2d7d8a;
            background-color: #fff;
            outline: none;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.2s ease;
        }

        .btn-cancel {
            background-color: #bbb;
            color: #fff;
        }

        .btn-cancel:hover {
            background-color: #999;
        }

        .btn-save {
            background-color: #2d7d8a;
            color: #fff;
        }

        .btn-save:hover {
            background-color: #236670;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <i class="fas fa-hand-holding-heart"></i>
            <h1>Tambah Donasi</h1>
        </div>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('donations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="food_name">Nama Makanan</label>
                <input type="text" id="food_name" name="food_name" value="{{ old('food_name') }}" required>
            </div>
            <div class="form-group">
                <label for="category">Kategori Makanan</label>
                <input type="text" id="category" name="category" value="{{ old('category') }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Jumlah</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
            </div>
            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" id="location" name="location" value="{{ old('location') }}" required>
            </div>
            <div class="button-group">
                <a href="{{ route('donations.index') }}" class="btn btn-cancel">Batal</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
