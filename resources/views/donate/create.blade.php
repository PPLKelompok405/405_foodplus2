<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD+ | Tambah Donasi</title>

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
            display: flex;
            justify-content: center; /* Center the content */
            align-items: flex-start; /* Align content to the top */
        }
        
        .main-content {
            width: 100%;
            max-width: 800px; /* Set a max-width for better readability on large screens */
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .page-title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .form-container {
            padding: 10px 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            margin-bottom: 10px;
            color: #333;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-input:focus, .form-select:focus {
            outline: none;
            border-color: #2d7d8a;
            box-shadow: 0 0 0 3px rgba(45, 125, 138, 0.2);
        }
        
        #image_url {
            padding: 20px;
            border: 2px dashed #ccc;
            background-color: #fafafa;
            cursor: pointer;
            transition: border-color 0.3s, background-color 0.3s;
        }

        #image_url:hover {
            border-color: #2d7d8a;
            background-color: #f0f8fa;
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }
        
        .btn-action {
            border: none;
            border-radius: 8px;
            padding: 15px 30px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s, transform 0.2s;
        }

        .save-btn {
            background-color: #2d7d8a;
            color: white;
        }

        .save-btn:hover {
            background-color: #236570;
            transform: translateY(-2px);
        }

        .cancel-btn {
            background-color: #e0e0e0;
            color: #333;
        }
        
        .cancel-btn:hover {
            background-color: #d1d1d1;
        }

        #alert-message {
            display: none;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        #alert-message.success {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        #alert-message.error {
            background-color: #f8d7da;
            color: #842029;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar has been removed -->

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <a href="/donate/dashboard" class="btn btn-light"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
                <div class="page-title">Tambah Donasi Baru</div>
            </div>

            <div class="content">
                <div class="form-container">
                    
                    <!-- Alert Message Placeholder -->
                    <div id="alert-message"></div>

                    <form id="donation-form" enctype="multipart/form-data">
                        <!-- CSRF token will be sent via headers in JS, but keeping it can be a fallback -->
                        @csrf 
                        <div class="form-group">
                            <label class="form-label" for="image_url">Upload Gambar Makanan</label>
                            <input type="file" name="image" id="image_url" class="form-input" required>
                            <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">
                                Format yang diizinkan: .jpg, .jpeg, .png. Ukuran maksimal: 4MB.
                            </small>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="food_name">Nama Makanan</label>
                            <input type="text" id="food_name" name="food_name" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="category">Kategori Makanan</label>
                            <select name="category" id="category" class="form-select" required>
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="quantity">Jumlah (Porsi)</label>
                            <input type="number" id="quantity" name="quantity" class="form-input" min="1" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="location">Lokasi Pengambilan</label>
                            <input type="text" id="location" name="location" class="form-input" required>
                        </div>

                        <div class="form-actions">
                            <a href="/donate/dashboard" class="cancel-btn btn-action">Batal</a>
                            <button type="submit" class="save-btn btn-action" id="submit-button">Simpan Donasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const donationForm = document.getElementById("donation-form");
        const submitButton = document.getElementById("submit-button");
        const alertMessage = document.getElementById("alert-message");

        donationForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            submitButton.disabled = true;
            submitButton.textContent = "Menyimpan...";

            // Clear previous alert
            alertMessage.style.display = "none";
            alertMessage.textContent = "";
            alertMessage.className = "";

            const formData = new FormData();
            formData.append('image', document.getElementById('image_url').files[0]);
            formData.append('food_name', document.getElementById('food_name').value);
            formData.append('category', document.getElementById('category').value);
            formData.append('quantity', document.getElementById('quantity').value);
            formData.append('location', document.getElementById('location').value);
            
            try {
                const response = await fetch("/api/donations", {
                    method: "POST",
                    headers: {
                        // The 'Content-Type' header is not needed here; the browser sets it for FormData.
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${localStorage.getItem("accessToken")}`,
                    },
                    body: formData
                });

                const result = await response.json();

                if (response.ok) {
                    showAlert("Donasi berhasil ditambahkan!", "success");
                    donationForm.reset();
                    setTimeout(() => {
                        window.location.href = "/donate/dashboard";
                    }, 2000); // Redirect after 2 seconds
                } else {
                    // Handle validation errors or other server errors
                    const errorMessage = result.message || "Terjadi kesalahan. Silakan coba lagi.";
                    showAlert(errorMessage, "error");
                }
            } catch (err) {
                console.error("An error occurred:", err);
                showAlert("Tidak dapat terhubung ke server. Periksa koneksi Anda.", "error");
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = "Simpan Donasi";
            }
        });

        function showAlert(message, type) {
            alertMessage.textContent = message;
            alertMessage.className = type; // 'success' or 'error'
            alertMessage.style.display = "block";
            window.scrollTo(0, 0); // Scroll to the top to make the message visible
        }

    </script>
</body>

</html>
