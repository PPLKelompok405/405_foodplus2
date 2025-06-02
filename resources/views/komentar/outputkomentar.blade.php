<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFC Reviews</title>
    <style>
        /* Basic CSS for layout - You'll need more for exact styling */
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f0f2f5;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: white;
            border-bottom: 1px solid #eee;
        }
        .header .back-arrow {
            font-size: 24px;
            cursor: pointer;
        }
        .header .add-comment-button {
            background-color: #4d9ca6; 
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .header .add-comment-button img {
            margin-right: 5px;
        }
        .kfc-info {
            text-align: center;
            padding: 30px 20px;
            background-color: white;
            margin-top: 10px;
        }
        .kfc-info img {
            width: 80px; /* Adjust size as needed */
            margin-bottom: 10px;
        }
        .kfc-info .rating {
            color: #ffc107; /* Star color */
            font-size: 24px;
            margin-bottom: 10px;
        }
        .kfc-info .stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }
        .kfc-info .stat-item {
            background-color: #e0e0e0;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .reviews-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }
        .review-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .review-card .stars {
            color: #ffc107; /* Star color */
            margin-bottom: 10px;
            font-size: 18px;
        }
        .review-card .username {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .review-card .comment-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .review-card .comment-text {
            color: #555;
            margin-bottom: 10px;
            line-height: 1.4;
        }
        .review-card .donations, .review-card .date {
            font-size: 13px;
            color: #888;
            margin-top: 10px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <span class="back-arrow">&larr;</span>
        <a href="#" class="add-comment-button">
            <span>+ Tambah Komen</span>
        </a>
    </div>

    <div class="kfc-info">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bf/KFC_logo.svg/1200px-KFC_logo.svg.png" alt="KFC Logo">
        <div class="rating">
            ★★★★★
        </div>
        <div class="stats">
            <span class="stat-item">10,241 Views</span>
            <span class="stat-item">36,645 Likes</span>
            <span class="stat-item">2K Comments</span>
        </div>
    </div>

    <div class="reviews-container">
        <div class="review-card">
            <div class="stars">★★★★★</div>
            <div class="username">Abdul</div>
            <div class="comment-title">Mantap</div>
            <div class="comment-text">Makanan yang diterima masih sangat bisa dikonsumsi dengan baik</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 5</div>
            <div class="date">11 Januari 2025</div>
        </div>

        <div class="review-card">
            <div class="stars">★★★★★</div>
            <div class="username">Dafa</div>
            <div class="comment-title">Mantap</div>
            <div class="comment-text">Makanan yang diterima masih sangat bisa dikonsumsi dengan baik</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 5</div>
            <div class="date">16 Februari 2025</div>
        </div>

        <div class="review-card">
            <div class="stars">★★★★★</div>
            <div class="username">Hendra</div>
            <div class="comment-title">Mantap</div>
            <div class="comment-text">Makanan yang diterima masih sangat bisa dikonsumsi dengan baik</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 8</div>
            <div class="date">7 Maret 2025</div>
        </div>

        <div class="review-card">
            <div class="stars">★★★★★</div>
            <div class="username">Buluk</div>
            <div class="comment-title">Mantap</div>
            <div class="comment-text">Makanan yang diterima masih sangat bisa dikonsumsi dengan baik</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 1</div>
            <div class="date">9 Juni 2025</div>
        </div>

        <div class="review-card">
            <div class="stars">★★★★☆</div>
            <div class="username">Maru</div>
            <div class="comment-title">Mantap</div>
            <div class="comment-text">Makanan yang diterima masih sangat bisa dikonsumsi dengan baik</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 5</div>
            <div class="date">16 Januari 2025</div>
        </div>

        <div class="review-card">
            <div class="stars">★★★☆☆</div>
            <div class="username">Hilman</div>
            <div class="comment-title">Kurang Enak</div>
            <div class="comment-text">Makanan yang diterima sudah dingin</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 3</div>
            <div class="date">12 Februari 2025</div>
        </div>

        <div class="review-card">
            <div class="stars">★★★★★</div>
            <div class="username">Adam</div>
            <div class="comment-title">Mantap</div>
            <div class="comment-text">Makanan yang diterima masih sangat bisa dikonsumsi dengan baik</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 7</div>
            <div class="date">10 Maret 2025</div>
        </div>

        <div class="review-card">
            <div class="stars">★★★★★</div>
            <div class="username">Laroi</div>
            <div class="comment-title">Mantap</div>
            <div class="comment-text">Makanan yang diterima masih sangat bisa dikonsumsi dengan baik</div>
            <div class="donations">Jumlah Donasi Yang Diterima: 4</div>
            <div class="date">15 Juni 2025</div>
        </div>
    </div>
</body>
</html>