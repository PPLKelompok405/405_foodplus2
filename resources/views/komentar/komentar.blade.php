{{-- resources/views/comments/create.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Komentar</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff;
      padding: 40px;
    }

    h2 {
      color: #2b2d42;
    }

    form {
      max-width: 700px;
      margin-top: 20px;
    }

    label {
      display: block;
      margin: 20px 0 5px;
      font-weight: 600;
      color: #2b2d42;
    }

    input[type="text"],
    input[type="date"],
    textarea {
      width: 100%;
      padding: 12px;
      border: none;
      background-color: #f3f3f3;
      border-radius: 4px;
      font-size: 16px;
      resize: vertical;
    }

    textarea {
      height: 100px;
    }

    .rating {
      font-size: 22px;
      color: #000;
      margin-top: 10px;
    }

    .buttons {
      margin-top: 30px;
      display: flex;
      justify-content: flex-end;
      gap: 15px;
    }

    .buttons button {
      padding: 10px 30px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }

    .save-btn {
      background-color: #4d9ca6;
      color: white;
    }

    .cancel-btn {
      background-color: #c4c4c4;
      color: black;
    }
  </style>
</head>
<body>

  <h2>Tambah Komentar</h2>

  <form action="{{ route('comments.store') }}" method="POST">
    @csrf

    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama') }}">

    <label for="judul">Tulisan Judul Dari Riview</label>
    <input type="text" id="judul" name="judul" value="{{ old('judul') }}">

    <label for="detail">Tuliskan Untuk Detailnya</label>
    <textarea id="detail" name="detail">{{ old('detail') }}</textarea>

    <label for="jumlah">Jumlah Donasi Yang Diterima</label>
    <input type="text" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">

    <label for="tanggal">Tanggal Penerima Donasi</label>
    <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">

    <label>Rating</label>
    <div class="rating">
      ★ ★ ★ ★ ★
    </div>

    <div class="buttons">
      <button type="submit" class="save-btn">Simpan</button>
      <a href="{{ url()->previous() }}" class="cancel-btn" style="text-decoration: none; display: inline-block; text-align: center; padding: 10px 30px; border-radius: 6px;">Cancel</a>
    </div>
  </form>

</body>
</html>
