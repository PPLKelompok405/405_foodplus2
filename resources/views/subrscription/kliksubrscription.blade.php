<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Request Donasi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <style>
    /* --- CSS tetap sama seperti HTML asli --- */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #fff;
      padding: 30px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: start;
      margin-bottom: 30px;
    }

    .header-title {
      color: #1A237E;
      font-size: 16px;
      font-weight: 600;
    }

    .header-subtitle {
      font-size: 24px;
      font-weight: 700;
      margin-top: 5px;
    }

    .header-actions {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .subscription-btn {
      background-color: #227C74;
      color: white;
      padding: 8px 20px;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      cursor: pointer;
    }

    .notification {
      font-size: 20px;
      color: #FF6D00;
    }

    .food-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }

    .food-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
    }

    .food-card img {
      width: 80px;
      height: 80px;
      object-fit: cover;
      margin-bottom: 10px;
    }

    .food-name {
      font-size: 16px;
      font-weight: 600;
    }

    .stock {
      font-size: 13px;
      margin: 6px 0;
    }

    .input-quantity {
      background: #D9D9D9;
      padding: 10px;
      border: none;
      border-radius: 8px;
      width: 100%;
      font-size: 12px;
      margin-bottom: 6px;
    }

    .items {
      font-size: 12px;
      color: #888;
      margin-bottom: 8px;
    }

    .actions {
      display: flex;
      justify-content: center;
      gap: 12px;
    }

    .btn-cancel, .btn-confirm {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      border: 1px solid;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .btn-cancel {
      background: #FFE8E8;
      color: #FF3B3B;
      border-color: #FFBFBF;
    }

    .btn-confirm {
      background: #E6F8F6;
      color: #2E7D6B;
      border-color: #C7EDE8;
    }

    .modal {
      position: fixed;
      top: 0; left: 0;
      width: 100vw; height: 100vh;
      background: rgba(0, 0, 0, 0.3);
      display: flex;
      justify-content: center;
      align-items: center;
      display: none;
    }

    .modal-content {
      background: #D9D9D9;
      padding: 30px 40px;
      border-radius: 16px;
      text-align: center;
    }

    .modal-content img {
      width: 80px;
      margin-bottom: 15px;
    }

    .modal-content p {
      font-weight: 600;
      font-size: 16px;
      margin-bottom: 20px;
    }

    .modal-content button {
      background: #FFEB3B;
      border: none;
      padding: 10px 20px;
      font-weight: bold;
      font-size: 14px;
      border-radius: 8px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- HEADER -->
  <div class="header">
    <div>
      <div class="header-title">Request Donasi</div>
      <div class="header-subtitle">KFC</div>
    </div>
    <div class="header-actions">
      <button class="subscription-btn" onclick="showModal()">Subscription</button>
    </div>
  </div>

  <!-- GRID MAKANAN -->
  <div class="food-grid">
    @php
      $foods = [
        ['name' => 'Paha Atas', 'stock' => 13, 'image' => 'paha-atas.jpg'],
        ['name' => 'Paha Bawah', 'stock' => 2, 'image' => 'paha-bawah.jpg'],
        ['name' => 'Kentang Goreng', 'stock' => 13, 'image' => 'kentang.jpg'],
        ['name' => 'Cream Soup', 'stock' => 1, 'image' => 'soup.jpg'],
        ['name' => 'Chicken Wing', 'stock' => 10, 'image' => 'wing.jpg'],
      ];
    @endphp

    @foreach ($foods as $food)
      <div class="food-card">
        <img src="{{ asset('assets/images/food/' . $food['image']) }}" alt="{{ $food['name'] }}" />
        <div class="food-name">{{ $food['name'] }}</div>
        <div class="stock">Jumlah yang tersedia : {{ $food['stock'] }}</div>
        <input type="text" class="input-quantity" placeholder="Masukan Jumlah Yang Kamu Mau">
        <div class="items">X2 Items</div>
        <div class="actions">
          <button class="btn-cancel">✕</button>
          <button class="btn-confirm">✓</button>
        </div>
      </div>
    @endforeach
  </div>

  <!-- MODAL -->
  <div class="modal" id="subscribeModal">
    <div class="modal-content">
      <img src="{{ asset('assets/images/logo/kfc.png') }}" alt="KFC Logo" />
      <p>Selamat!!!<br>Anda Berhasil Subcribe KFC</p>
      <button onclick="closeModal()">Tutup</button>
    </div>
  </div>

  <script>
    function showModal() {
      document.getElementById('subscribeModal').style.display = 'flex';
    }

    function closeModal() {
      document.getElementById('subscribeModal').style.display = 'none';
    }
  </script>
</body>
</html>
