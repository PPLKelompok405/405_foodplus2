<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - FOOD+</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2d7d8a;
            --primary-hover: #236570;
            --secondary-color: #ffb703;
            --secondary-hover: #ffca4a;
            --background-color: #f8f9fa;
            --card-bg-color: #ffffff;
            --text-dark: #212529;
            --text-light: #6c757d;
            --border-color: #e9ecef;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 8px 25px rgba(0, 0, 0, 0.08);
            --border-radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--card-bg-color);
            color: var(--text-dark);
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            z-index: 50;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            transition: box-shadow 0.3s ease;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            text-align: center;
            color: white;
            padding: 100px 20px;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        /* Stats Section */
        .stats-section {
            background-color: var(--background-color);
            padding: 60px 20px;
        }
        .stat-card {
            background-color: var(--card-bg-color);
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-card i {
            font-size: 32px;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        .stat-card p.stat-number {
            font-size: 36px;
            font-weight: 700;
            color: var(--text-dark);
        }
        .stat-card p.stat-label {
            font-size: 16px;
            color: var(--text-light);
        }

        /* Restaurant Section */
        .restaurant-card {
            background-color: var(--card-bg-color);
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .restaurant-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }
        .restaurant-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .restaurant-card-body {
            padding: 20px;
            flex-grow: 1;
        }
        .restaurant-card-body h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .tag {
            background-color: #e9ecef;
            color: var(--text-light);
            font-size: 11px;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 20px;
        }
        .restaurant-stats {
            font-size: 13px;
            color: var(--text-light);
            margin-top: 10px;
        }
        .card-footer-action {
            padding: 20px;
            background-color: #f8f9fa;
            border-top: 1px solid var(--border-color);
        }
        .btn-secondary {
            background-color: var(--secondary-color);
            color: var(--text-dark);
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .btn-secondary:hover {
            background-color: var(--secondary-hover);
        }

        /* Footer */
        footer {
            background-color: var(--text-dark);
            color: #f8f9fa;
        }

    </style>
</head>
<body>
    <div class="flex min-h-screen flex-col">
        <header class="p-4 shadow-sm">
            <div class="max-w-[1200px] mx-auto flex justify-between items-center">
                <h2 class="text-2xl font-bold text-gray-800">FOOD+</h2>
                <div class="flex items-center gap-4">
                    <a href="/login" class="text-gray-600 hover:text-primary-color font-semibold transition-colors">Login</a>
                    <a href="/register" class="bg-primary-color text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-hover transition-colors">Register</a>
                </div>
            </div>
        </header>

        <main class="flex-1">
            <section class="hero-section">
                <div class="max-w-3xl mx-auto">
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">Berbagi Kebaikan Melalui Makanan</h1>
                    <p class="text-lg md:text-xl mb-8 max-w-2xl mx-auto">
                        FOOD+ adalah jembatan antara kedermawanan Anda dengan mereka yang membutuhkan. Setiap donasi adalah harapan baru. Mari bergabung dalam gerakan kebaikan ini.
                    </p>
                    <a href="/register" class="bg-secondary-color hover:bg-secondary-hover text-text-dark font-bold py-3 px-8 rounded-lg text-lg transition-transform hover:scale-105">
                        Mulai Berdonasi
                    </a>
                </div>
            </section>

            <section class="stats-section">
                <div class="max-w-[1200px] mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold">Dampak Kita Bersama</h2>
                        <p class="text-lg text-text-light mt-2">Angka-angka ini adalah bukti nyata dari kebaikan yang telah kita sebarkan.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8 max-w-3xl mx-auto">
                        <div class="stat-card">
                            <i class="fas fa-store"></i>
                            <div>
                                <p id="total-restoran" class="stat-number">0</p>
                                <p class="stat-label">Restoran & Donatur Terdaftar</p>
                            </div>
                        </div>
                        <div class="stat-card">
                             <i class="fas fa-utensils"></i>
                             <div>
                                <p id="total-makanan" class="stat-number">0</p>
                                <p class="stat-label">Porsi Makanan Telah Didonasikan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-16 px-4">
                 <div class="max-w-[1200px] mx-auto">
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-bold">Lihat Donasi yang Tersedia</h2>
                        <p class="text-lg text-text-light mt-2">Donasi dari para donatur hebat yang siap untuk disalurkan.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="donation-container">
                        <div class="text-center col-span-full p-10">
                            <div class="spinner-border text-primary-color" style="width: 3rem; height: 3rem;" role="status">
                                <span class="visually-hidden">Memuat donasi...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="p-6 text-center">
            <p>&copy; 2025 FOOD+. All Rights Reserved. Platform Kebaikan untuk Semua.</p>
        </footer>
    </div>

      <script>
    const donationContainer = document.getElementById("donation-container");
    const donations =fetch("/api/donations", {method: "GET"}).then(value => value.json()).then(({data}) => {
        console.log({data});
        donationContainer.innerHTML = "";
        if(!data.length){
            donationContainer.innerHTML = `
                <h1>Data belum ada</h1>
            `
            return;
        }

        const totalMakanan = document.getElementById("total-makanan");
        const totalRestoran= document.getElementById("total-restoran");
            fetch("/api/statistics/receiver/dashboard/summary", {method: "GET"}).then(response => response.json()).then(({data}) => {
        const totalResto = data.total_resto;
        const totalDonation = data.total_donation;
        totalMakanan.textContent = totalDonation;
        totalRestoran.textContent = totalResto;
    })


        data.forEach(resto => {
            console.log({resto});
            const imageUrl = `http://localhost:8000/storage/${resto.image_url}`;
            const item = `
            <div class="bg-[#4E9A9A] p-4 rounded text-white flex items-start space-x-4">
              <img src="${imageUrl}"  class="w-12 h-12 rounded" />
              <div>
                <h4 class="font-bold text-lg">${resto?.food_name} - ${resto.user?.name ?? "anonymous"}</h4>

                <div class="flex flex-wrap gap-2 mt-1 text-xs">
                    <span class="bg-[#317873] px-2 py-1 rounded">${resto.category}</span>
                </div>
                    <p class="mt-2 text-sm text-gray-200">302,624 Views ·  3000 Likes · 400 comments</p>
              </div>
            </div>
            `
            donationContainer.innerHTML += item;
        })
    })
  </script>
</body>
</html>
