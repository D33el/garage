<?php 

if(isset($_POST['submit'])){
 $go = new servicesController;
 $go->updateService();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
   <div  style="flex-direction:column;">
      <form method="post" enctype='multipart/form-data'>
       <input type="text" name="service" placeholder="service">
       <input type="file" name="imageService">
       <input type="description" name="description" placeholder="description">
       <button type="submit" name="submit">
          go
       </button>
      </form>
   </div>
</body>
</html>