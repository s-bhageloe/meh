<?php

include_once 'database.php';

$obj = new database();

$toernooien = $obj->getAanmelding();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht toernooien</title>
    <link rel="stylesheet" href="https:stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

</head>
<body>
<main> 
       <table class="table table-striped" id="overzicht">
           <thead class="thead-dark">
               <tr>
                   <th scope="col">aanmeldingsID</th>
                   <th scope="col">speler</th>
                   <th scope="col">toernooi</th>
                   <th scope="col">Update</th>
                   <th scope="col">Delete</th>
               </tr>
           </thead>
           <tbody></tbody>
               <?php foreach ($toernooien as $toernooi): ?>
               <tr>
                   <td><?php echo $toernooi['aanmeldingsID'];?></td>
                   <td><?php echo $toernooi['voornaam']." ".$toernooi['tussenvoegsel']." ".$toernooi['achternaam'];?></td>
                   <td><?php echo $toernooi['omschrijving']." ".$toernooi['datum'];?></td>
                   <td class="Edit">
                       <a class="btn btn-primary mr-2 btn-sm" href="./aanmelden/updateAanmelding.php?id=<?php echo $toernooi['aanmeldingsID']; ?>">Update</a>
                   </td>      
                   <td class="Delete">
                       <a class="btn btn-danger mr-2 btn-sm" href="./aanmelden/deleteAanmelding.php?id=<?php echo $toernooi['aanmeldingsID']; ?>">Delete</a>
                   </td> 
               </tr>

               <?php endforeach; ?>               
                    <td class="Create">
                        <a class="btn btn-success mr-2 btn-sm" href="./aanmelden/createAanmelding.php?id=">Create</a>
                    </td>
                    <td class="index">
                       <a class="btn btn-primary mr-2 btn-sm" href="index.php">Terug</a>
                   </td>      

           </tbody>
       </table>

   </main>


   <script>
       $(document).ready( function () {
           $('#overzicht').DataTable();
       } );
   </script>
</body>
</html>