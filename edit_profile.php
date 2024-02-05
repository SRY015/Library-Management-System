<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
    $query = "select * from users where email= '$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    $name="";
    $email="";
    $address="";
    $phone="";
    while($row = mysqli_fetch_assoc($query_run)){
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $address = $row['address'];
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
    <link rel="stylesheet" href="style.css">
    <title>Library Management System</title>
</head>

<body>
<?php include 'header.php'; ?>
    <br/>
    <span>
        <marquee>This is a Library Management System. Library opens at 8.00 AM and close at 8.00 PM.</marquee>
    </span>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <h2 class="text-center">Edit Profile</h2>
        <form action="update.php" method="post">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" value=<?php echo $name ?> name="name" />
                </div>
                <div class="form-group">
                    <label for="email">Email Id</label>
                    <input type="email" class="form-control" value=<?php echo $email ?> name="email" />
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="number" class="form-control" value=<?php echo $phone ?> name="phone" />
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <textarea rows="4" cols="40" class="form-control" value=<?php echo $address ?> name="address" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>

</body>

</html>