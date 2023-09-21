<?php

$mainPage = "http://localhost/demo";
$saveAction = "http://localhost/demo/save-data.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Multiple Fields</title>
   <link rel="stylesheet" href="index.css">
</head>

<body>
   <div class="container-center">
      <form id="dynamic-form" method="post" action="<?= $saveAction ?>">
         <div class="container-field">
            <input class="input" type="text" name="name[]" placeholder="Name...">
            <input class="input" type="text" name="address[]" placeholder="Address...">
            <button type="button" class="btn btn-remove">Remove</button>
         </div>
         <div id="container-action">
            <a class="btn" href="<?= $mainPage ?>">Back</a>
            <button class="btn btn-add" type="button" id="add-field">Add Field</button>
            <button class="btn btn-submit" type="submit">Submit</button>
         </div>
      </form>
   </div>

   <script src="./create-page.js"></script>

</body>

</html>