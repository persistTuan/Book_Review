<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page @yield("title")</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome/css/all.css')}}">
</head>

<body>
    <header>
        @include ('includes.header')
    </header>
    <div class="container-fluid">
        @yield("content")
    </div>
    <!-- <footer>
        
    </footer> -->
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
<script>
    // Lắng nghe sự kiện change của thẻ input
    const fileInput = document.getElementById("file-input");
    fileInput.addEventListener("change", () => {
        // Lấy đối tượng File chứa thông tin về ảnh
        const file = fileInput.files[0];

        // Nếu file là ảnh
        if (file.type.match("image/*")) {
            // Tạo đối tượng FileReader
            const fileReader = new FileReader();

            // Đọc nội dung của ảnh
            fileReader.readAsDataURL(file);

            // Khi đọc xong nội dung của ảnh
            fileReader.onload = () => {
                // Hiển thị ảnh
                const imagePreview = document.getElementById("image-preview");
                imagePreview.src = fileReader.result;
            };
        }
    });
</script>

</html>