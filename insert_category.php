<?php

include('connection.php');

if(isset($_POST['insert_category'])){
    $Category_name = $_POST['category_name'];

    $insert_query = "insert into categories (categoryName) values ('$Category_name')";
    $res=mysqli_query($con,$insert_query);
    if($res)
    {
        echo "<script>alert('Category inserted successfully')</script>";
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
    <h1 class="text-center text-success">Category</h1>
    <form action="" method="post">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" value="Insert Category" name="insert_category" class="btn btn-info px-3 mb-3">
        </div>
    </form>
    <h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php

        $get_categories = "select * from categories";
        $result = mysqli_query($con,$get_categories);
        while($row=mysqli_fetch_assoc($result)){
            $categoryId = $row['categoryId'];
            $categoryName = $row['categoryName'];
            ?>
            
            <tr class='text-center'>
                <td><?php echo $categoryId;?></td>
                <td><?php echo $categoryName;?></td>
                <td><a href='index.php?edit_products=<?php echo $categoryId ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td><a href='index.php?delete_products=<?php echo $categoryId ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
            </tr>
           <?php
        }

        ?>
    </tbody>
</table>
</div>
</body>
</html>