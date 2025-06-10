<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            padding: 2rem;
            background-color: #fff;
            color: #111;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 1rem;
            color: #1e2a47;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-box {
            background-color: #f5fafa;
            padding: 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
        }

        .stat-box i {
            font-size: 22px;
        }

        .donation-box {
            background-color: #4ba4a3;
            color: white;
            padding: 1.5rem;
            border-radius: 12px;
            width: 220px;
            float: right;
            margin-bottom: 3rem;
        }

        .donation-box h2 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .donation-box p {
            font-size: 24px;
            font-weight: bold;
        }

        .donation-box small {
            font-size: 13px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1rem;
        }

        .search-bar input {
            flex: 1;
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #1e7f7f;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #136b6b;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .aksi-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            border: none;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            color: white;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .btn-view {
            background-color: #3498db;
        }

        .btn-edit {
            background-color: #f1c40f;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .notification {
            position: relative;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 6px;
            height: 6px;
            background-color: red;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <div class="flex justify-between">
        <h1>Dashboard Admin</h1>
        <div class="header">
            <div class="relative">
                <!-- Notification dot -->
                {{-- <div class="absolute -top-1 -left-1 w-3 h-3 bg-red-500 rounded-full z-10"></div> --}}

                <!-- Profile dropdown button -->
                <div class="relative">
                    <button id="profileButton"
                        class="flex items-center space-x-2 bg-white border border-gray-300 rounded px-3 py-2 text-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span id="profile-name"></span>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownMenu"
                        class="absolute right-0 mt-1 w-32 bg-white border border-gray-200 rounded-md shadow-lg z-20 hidden">
                        <div class="py-1">
                            <a href="/profile"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" id="logout-button"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="stats-container">
        <div class="stat-box"><i>👤</i><span>Total Donatur<br>13</span></div>
        <div class="stat-box"><i>🍽️</i><span>Total Restoran<br>16</span></div>
        <div class="stat-box"><i>📋</i><span>Total Penerima<br>0</span></div>
        <div class="stat-box"><i>🥘</i><span>Total Makanan Tersedia<br>13</span></div>
        <div class="stat-box"><i>💸</i><span>Total Pengeluaran<br>13</span></div>
        <div class="stat-box"><i>🚚</i><span>Total Pengiriman<br>13</span></div>
    </div>

    <div class="donation-box">
        <h2>Donasi Harian</h2>
        <p>90pcs</p>
        <small>9 February 2025</small>
    </div>

    <div style="clear: both;"></div>

    <h2 style="margin-top: 4rem;">Data Akun Donatur</h2>

    <div class="search-bar">
        <input type="text" placeholder="Search Akun Donatur..." id="searchDonaturInput" value="{{ $searchQuery ?? '' }}">
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Donatur</th>
                <th>Tanggal Pembuatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donatur as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->created_at)->format('d-m-Y') }}</td>
                    <td>
                        <div class="aksi-buttons">
                            <button class="btn-icon btn-delete" data-id="{{ $d->id }}">🗑️</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        console.log('Script is loaded!'); // Debugging: Check if script is loaded at all
        document.addEventListener('DOMContentLoaded', function () {
            const userId = getCookie('user_id');
            fetch(`/api/user/${userId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('profile-name').textContent = data.data.name;
                })
                .catch(error => console.error('Error fetching user data:', error));


            const profileButton = document.getElementById('profileButton');
            const dropdownMenu = document.getElementById('dropdownMenu');

            profileButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });

            window.addEventListener('click', function (event) {
                if (!profileButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            document.getElementById('logout-button').addEventListener('click', function (e) {
                e.preventDefault();
                fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(() => {
                    window.location.href = '/guest/dashboard';
                });
            });

            // Delete functionality
            document.querySelectorAll('.btn-delete').forEach(button => {
                button.addEventListener('click', function () {
                    console.log('Delete button clicked!'); // Debugging: Check if click event fires
                    const donaturId = this.dataset.id;
                    if (confirm('Apakah Anda yakin ingin menghapus donatur ini?')) {
                        console.log('Confirmation OK, attempting to delete ID:', donaturId); // Debugging: Check if confirmation passed
                        fetch(`/admin/donatur/${donaturId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            alert(data.message);
                            location.reload(); // Reload the page to show updated data
                        })
                        .catch(error => {
                            console.error('There was a problem with the delete operation:', error);
                            alert('Gagal menghapus donatur.');
                        });
                    }
                });
            });

            // Search functionality
            const searchInput = document.getElementById('searchDonaturInput');
            searchInput.addEventListener('keyup', function (event) {
                if (event.key === 'Enter') { // Trigger search on Enter key
                    const searchQuery = this.value;
                    const currentUrl = new URL(window.location.href);
                    currentUrl.searchParams.set('search', searchQuery);
                    window.location.href = currentUrl.toString();
                }
            });

            function getCookie(name) {
                const value = `; ${document.cookie}`;
                const parts = value.split(`; ${name}=`);
                if (parts.length === 2) return parts.pop().split(';').shift();
            }
        });

    </script>
</body>

</html>
