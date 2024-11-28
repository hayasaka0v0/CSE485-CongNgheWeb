<?php
// Array to store flower data
$flowers = [
    ['name' => 'Do Quyen', 'description' => 'Đỗ Quyên là loài hoa có màu sắc rực rỡ, từ hồng đậm đến tím, thường nở ở các khu vực miền núi của Việt Nam, đặc biệt là ở những vùng khí hậu mát mẻ. Hoa Đỗ Quyên được biết đến với vẻ đẹp nổi bật và sức sống mãnh liệt. Hoa tượng trưng cho sự thanh tao và bình yên.', 'image' => '../Assets/Images/doquyen.jpg'],
    ['name' => 'Hai Duong', 'description' => 'Hải Dương là loài hoa mai vàng, tượng trưng cho sự thịnh vượng và may mắn trong văn hóa Việt Nam, đặc biệt vào dịp Tết Nguyên Đán. Hoa có màu vàng tươi, mang đến niềm vui và hy vọng, tượng trưng cho sự ấm áp của mùa xuân và sự phát triển bền vững.', 'image' => '../Assets/Images/haiduong.jpg'],
    ['name' => 'Mai', 'description' => 'Mai là một trong những loài hoa đặc trưng của Tết Nguyên Đán ở Việt Nam. Với những cánh hoa màu hồng nhạt, hoa Mai tượng trưng cho sự đổi mới và hy vọng. Hoa Mai mang đến cảm giác tươi mới, báo hiệu một năm mới an lành và hạnh phúc', 'image' => '../Assets/Images/mai.jpg'],
    ['name' => 'Tuong Vy ', 'description' => 'Tường Vy, hay còn gọi là hoa Plumeria, là loài hoa nhiệt đới nổi tiếng với hương thơm ngọt ngào và những cánh hoa trắng hoặc vàng. Loài hoa này thường được trồng trong các khu vườn trang trí và còn được dùng trong y học cổ truyền. Tường Vy tượng trưng cho sự thuần khiết, thanh nhã và duyên dáng.', 'image' => '../Assets/Images/tuongvy.jpg'],
];

// Check if the form is submitted to add a new flower
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_flower'])) {
    // Get the image file from $_FILES
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_error = $_FILES['image']['error'];

    // Check if there is an error in the upload
    if ($image_error === 0) {
        // Set a unique name for the uploaded image to avoid conflicts
        $image_new_name = uniqid('', true) . '.' . pathinfo($image_name, PATHINFO_EXTENSION);
        $image_upload_path = '../Assets/Images/' . $image_new_name;

        // Move the file to the desired directory
        if (move_uploaded_file($image_tmp_name, $image_upload_path)) {
            // Add the new flower data with the uploaded image path
            $new_flower = [
                "name" => htmlspecialchars($_POST['name']),
                "description" => htmlspecialchars($_POST['description']),
                "image" => $image_upload_path, // Store the path of the uploaded image
            ];
            // Add the new flower to the array
            $flowers[] = $new_flower;
        } else {
            echo "There was an error uploading the file.";
        }
    } else {
        echo "Error uploading the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hoa CRUD</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   
    <div class="box1">
        <h2>Flowers</h2>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Them hoa</button>
    </div>

    <!-- Table -->
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Ten hoa</th>
                <th>Mo ta</th>
                <th>Anh</th>
                <th>Chuc nang</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($flowers as $flower): ?>
                <tr>
                    <td><?php echo $flower['name']; ?></td> <!-- Display flower name -->
                    <td><?php echo $flower['description']; ?></td> <!-- Display flower description -->
                    <td><img src="<?php echo $flower['image']; ?>" alt="<?php echo $flower['name']; ?>"
                            style="width: 50px; height: auto;"></td> <!-- Display flower image with size limit -->
                    <td>
                        <i class="bi bi-pencil" style="cursor: pointer;" title="Chỉnh sửa"></i> <!-- Edit icon -->
                        <i class="bi bi-trash3" style="cursor: pointer;" title="Xóa"></i> <!-- Delete icon -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Modal Form for Adding Flower with Image Upload -->
    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Flower</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Flower Name Input -->
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Flower Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter flower name" required>
                        </div>

                        <!-- Flower Description Input -->
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter flower description" required></textarea>
                        </div>

                        <!-- Flower Image Upload Input -->
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Upload Flower Image</label>
                            <input type="file" class="form-control" name="image" id="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="add_flower" value="Add Flower">
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</html>
