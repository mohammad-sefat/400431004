<?php

include('database.php');

function uploadImage($image)
{
    $name = $image['image']['name'];
    $name = explode('.', $name);
    $name = "product_image_" . random_int(100, 10000) . '.' . $name[1];
    move_uploaded_file($image['image']['tmp_name'], "images/$name");
    return $name;
}

if (isset($_POST['submit']) && isset($_FILES['image'])) {
    $productName = $_POST['product_name'];
    $sellerName = $_POST['seller_name'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $details = $_POST['details'];

    $image = uploadImage($_FILES);
    $image = "images/".$image;

    $sql = "INSERT INTO products (product_name, seller_name , price, count, details , image) VALUES (?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$productName, $sellerName, $price, $count, $details, $image]);
}

?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل ادمین</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <header class="main-header">
        <nav class="not-change">
            <ul>
                <li><a href="index.html">ورود به صفحه محصولات</a></li>
            </ul>
        </nav>
    </header>
    <main>
       <h1 class="seller-title">فرم افزودن محصول</h1>
      <form action="#" class="seller-form">
          <label for="product-image-upload">
              <span class="upload-btn form-btn">
                  آپلود عکس محصول
              </span>
                  <br>
              <input type="file" required accept="image/*" id="product-image-upload">
          </label>
          <div class="image">
              <img  alt="عکس محصول انتخاب شده"  id="preview">
          </div>
          <label for="product-name">
                نام محصول: <br>
              <input type="text" required id="product-name">
          </label>
          <label for="shop-name">
                نام فروشگاه: <br>
              <input type="text" required id="shop-name">
          </label>
          <label for="product-price">
                قیمت محصول : <br>
              <input type="number" required id="product-price">
          </label>
          <label for="product-availability">
                تعداد موجودی محصول : <br>
              <input type="number" required id="product-availability">
          </label>
          <label for="product-details">
                 توضیحات محصول : <br>
              <textarea required id="product-details"></textarea>
          </label>
          <button class="form-btn">افزودن</button>
      </form>
    </main>

    <script>

        let loadFile = function(event) {
            let image = document.getElementById('preview');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        
        let file_input = document.getElementById('product-image-upload');
        file_input.addEventListener('change',loadFile)
        
    </script>
</body>

</html>