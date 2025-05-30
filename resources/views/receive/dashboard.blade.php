<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Penerima</title>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Fredoka', sans-serif;
      background-color: #fff;
      padding: 0;
      margin: 0;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px 0 40px;
      position: relative;
    }

    .title {
      font-size: 24px;
      font-weight: bold;
    }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 20px;
      position: relative;
    }

    .notification-icon {
      position: relative;
      font-size: 20px;
      cursor: pointer;
    }

    .notification-icon .dot {
      position: absolute;
      top: 0px;
      right: -2px;
      width: 8px;
      height: 8px;
      background-color: red;
      border-radius: 50%;
    }

    .dropdown-wrapper {
      position: relative;
    }

    .user-dropdown {
      background-color: #fff3cd;
      padding: 8px 12px;
      border-radius: 10px;
      font-weight: bold;
      cursor: pointer;
    }

    .dropdown-text {
      font-size: 14px;
    }

    .dropdown-menu {
      position: absolute;
      top: 45px;
      right: 0;
      background-color: white;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      display: none;
      z-index: 999;
    }

    .dropdown-menu a,
    .dropdown-menu form button {
      display: block;
      padding: 10px 15px;
      color: #333;
      text-decoration: none;
      background-color: white;
      border: none;
      text-align: left;
      width: 100%;
      font-family: 'Fredoka', sans-serif;
      cursor: pointer;
    }

    .dropdown-menu a:hover,
    .dropdown-menu form button:hover {
      background-color: #f2f2f2;
    }

    .stats-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px 40px;
    }

    .stat-box {
      background-color: #3db4a1;
      color: white;
      padding: 20px;
      border-radius: 10px;
      flex: 1 1 180px;
      text-align: center;
    }

    .stat-box h4 {
      margin: 10px 0 5px;
    }

    .stat-box .icon {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .donasi-box {
      background-color: #3db4a1;
      color: white;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      margin: 20px 40px;
      max-width: 200px;
    }

    h3 {
      margin: 40px 40px 20px;
    }

    .restoran {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      padding: 0 40px 40px;
    }

    .restoran-card {
      background-color: #3db4a1;
      padding: 15px;
      border-radius: 10px;
      color: white;
      display: flex;
      align-items: center;
      min-height: 100px;
    }

    .restoran-card img {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 8px;
      margin-right: 15px;
    }

    .restoran-info h4 {
      margin: 0;
      font-size: 16px;
    }

    .restoran-info .tags {
      font-size: 14px;
    }

    .restoran-info .stats {
      font-size: 12px;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="topbar">
    <div class="title">Dashboard</div>
    <div class="topbar-right">
      <div class="notification-icon">
        🔔
        <span class="dot"></span>
      </div>
      <div class="dropdown-wrapper">
        <div class="user-dropdown" onclick="toggleDropdown()">
          <span class="dropdown-text">{{ Auth::user()->name }} ▼</span>
        </div>
        <div class="dropdown-menu" id="dropdownMenu">
          <a href="/receive/profile">Profile</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="stats-container">
    <div class="stat-box">
      <div class="icon">🧑‍🤝‍🧑</div>
      <h4>Total Donatur</h4>
      <p>13</p>
    </div>
    <div class="stat-box">
      <div class="icon">🍽️</div>
      <h4>Total Restoran</h4>
      <p>16</p>
    </div>
    <div class="stat-box">
      <div class="icon">⬇️</div>
      <h4>Total Penerima</h4>
      <p>0</p>
    </div>
    <div class="stat-box">
      <div class="icon">🍱</div>
      <h4>Total Makanan Tersedia</h4>
      <p>13</p>
    </div>
    <div class="stat-box">
      <div class="icon">🧾</div>
      <h4>Total Pengeluaran</h4>
      <p>13</p>
    </div>
    <div class="stat-box">
      <div class="icon">🚛</div>
      <h4>Total Pengiriman</h4>
      <p>13</p>
    </div>
  </div>

  <div class="donasi-box">
    <h4>Donasi Harian</h4>
    <h2>90pcs</h2>
    <p>9 February 2025</p>
  </div>

  <h3>Restoran</h3>
  <div class="restoran">
    @php
      $restorans = [
        (object)[ 'nama' => 'Gacoan', 'logo_url' => 'https://via.placeholder.com/50', 'kategori' => 'Makanan, Cepat Saji, Mie', 'views' => '302,624', 'likes' => '30,908', 'comments' => '33' ],
        (object)[ 'nama' => 'Solaria', 'logo_url' => 'https://via.placeholder.com/50', 'kategori' => 'Makanan, Restoran, Terjamin', 'views' => '101,650', 'likes' => '26,743', 'comments' => '209' ],
        (object)[ 'nama' => 'Kopi Kenangan', 'logo_url' => 'https://via.placeholder.com/50', 'kategori' => 'Minuman, Kopi, Cepat Saji', 'views' => '234,504', 'likes' => '13,301', 'comments' => '184' ],
        (object)[ 'nama' => 'Wings O Wings', 'logo_url' => 'https://via.placeholder.com/50', 'kategori' => 'Makanan, Ayam, Aneka Ragam', 'views' => '433,204', 'likes' => '36,050', 'comments' => '38' ],
        (object)[ 'nama' => 'Ayam Crisbar', 'logo_url' => 'https://via.placeholder.com/50', 'kategori' => 'Ayam, Cepat Saji, Murah', 'views' => '401,456', 'likes' => '24,753', 'comments' => '260' ],
        (object)[ 'nama' => 'Burger King', 'logo_url' => 'https://via.placeholder.com/50', 'kategori' => 'Makanan, Cepat Saji, Restoran', 'views' => '242,634', 'likes' => '23,430', 'comments' => '134' ],
      ];
    @endphp

    @foreach($restorans as $resto)
    <div class="restoran-card">
      <img src="{{ $resto->logo_url }}" alt="Logo">
      <div class="restoran-info">
        <h4>{{ $resto->nama }}</h4>
        <div class="tags">{{ $resto->kategori }}</div>
        <div class="stats">{{ $resto->views }} Views · {{ $resto->likes }} Likes · {{ $resto->comments }} comments</div>
      </div>
    </div>
    @endforeach
  </div>

  <script>
    function toggleDropdown() {
      const menu = document.getElementById("dropdownMenu");
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }

    window.addEventListener("click", function(e) {
      const menu = document.getElementById("dropdownMenu");
      if (!e.target.closest(".dropdown-wrapper")) {
        menu.style.display = "none";
      }
    });
  </script>
</body>
</html>
