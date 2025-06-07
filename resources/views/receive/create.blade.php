<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Permintaan Baru - FOOD+</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }
    body {
      display: flex;
      background-color: #f5f5f5;
      color: #0f172a;
    }
    aside {
      width: 250px;
      background-color: #fff;
      padding: 40px 20px;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border-right: 1px solid #e5e7eb;
    }
    aside h1 {
      font-weight: 700;
      font-size: 24px;
      color: #0f172a;
      margin-bottom: 40px;
    }
    aside .nav-item {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      color: #64748b;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
    }
    main {
      flex: 1;
      padding: 30px;
    }
    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }
    .form-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }
    select, input, textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #e5e7eb;
      border-radius: 5px;
      font-size: 16px;
    }
    .btn {
      background-color: #3db4a1;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }
    .btn-secondary {
      background-color: #64748b;
    }
  </style>
</head>
<body>
  <aside>
    <div>
      <h1>FOOD+</h1>
      <div class="nav-item">👤 Profile</div>
      <a href="{{ route('receive.dashboard') }}" class="nav-item">📊 Dashboard</a>
    </div>
    <div class="nav-item">🚪 LogOut</div>
  </aside>
  <main>
    <div class="topbar">
      <h2>Buat Permintaan Baru</h2>
      <a href="{{ route('receive.dashboard') }}" class="btn btn-secondary">Kembali</a>
    </div>

    @if(session('error'))
    <div class="alert alert-error">
      {{ session('error') }}
    </div>
    @endif

    <div class="form-container">
      <form action="{{ route('receive.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="food_id">Pilih Makanan</label>
          <select name="food_id" id="food_id" required>
            <option value="">-- Pilih Makanan --</option>
            @foreach($availableFoods as $food)
            <option value="{{ $food->id }}">{{ $food->name }} ({{ $food->category }}) - Dari: {{ $food->donor_name }}</option>
            @endforeach
          </select>
          @error('food_id')
          <div class="error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="quantity">Jumlah</label>
          <input type="number" name="quantity" id="quantity" min="1" value="1" required>
          @error('quantity')
          <div class="error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="notes">Catatan (Opsional)</label>
          <textarea name="notes" id="notes" rows="3"></textarea>
          @error('notes')
          <div class="error">{{ $message }}</div>
          @enderror
        </div>

        <div style="text-align: right;">
          <button type="submit" class="btn">Kirim Permintaan</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>