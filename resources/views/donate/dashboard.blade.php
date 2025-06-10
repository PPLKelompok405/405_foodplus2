<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD+ | Dashboard Donasi</title>
    <!-- Import Google Font: Poppins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        .container-fluid {
            min-height: 100vh;
        }

        /* Sidebar styles are removed as the element is no longer present */

        /* Main Content */
        .main-content {
            width: 100%; /* Ensure main content takes full width */
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 24px;
            font-weight: 600;
            color: #2d7d8a; /* Using the logo color for title */
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
            width: 8px;
            height: 8px;
            background-color: red;
            border-radius: 50%;
            border: 2px solid #f5f5f5;
        }

        .content {
            margin-top: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            padding: 15px 20px;
        }

        .btn-primary {
            background-color: #2d7d8a;
            border: none;
        }

        .btn-primary:hover {
            background-color: #236570;
        }

        .table th {
            font-weight: 600;
            color: #555;
        }

        .badge {
            padding: 6px 10px;
        }

        .welcome-banner {
            background-color: #4a959b;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- Sidebar has been removed -->

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <div class="page-title">Dashboard Donasi</div>
                <div class="header-actions">
                    <div class="notification relative cursor-pointer" id="notification-button">
                        <i class="fas fa-bell"></i>
                        @if(count($notificationsNotRead) > 0)
                            <div class="notification-badge"></div>
                        @endif
                    </div>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" onclick="toggleDropdown()"
                            data-bs-toggle="dropdown">
                            Name
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" id="userDropdown" style="display: none;">
                            <li>
                                <form method="POST">
                                    @csrf
                                    <a class="dropdown-item" href="/profile">Profile</a>
                                    <button type="submit" class="dropdown-item" id="logout-button">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="welcome-banner">
                    <div id="banner-content">
                        <h2>Selamat Datang!</h2>
                        <p>Terima kasih telah bergabung dengan platform Food+. Anda dapat mendonasikan makanan untuk membantu mereka yang membutuhkan.</p>
                    </div>
                    <a href="#" id="donate-now-link" class="btn btn-warning mt-2">Donasi Sekarang</a>
                </div>

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Donasi Saya</h5>
                        <a href="#" id="add-donation-link" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Donasi
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama Makanan</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="donation-table-body">
                                    <!-- Data will be populated by JavaScript -->
                                    <tr>
                                        <td colspan="7" class="text-center">Memuat data donasi...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notification Modal -->
    <div class="modal" aria-labelledby="dialog-title" role="dialog" id="notificationModal" style="display: none;">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 py-3 sm:p-6">
                        <div class="text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <div class="flex justify-between items-center">
                                <h3 class="text-base font-semibold text-gray-900" id="dialog-title">Notifikasi</h3>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="cursor-pointer bg-blue-700 rounded-lg p-2 flex items-center justify-between max-w-md mx-auto text-white text-sm"
                                        id="read-all-notification" data-bs-dismiss="modal" aria-label="Close">Read
                                        All</button>
                                    <button type="button" class="cursor-pointer" id="close-notification-modal"
                                        data-bs-dismiss="modal" aria-label="Close">X</button>
                                </div>
                            </div>
                            <div class="mt-2" id="notification-list">
                                <!-- Notifications will be rendered here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // --- DOM Elements ---
        const notificationButton = document.getElementById("notification-button");
        const notificationModal = document.getElementById("notificationModal");
        const readAllNotification = document.getElementById("read-all-notification");
        const closeNotificationModal = document.getElementById("close-notification-modal");
        const dropdownMenuButton = document.getElementById("dropdownMenuButton");
        const bannerContent = document.getElementById("banner-content");
        const donationTableBody = document.getElementById('donation-table-body');
        const logoutButtonElement = document.getElementById("logout-button");

        // --- Event Listeners ---
        notificationButton.addEventListener("click", () => {
            notificationModal.style.display = "block";
        });

        readAllNotification.addEventListener("click", () => {
            fetch("/api/notifications/read-all", { method: "POST" })
                .then(response => response.json())
                .then(data => {
                    console.log({ data });
                    window.location.reload();
                });
        });

        closeNotificationModal.addEventListener("click", () => {
            notificationModal.style.display = "none";
        });
        
        logoutButtonElement.addEventListener("click", async (e) => {
            e.preventDefault();
            try {
                const response = await fetch("/api/auth/logout", {
                    method: "POST",
                    headers: {
                        "Authorization": `Bearer ${localStorage.getItem("accessToken")}`,
                        "Content-Type": "application/json"
                    }
                });
                const json = await response.json();
                localStorage.removeItem("accessToken");
                window.location.href = "/";
            } catch (err) {
                console.error("Logout failed:", err);
            }
        });

        // --- Functions ---
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        // --- API Calls on Page Load ---
        document.addEventListener('DOMContentLoaded', () => {
            const accessToken = localStorage.getItem("accessToken");
            if (!accessToken) {
                // Redirect to login if no token
                window.location.href = "/login"; 
                return;
            }

            // Fetch User Data
            fetch("/api/user", {
                headers: { "Authorization": `Bearer ${accessToken}` }
            })
            .then(response => response.json())
            .then(user => {
                dropdownMenuButton.textContent = user.name;
                bannerContent.innerHTML = `<h2>Selamat Datang, ${user.name}!</h2><p>Terima kasih telah bergabung dengan platform Food+. Anda dapat mendonasikan makanan untuk membantu mereka yang membutuhkan.</p>`;
                // Update donation links with correct routes (assuming they exist)
                document.getElementById('donate-now-link').href = '/donations/create';
                document.getElementById('add-donation-link').href = '/donations/create';
            })
            .catch(err => {
                console.error("Failed to fetch user:", err);
            });

            // Fetch Donations Data
            fetch('/api/donations/resto/all', {
                headers: { "Authorization": `Bearer ${accessToken}` }
            })
            .then(response => response.json())
            .then(({ data }) => {
                donationTableBody.innerHTML = ''; // Clear loading message

                if (!data || data.length === 0) {
                    donationTableBody.innerHTML = '<tr><td colspan="7" class="text-center">Belum ada donasi</td></tr>';
                    return;
                }

                data.forEach(donation => {
                    const statusBadge = donation.status === 'Tersedia' 
                        ? `<span class="badge bg-success">${donation.status}</span>`
                        : `<span class="badge bg-secondary">${donation.status}</span>`;

                    const row = `
                        <tr>
                            <td>${donation.food_name}</td>
                            <td>${donation.category}</td>
                            <td>${donation.quantity}</td>
                            <td>${donation.location}</td>
                            <td>${statusBadge}</td>
                            <td>${new Date(donation.created_at).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="/donations/${donation.id}" class="btn btn-sm btn-info" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                                    <a href="/donations/${donation.id}/edit" class="btn btn-sm btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="/donations/${donation.id}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus donasi ini?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    `;
                    donationTableBody.innerHTML += row;
                });
            })
            .catch(error => {
                console.error('Gagal mengambil data donasi:', error.message);
                donationTableBody.innerHTML = '<tr><td colspan="7" class="text-center">Terjadi kesalahan saat memuat data</td></tr>';
            });
        });

    </script>
</body>
</html>
