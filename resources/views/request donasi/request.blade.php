<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Request Donasi KFC</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 20px;
      background: #f9f9f9;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header h1 {
      color: #222;
    }

    .subscription {
      background: #2a7d7d;
      color: white;
      padding: 6px 12px;
      border-radius: 6px;
      text-decoration: none;
    }

    .container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-top: 30px;
    }

    .card {
      background: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 16px;
      text-align: center;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
    }

    .card img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }

    .card input {
      width: 100%;
      padding: 6px;
      margin: 8px 0;
      border-radius: 6px;
      border: 1px solid #ccc;
    }

    .actions {
      display: flex;
      justify-content: center;
      gap: 10px;
    }

    .actions button {
      width: 36px;
      height: 36px;
      border: none;
      border-radius: 50%;
      font-size: 18px;
      cursor: pointer;
    }

    .btn-cancel {
      background: #f9d2dc;
      color: #c00;
    }

    .btn-ok {
      background: #ddf3e0;
      color: #0a0;
    }

    .card p {
      margin: 8px 0;
    }
  </style>
</head>
<body>

  <div class="header">
    <div>
      <p><strong>Request Donasi</strong></p>
      <h1>KFC</h1>
    </div>
    <a href="#" class="subscription">Subscription</a>
  </div>

  <div class="container">
    @foreach ($items as $item)
      <div class="card">
        <p><strong>{{ $item['name'] }}</strong></p>
        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" />
        <p>Jumlah yang tersedia : {{ $item['available'] }}</p>
        <input type="number" placeholder="Masukan Jumlah Yang Kamu Mau" name="quantity[{{ $item['id'] }}]" />
        <p>X2 Items</p>
        <div class="actions">
          <button class="btn-cancel">✕</button>
          <button class="btn-ok">✓</button>
        </div>
      </div>
    @endforeach
  </div>

</body>
</html>
