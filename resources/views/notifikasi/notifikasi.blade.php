<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifikasi</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 40px;
      background-color: #fff;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .notif-card {
      background-color: #e9e9e9;
      border-radius: 12px;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 20px;
    }

    .notif-card i {
      color: gray;
      font-size: 20px;
      margin-right: 15px;
    }

    .notif-content {
      flex: 1;
    }

    .notif-title {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .notif-date {
      font-size: 14px;
      color: #999;
    }

    .view-all {
      text-align: center;
      color: #f44336;
      font-weight: bold;
      margin-top: 30px;
    }

    .icon {
      font-size: 20px;
    }
  </style>
</head>
<body>

  <div class="header">
    <span>Notifikasi</span>
    <div>
      <span style="margin-right: 10px;">Mark all read</span>
      <i class="fas fa-gear icon"></i>
    </div>
  </div>

  {{-- Contoh notifikasi statis --}}
  <div class="notif-card">
    <i class="fas fa-check"></i>
    <div class="notif-content">
      <div class="notif-title">Request Donasi</div>
      <div>Request donasi telah disetujui</div>
    </div>
    <div class="notif-date">1 Maret 2025</div>
  </div>

  <div class="notif-card">
    <i class="fas fa-check"></i>
    <div class="notif-content">
      <div class="notif-title">Donasi</div>
      <div>Donasi telah diterima</div>
    </div>
    <div class="notif-date">30 Januari 2025</div>
  </div>

  <div class="view-all">Melihat Semua Notifikasi</div>

</body>
</html>
