<?php
$flowers = [
    ['name' => 'Do Quyen' , 'description' => 'Đỗ Quyên là loài hoa có màu sắc rực rỡ, từ hồng đậm đến tím, thường nở ở các khu vực miền núi của Việt Nam, đặc biệt là ở những vùng khí hậu mát mẻ. Hoa Đỗ Quyên được biết đến với vẻ đẹp nổi bật và sức sống mãnh liệt. Hoa tượng trưng cho sự thanh tao và bình yên.' , 'image' => '../Assets/Images/doquyen.jpg'],
    ['name' => 'Hai Duong' , 'description' => 'Hải Dương là loài hoa mai vàng, tượng trưng cho sự thịnh vượng và may mắn trong văn hóa Việt Nam, đặc biệt vào dịp Tết Nguyên Đán. Hoa có màu vàng tươi, mang đến niềm vui và hy vọng, tượng trưng cho sự ấm áp của mùa xuân và sự phát triển bền vững.' , 'image' => '../Assets/Images/haiduong.jpg'],
    ['name' => 'Mai' , 'description' => 'Mai là một trong những loài hoa đặc trưng của Tết Nguyên Đán ở Việt Nam. Với những cánh hoa màu hồng nhạt, hoa Mai tượng trưng cho sự đổi mới và hy vọng. Hoa Mai mang đến cảm giác tươi mới, báo hiệu một năm mới an lành và hạnh phúc' , 'image' => '../Assets/Images/mai.jpg'],
    ['name' => 'Tuong Vy ', 'description' => 'Tường Vy, hay còn gọi là hoa Plumeria, là loài hoa nhiệt đới nổi tiếng với hương thơm ngọt ngào và những cánh hoa trắng hoặc vàng. Loài hoa này thường được trồng trong các khu vườn trang trí và còn được dùng trong y học cổ truyền. Tường Vy tượng trưng cho sự thuần khiết, thanh nhã và duyên dáng.' , 'image' => '../Assets/Images/tuongvy.jpg'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--Hien thi nguoi dung khach-->
<?php
foreach ($flowers as $flower) {
    echo "<h2>" . $flower['name'] . "</h2>";
    echo "<p>" . $flower['description'] . "</p>";
    echo "<img src='" . $flower['image'] . "' alt='" . $flower['name'] . "' width='200'>";
    echo "<hr>";
}
?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html> 