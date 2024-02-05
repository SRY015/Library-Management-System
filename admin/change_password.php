<?php
    session_start();
   
   if(isset($_POST['change'])){
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $query = "update admin set password='$_POST[new_pass]' where email='$_SESSION[email]' and password='$_POST[old_pass]'";
    $query_res = mysqli_query($connection, $query);
    if(mysqli_affected_rows($connection) > 0){ // This condition will check whether the query result affected any database row or not.
        $_SESSION['message'] = "Password updated successfully !!";
    }else{
        $_SESSION['message'] = "Old password is incorrect !!";
    }
   }else{
    $_SESSION['message'] = " ";
   }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Library Management System</title>
</head>  

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="user_dashbord.php">Library Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <div class="nav-item dropdown my-2 my-lg-0">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['name'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                </div>
            </div>
            <div class="nav-item active">
                <a class="nav-link text-light" href="logout.php">LogOut</a>
            </div>
        </div>
    </nav>
    <br/>
    <span>
        <marquee>This is a Library Management System. Library opens at 8.00 AM and close at 8.00 PM.</marquee>
    </span><br/>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <h2 class="text-center">Change Password</h2><br/>
        <form method="post">
                
                <div class="form-group">
                    <label for="old_pass">Old Password :</label>
                    <input type="password" class="form-control" name="old_pass" />
                </div>
                <div class="form-group">
                    <label for="new_pass">New Password :</label>
                    <input type="password" class="form-control" name="new_pass" />
                </div>
                 
                <button type="submit" name="change" class="btn btn-primary" id="cbtn"><i class="fa-solid fa-lock"></i> Change Password</button>
            </form><br/>
            <p id="msg"> <?php echo $_SESSION['message'] ?> </p>
        </div>
        <div class="col-md-4"></div>
    </div>
 
    
    <?php include '../footer.php'  ?>
</body>

</html>