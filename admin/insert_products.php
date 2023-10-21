<?php 
if(!isset($_SESSION['username'])){
    header("location: login.php");
  }
  
  require("../functions.php");
  if(isset($_POST['insert_products'])){
    $product_title = safe_value($con,$_POST['product_title']);
    $product_description = safe_value($con,$_POST['product_description']);
    $product_keywords = safe_value($con,$_POST['product_keywords']);
    $product_category = safe_value($con,$_POST['product_category']);
    $product_brand = safe_value($con,$_POST['product_brand']);
    $product_price = safe_value($con,$_POST['product_price']);
    $product_status = 1;

    //accessing images
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing image temp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title == '' or $product_description=='' or $product_keywords=='' or $product_category =='' or $product_brand =='' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 ==''){
      echo "<script>alert('Please insert all available fields');</script>";
    }else{
      move_uploaded_file($temp_image1, "../images/product_images/$product_image1");
      move_uploaded_file($temp_image2, "../images/product_images/$product_image2");
      move_uploaded_file($temp_image3, "../images/product_images/$product_image3");

      // products insert query
      $insert_products = "insert into products_tb (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
      $insert_product_result = mysqli_query($con,$insert_products);
      if($insert_product_result){
        echo "<script>alert('Product details inserted successfully');</script>";
      }else{
        echo "<script>alert('Unable to insert product details');</script>";
      }
    }
  }
?>
<div class="row" >
  <form action="" method="post" enctype="multipart/form-data">
  <u><h3 class="text-center">Insert Product Details</h3></u>
  <div class="form-group my-2">
    <label for="product_title">Product Title</label>
    <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Enter Product Title">
  </div>
  <div class="form-group my-2">
    <label for="product_description">Product Description</label>
    <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Enter Product Description">
  </div>
  <div class="form-group my-2">
    <label for="product_description">Product Keywords</label>
    <input type="text" class="form-control" id="product_keywords" name="product_keywords" placeholder="Enter Product Keywords">
  </div>
   <div class="form-group my-2">
    <select class="form-control" id="product_category" name="product_category">
      <option value="">---Select Category---</option>
      <?php 
        $category_query = "select * from categories_tb order by category_name";
        $category_result = mysqli_query($con,$category_query);
        while($category = mysqli_fetch_assoc($category_result)){
      ?>
      <option value="<?=$category['category_id'];?>"><?=$category['category_name'];?></option>
      <?php } ?>
    </select>
  </div>
  <div class="form-group my-2">
    <select class="form-control" id="product_brand" name="product_brand">
      <option value="">---Select Brand---</option>
      <?php 
        $brand_query = "select * from brands_tb order by brand_name";
        $brand_result = mysqli_query($con,$brand_query);
        while($brand = mysqli_fetch_assoc($brand_result)){
      ?>
      <option value="<?=$brand['brand_id'];?>"><?=$brand['brand_name'];?></option>
      <?php } ?>
    </select>
  </div>
   <div class="form-group my-2">
    <label for="product_description">Product Image1</label>
    <input type="file" class="form-control" id="product_image1" name="product_image1">
  </div>
  <div class="form-group my-2">
    <label for="product_description">Product Image2</label>
    <input type="file" class="form-control" id="product_image2" name="product_image2">
  </div>
  <div class="form-group my-2">
    <label for="product_description">Product Image3</label>
    <input type="file" class="form-control" id="product_image3" name="product_image3">
  </div>
  <div class="form-group my-2">
    <label for="product_description">Product Price</label>
    <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price">
  </div>
  <div class="form-group my-2">
    <button type="submit" class="btn btn-primary" name="insert_products">Submit</button>
  </div>
</form>
</div>