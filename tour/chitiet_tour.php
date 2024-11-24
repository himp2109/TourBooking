<?php
require "../connect.php";
$type = $kq = '';
$id = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Kiểm tra ID
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
        die("ID không hợp lệ.");
    }

    $query = "SELECT * FROM `tour` WHERE `id_tour` = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $dest = $row['id_dest'];
        $dura = $row['duration'];
        $date = $row['date'];
        $time = $row['time'];
        $gia = $row['price'];
        $desc = $row['desc'];
    } else {
        die("Tour không tồn tại.");
    }
} else {
    die("Không có ID được cung cấp.");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Du Lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;

        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            text-align: center;
            color:white;
        }
        .navbar-nav {
            margin: auto;
        }
        .nav-link {
            color: #ffffff !important;
        }
        nav a {
            margin: 0 15px;
            color: white;
            text-decoration: none;
        }
        .tour-list {
            flex: 1;
            display: flex;
            flex-direction: column; /* Sắp xếp theo cột */
            align-items: center; /* Canh giữa các mục */
            padding: 20px;
        }
        .tour-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 15px;
            width: 80%; /* Chiếm 80% chiều rộng */
            text-align: center;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }




        .tour-list .card {
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .tour-list .card:hover {
            transform: translateY(-5px);
        }

        .tour-list .card-title {
            font-size: 1.2em;
            font-weight: bold;
        }

        .tour-list .card-text {
            font-size: 0.9em;
        }

        .tour-list .btn {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>

<header>
    <div class="container">
        <h1>Chào Mừng Đến Với Tour Du Lịch</h1>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <p class="nav-link dropdown-toggle" id="tourDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tour
                        </p>
                        <ul class="dropdown-menu" aria-labelledby="tourDropdown">
                            <li><a class="dropdown-item" href="tour/tour_trongnuoc.php">Trong nước</a></li>
                            <li><a class="dropdown-item" href="tour/tour_ngoainuoc.php">Ngoài nước</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vé máy bay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Khách sạn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thuê xe</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="container">
    <div class="tour-info">
        <h2>Giới thiệu Tour Du Lịch: <span id="tour-name"><?php echo $name?></span></h2>
        <h3>Thông tin tour</h3>
        <p><strong>Điểm đến:</strong> <span id="destination"><?php echo $dest?></span></p>
        <p><strong>Thời gian:</strong> <span id="duration"><?php echo $dura?></span></p>
        <p><strong>Ngày khởi hành:</strong> <span id="date"><?php echo $date?></span></p>
        <p><strong>Giờ khởi hành:</strong> <span id="time"><?php echo $time?></span></p>
        <p class="price"><strong>Giá:</strong> <span id="price"><?php echo $gia?></span></p>
    </div>
    <div class="description">
        <h4>Mô tả tour</h4>
        <p id="description"><?php echo $desc?></p>
    </div>
    <a href="#" class="btn">Đặt tour ngay</a>
</div>

<footer>
    <p>Địa chỉ: 123 Đường Du Lịch, Thành Phố Hồ Chí Minh</p>
    <p>Điện thoại: 0123 456 789</p>
    <p>Email: info@tourdulich.com</p>
</footer>

</body>
</html>