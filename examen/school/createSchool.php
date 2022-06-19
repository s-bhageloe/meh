<?php

include_once '../database.php';

$obj = new database();

if(isset($_POST['submit'])){  
    $fieldnames = ['schoolnaam'];

    $error = false;

    // loop through fieldnames and check if they are empty
    foreach ($fieldnames as $data) {
        if(empty($_POST[$data])){
            $error = true;
        }    
    }
    
    if(!$error){
        $obj->createSchool($_POST['schoolnaam']);
    } else {
        echo 'Fieldnames required';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>

    <form method="post">
        <div>
            <label>school</label>
            <input type="text" name="schoolnaam" required>
        </div>
        <div>
            <input type="submit" value="submit" name="submit">
        </div>
    </form>

</body>
</html>