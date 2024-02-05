<?php 
            session_start();
            $_SESSION['message'] = '';
            if(isset($_POST['login'])){
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, "lms");
                $query = "select * from admin where email= '$_POST[email]'";
                $query_run = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($query_run)){
                    if($row['email'] == $_POST['email']){
                        if($row['password'] == $_POST['password']){

                            $_SESSION['name'] = $row['name'];
                            $_SESSION['email'] = $row['email'];
                            header("Location: admin_dashbord.php");

                        }else{
                            $_SESSION['message'] = "Invalid email or password";
                        }
                    }else{
                        echo "Invalid email";
                    }
                }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Library Management System</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <br />
    <span>
        <marquee>This is a Library Management System. Library opens at 8.00 AM and close at 8.00 PM.</marquee>
    </span>
    <br /><br />
    <div class="row">
        <div class="col-md-4" style="padding:30px;">
            <h5>Library Timing <i class="fa-regular fa-clock"></i></h5>
            <ul>
                <li>Opening time : 8:00 AM</li>
                <li>Closing time : 8:00 PM</li>
                <li>(Sunday Off)</li>
            </ul>

            <h5>What we provide ?</h5>
            <ul>
                <li>Full furniture</li>
                <li>Free wi-fi</li>
                <li>News Papers</li>
                <li>Discussion Room</li>
                <li>RO Water</li>
                <li>PeaseFull Enviornment</li>
            </ul>
        </div>
        <div class="col-md-5">
            <center
                style="color:white; background-color:tomato; padding:10px; border-top:2px solid black; border-left:2px solid black; border-right:2px solid black;">
                <h3><i class="fa-solid fa-users"></i><br /> Admin Login</h3>
            </center>
            <form method="post" style="border: 2px solid black; padding:20px;">

                <div class="form-group">
                    <label for="email">Email Id</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary" name="login"><i class="fa-solid fa-right-to-bracket"></i>
                    Login</button>
            </form><br />
            <p> <?php echo $_SESSION['message'] ?></p>
        </div>
    </div>
    <?php include '../footer.php'  ?>
</body>

</html>