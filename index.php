<?php

include('connection.php');

if(isset($_POST['insert_product'])){
    $productName = $_POST['product_name'];
    $CategoryId = $_POST['product_category'];

    $insert = "insert into products (productName,CategoryId) values ('$productName','$CategoryId')";
    $result = mysqli_query($con,$insert);
    if($result)
    {
        echo "<script>alert('Product inserted successfully')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-5">
    <h1 class="text-center text-success">Product</h1>
    <form action="" method="post">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select" required>
                <?php
                $show = "Select * from categories";
                $res = mysqli_query($con,$show);
                while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <option value="<?php echo($CategoryId= $row['categoryId']) ?> "><?php echo($row['categoryName']) ?> </option>
                <?php }
                ?>
            </select>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" value="Insert Products" name="insert_product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
    <h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php

        $get_products = "select * from products";
        $result = mysqli_query($con,$get_products);
        while($row=mysqli_fetch_assoc($result)){
            $productId = $row['productId'];
            $productName = $row['productName'];
            $CategoryId = $row['CategoryId'];
            ?>
            
            <tr class='text-center'>
                <td><?php echo $productId;?></td>
                <td><?php echo $productName;?></td>
                <td><?php echo $CategoryId;?></td>
                <td><a href='index.php?edit_products=<?php echo $productId ?>' class='text-light' name='edit'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_products=<?php echo $productId ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
           <?php
        }

        ?>
    </tbody>
</table>
</div>
</body>
</html>