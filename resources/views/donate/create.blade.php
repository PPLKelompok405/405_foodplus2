<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD+ | Tambah Donasi</title>

    <!-- Google Fonts & Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <div class="page-title">Tambah Donasi</div>
                <div class="header-actions">
                    <div class="notification">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.73 21a1.999 1.999 0 0 1-3.46 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="notification-badge"></div>
                    </div>
                    <div class="language-selector">
                        <img src="{{ asset('images/flag-id.png') }}" alt="Indonesia Flag" class="flag">
                        <span>ID</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="form-container">
                    @if ($errors->any())
                        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <form action="{{ route('donations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label
                                class="form-label"
                                for="image_url"
                                style="display: block; font-weight: bold; margin-bottom: 8px; font-size: 16px; color: #333;"
                            >
                                Upload Gambar Makanan
                            </label>

                            <input
                                type="file"
                                name="image"
                                id="image_url"
                                required
                                style="
                                    display: block;
                                    padding: 10px;
                                    font-size: 14px;
                                    border: 2px dashed #aaa;
                                    border-radius: 8px;
                                    width: 100%;
                                    cursor: pointer;
                                    transition: border-color 0.3s ease;
                                "
                                onmouseover="this.style.borderColor='#777'"
                                onmouseout="this.style.borderColor='#aaa'"
                            >
                            <small style="color: #666; font-size: 12px;">
                                Format gambar harus .jpg, .jpeg, atau .png. Maksimal 4MB.
                            </small>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Makanan</label>
                            <input type="text" name="food_name" class="form-input" value="{{ old('food_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kategori Makanan</label>
                            <input type="text" name="category" class="form-input" value="{{ old('category') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="quantity" class="form-input" value="{{ old('quantity') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-input" value="{{ old('location') }}" required>
                        </div>
                        <div class="form-actions">
                            <a href="{{ route('donations.index') }}" class="cancel-btn">Batal</a>
                            <button type="submit" class="save-btn">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
