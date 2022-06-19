<?php

include_once 'database.php';

session_start();

if(isset($_SESSION['gebruikersnaam'])) {

} else{
    // User not loggedin
    header('Location: ./login/login.php');
}


$obj = new database();

$users = $obj->getSpelers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Spelers</title>
    <link rel="stylesheet" href="https:stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

</head>
<body>
<main> 
       <table class="table table-striped" id="overzicht">
           <thead class="thead-dark">
               <tr>
                   <th scope="col">ID</th>
                   <th scope="col">Voornaam</th>
                   <th scope="col">tussenvoegsel</th>
                   <th scope="col">Achternaam</th>
                   <th scope="col">school</th>
                   <th scope="col">Update</th>
                   <th scope="col">Delete</th>
               </tr>
           </thead>
           <tbody></tbody>
               <?php foreach ($users as $user): ?>
               <tr>
                   <td><?php echo $user['spelerID'];?></td>
                   <td><?php echo $user['voornaam'];?></td>
                   <td><?php echo $user['tussenvoegsel'];?></td>
                   <td><?php echo $user['achternaam'];?></td>
                   <td><?php echo $user['schoolnaam'];?></td>
                   <td class="Edit">
                       <a class="btn btn-primary mr-2 btn-sm" href="./spelers/update.php?id=<?php echo $user['spelerID']; ?>">Update</a>
                   </td>      
                   <td class="Delete">
                       <a class="btn btn-danger mr-2 btn-sm" href="./spelers/delete.php?id=<?php echo $user['spelerID']; ?>">Delete</a>
                   </td> 
               </tr>

               <?php endforeach; ?>               
                    <td class="Create">
                        <a class="btn btn-success mr-2 btn-sm" href="./spelers/create.php?id=">Create</a>
                    </td>
                    <td class="school">
                       <a class="btn btn-primary mr-2 btn-sm" href="school.php">School Gegevens</a>
                   </td>
                   <td class="toernooi">
                       <a class="btn btn-info mr-2 btn-sm" href="toernooi.php">Toernooi Gegevens</a>
                   </td>
                   <td class="aanmelding">
                       <a class="btn btn-info mr-2 btn-sm" href="aanmelding.php">Aanmelden Toernooi</a>
                   </td>
                   <td class="wedstrijd">
                       <a class="btn btn-info mr-2 btn-sm" href="./wedstrijd/wedstrijd.php">Wedstrijd Gegevens</a>
                   </td>        




           </tbody>
       </table>
       <a class="btn btn-warning mr-2 btn-sm" href="./logout/logout.php">Log out</a>

   </main>


   <script>
       $(document).ready( function () {
           $('#overzicht').DataTable();
       } );
   </script>
</body>
</html>