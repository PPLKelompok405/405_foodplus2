<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile - FOOD+</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #fff;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      padding: 20px 40px;
      align-items: center;
    }

    .navbar a {
      text-decoration: none;
      color: #1e2a53;
      font-weight: 600;
      margin-right: 20px;
    }

    .navbar .logo {
      font-weight: bold;
      font-size: 20px;
    }

    .notification {
      background-color: #fff6e5;
      padding: 10px;
      border-radius: 50%;
      position: relative;
    }

    .notification i {
      color: #f2994a;
      font-size: 16px;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 0 20px;
    }

    h2 {
      font-size: 28px;
      margin-bottom: 30px;
    }

    form label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: none;
      border-radius: 4px;
      background-color: #f2f2f2;
    }

    .row {
      display: flex;
      gap: 20px;
    }

    .row .col {
      flex: 1;
    }

    .buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .btn {
      padding: 10px 30px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: 600;
      color: white;
    }

    .btn-primary {
      background-color: #4a959b;
    }

    .btn-secondary {
      background-color: #b5b5b5;
    }

    @media screen and (max-width: 600px) {
      .row {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div>
      <a href="#" class="logo">FOOD+</a>
      <a href="#">Profile</a>
    </div>
    <div class="notification">
      <i class="fas fa-bell"></i>
    </div>
  </nav>

  <div class="container">
    <h2>Hi, {{ $user["name"] ?? 'Pengguna' }}</h2>
    @if(session('success'))
    <div class="alert alert-success">
        <p> {{ session('success') }}
            </p>
    </div>
@endif
    <form action="{{ route('profile.update') }}" method="POST">
      @csrf
      @method('PUT')
      <label for="name">Nama *</label>
      <input type="text" id="name" name="name" value="{{ old('name', $user["name"]) }}" required>

      <div class="row">
        <div class="col">
          <label for="email">Email *</label>
          <input type="email" id="email" name="email" value="{{ old('email', $user["email"]) }}" required>
        </div>
      </div>

      <label for="password">Password *</label>
      <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin ubah">

      <div class="buttons">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-secondary" id="cancel">Batal</button>
      </div>
    </form>
  </div>
  <script>
    const cancelButton = document.getElementById("cancel");
    console.log({cancelButton})
    cancelButton.addEventListener("click", e => {
        window.location.href = "/donate/dashboard"
    })
  </script>
</body>
</html>
