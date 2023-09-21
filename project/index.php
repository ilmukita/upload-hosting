   <?php
   require './connect-db.php';

   use MyApp\Database\Connection;

   $pageCreate = "http://localhost/demo/create-page.php";
   $editPage = "http://localhost/demo/edit-page.php";
   $actionRemove = "http://localhost/demo/delete-data.php";

   $koneksi = Connection::getInstance();
   $sql = "SELECT * FROM contacts";
   $result = $koneksi->koneksi->query($sql);

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

         <table>
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th style="width: 1%"><a href="<?= $pageCreate ?>" class="btn">Create</a></th>
               </tr>
            </thead>
            <tbody>
               <?php

               if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                     $id = $row["id"];
                     echo "<tr>
                     <td>" . $row["name"] . "</td>
                     <td>" . $row["address"] . "</td>
                     <td>
                     <div class='btn-list'>
                     <button type='button' role='button-edit' data-id='" . $id . "' class='btn'>Edit</button> 
                     <button type='button' role='button-remove' data-id='" . $id . "' class='btn btn-remove'>Remove</button>
                     </div>
                     </td>
                     </tr>";
                  }
               } else {
                  echo "<tr><td colspan='100%' style='text-align: center;'>Not found</td></tr>";
               }
               ?>

            </tbody>
         </table>
      </div>
      <form id="form-edit" method="POST" action="<?= $editPage ?>">
         <input type="hidden" name="id" value="" />
      </form>
      <form id="form-remove" method="POST" action="<?= $actionRemove ?>">
         <input type="hidden" name="id" value="" />
      </form>
      <script src="./index.js"></script>

   </body>

   </html>