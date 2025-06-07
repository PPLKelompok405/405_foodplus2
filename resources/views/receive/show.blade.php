<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Permintaan - FOOD+</title>
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
    .detail-container {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .detail-item {
      margin-bottom: 20px;
    }
    .detail-label {
      font-weight: 600;
      margin-bottom: 5px;
    }
    .detail-value {
      font-size: 18px;
    }
    .status-badge {
      display: inline-block;
      padding: 5px 10px;
      border-radius: 5px;
      font-size: 14px;
      font-weight: 500;
    }
    .status-pending {
      background-color: #fef3c7;
      color: #92400e;
    }
    .status-approved {
      background-color: #dcfce7;
      color: #166534;
    }
    .status-received {
      background-color: #dbeafe;
      color: #1e40af;
    }
    .status-cancelled {
      background-color: #fee2e2;
      color: #b91c1c;
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
    .btn-success {
      background-color: #10b981;
    }
    .btn-danger {
      background-color: #ef4444;
    }
    .action-buttons {
      display: flex;
      gap: 10px;
      margin-top: 30px;
      justify-content: flex-end;
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
      <h2>Detail Permintaan</h2>
      <a href="{{ route('receive.dashboard') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="detail-container">
      <div class="detail-item">
        <div class="detail-label">Makanan</div>
        <div class="detail-value">{{ $foodRequest->food->name }}</div>
      </div>
      
      <div class="detail-item">
        <div class="detail-label">Kategori</div>
        <div class="detail-value">{{ $foodRequest->food->category }}</div>
      </div>
      
      <div class="detail-item">
        <div class="detail-label">Donatur</div>
        <div class="detail-value">{{ $foodRequest->food->user->name }}</div>
      </div>
      
      <div class="detail-item">
        <div class="detail-label">Jumlah</div>
        <div class="detail-value">{{ $foodRequest->quantity }}</div>
      </div>
      
      <div class="detail-item">
        <div class="detail-label">Tanggal Permintaan</div>
        <div class="detail-value">{{ $foodRequest->created_at->format('d M Y, H:i') }}</div>
      </div>
      
      <div class="detail-item">
        <div class="detail-label">Status</div>
        <div class="detail-value">
          <span class="status-badge status-{{ $foodRequest->status }}">
            @if($foodRequest->status == 'pending')
              Menunggu
            @elseif($foodRequest->status == 'approved')
              Disetujui
            @elseif($foodRequest->status == 'received')
              Diterima
            @else
              Dibatalkan
            @endif
          </span>
        </div>
      </div>
      
      @if($foodRequest->notes)
      <div class="detail-item">
        <div class="detail-label">Catatan</div>
        <div class="detail-value">{{ $foodRequest->notes }}</div>
      </div>
      @endif
      
      <div class="action-buttons">
        @if($foodRequest->status == 'approved')
        <form action="{{ route('receive.mark-received', $foodRequest->id) }}" method="POST">
          @csrf
          @method('PUT')
          <button type="submit" class="btn btn-success">Tandai Sudah Diterima</button>
        </form>
        @endif
        
        @if($foodRequest->status == 'pending')
        <a href="{{ route('receive.edit', $foodRequest->id) }}" class="btn">Edit Permintaan</a>
        
        <form action="{{ route('receive.destroy', $foodRequest->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus permintaan ini?')">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Hapus Permintaan</button>
        </form>
        @endif
      </div>
    </div>
  </main>
</body>
</html>