
<?php
$host = 'localhost';
$db   = 'qlhoa';
$user = 'root';  // Tên người dùng MySQL
$pass = '';  // Mật khẩu MySQL
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Kết nối thành công!";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>


<?php
function getAllFlowers() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM hoa");
    return $stmt->fetchAll();
}

// Gọi hàm và hiển thị dữ liệu
$students = getAllStudents();
foreach ($students as $student) {
    echo $student['ten_sv'] . " - Tuổi: " . $student['tuoi'] . "<br>";
}
?>


