<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Request Donasi KFC</title>
  <style>
    body {
      margin: 20px;
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header-left p {
      margin: 0;
      font-weight: bold;
      color: #2a2a2a;
    }

    .header-left h1 {
      margin: 0;
      color: #111;
    }

    .subscription {
      background-color: #2a7d7d;
      color: white;
      padding: 8px 16px;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
    }

    .container {
      margin-top: 30px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 20px;
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 12px;
      padding: 16px;
      text-align: center;
      box-shadow: 0 0 6px rgba(0,0,0,0.05);
    }

    .card img {
      width: 80px;
      height: 80px;
      object-fit: contain;
      margin: 8px 0;
    }

    .card input {
      width: 100%;
      padding: 8px;
      border-radius: 6px;
      border: none;
      background-color: #eee;
      color: #555;
      font-size: 14px;
      margin: 10px 0;
      text-align: center;
    }

    .card p {
      margin: 6px 0;
    }

    .actions {
      margin-top: 8px;
      display: flex;
      justify-content: center;
      gap: 12px;
    }

    .btn-cancel, .btn-ok {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      font-size: 18px;
      border: 2px solid #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      background-color: white;
    }

    .btn-cancel {
      color: #d6336c;
      border-color: #f7cde3;
      background-color: #f7cde3;
    }

    .btn-ok {
      color: #218838;
      border-color: #c6efd2;
      background-color: #c6efd2;
    }
  </style>
</head>
<body>

  <div class="header">
    <div class="header-left">
      <p>Request Donasi</p>
      <h1>KFC</h1>
    </div>
    <a href="#" class="subscription">Unsubscription</a>
  </div>

  <div class="container">
    @foreach ($items as $item)
      <div class="card">
        <p><strong>{{ $item['nama'] }}</strong></p>
        <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}">
        <p>Jumlah yang tersedia : {{ $item['stok'] }}</p>
        <input type="number" name="jumlah[{{ $loop->index }}]" placeholder="Masukan Jumlah Yang Kamu Mau">
        <p>X{{ $item['x_item'] }} Items</p>
        <div class="actions">
          <div class="btn-cancel">✕</div>
          <div class="btn-ok">✓</div>
        </div>
      </div>
    @endforeach
  </div>

</body>
</html>