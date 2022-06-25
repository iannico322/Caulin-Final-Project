<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php $_POST; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/status.css">
    <link rel="stylesheet" href="resources/css/authentication.css">
    <title><?php echo "Validating  $_POST[studID]"; ?></title>
</head>

<body>

    
    <?php
    

    $_SESSION['studID'] = $_POST['studID'];
    $_SESSION['lastName'] = $_POST['lastName'];


    $myfile = fopen("resources/cache/cache.txt", "w") or die("Unable to open file!");
    $txt =  $_POST['studID'] . "\n";
    fwrite($myfile, $txt);
    $txt = $_POST['lastName'];
    fwrite($myfile, $txt);
    fclose($myfile);

    include("SQLConnect.php");
    $authenticate = mysqli_query($con, "SELECT studId, lastName FROM tbl_students WHERE studID = '" . $_SESSION['studID'] . "' And lastName = '" . $_SESSION['lastName'] . "'");
    if (mysqli_num_rows($authenticate) > 0) {
    ?>
        <h4>Welcome back,<br> <?php echo $_SESSION['lastName']; ?></h4>
        <form method="POST" action=""{{ url('students')}}"">
            <input type="hidden" name="studID" value="<?php echo $_SESSION['studID']; ?>">
            <input type="hidden" name="lastName" value="<?php echo $_SESSION['lastName']; ?>">

            <button type="submit" class="btn btn-success">Proceed</button>
        </form>
        
    <?php
    } else {

        echo "<script>alert('Invalid ID or Password, please try again!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }

    ?>
    
</body>

</html>