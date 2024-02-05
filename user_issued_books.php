<?php 
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "lms");
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

<body style="background-color:whitesmoke;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="user_dashbord.php"><i class="fa-solid fa-book-open-reader"></i> Library Management
            System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <div class="nav-item dropdown my-2 my-lg-0">
                <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-circle-user"
                        style="font-size:20px; margin-top:5px;"></i>
                    <?php echo $_SESSION['name'] ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="view_profile.php">View Profile</a>
                    <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                </div>
            </div>
            <div class="nav-item active">
                <a class="nav-link text-light" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                    LogOut</a>
            </div>
        </div>
    </nav>
    <br />
    <span>
        <marquee>This is a Library Management System. Library opens at 8.00 AM and close at 8.00 PM.</marquee>
    </span><br /><br />
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h4 class="text-center text-primary">Issued Books</h4>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Book_Name</th>
                            <th scope="col">Book_Author</th>
                            <th scope="col">Book_No.</th>
                            <th scope="col">Issued_Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "select book_name, book_author, book_no, issued_date from issued_books where student_id = $_SESSION[id] and status = 1";
                            $query_res = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($query_res)){ ?>
                        <tr>
                            <td><?php echo $row['book_name'] ?></td>
                            <td><?php echo $row['book_author'] ?></td>
                            <td><?php echo $row['book_no'] ?></td>
                            <td><?php echo $row['issued_date'] ?></td>
                        </tr>

                        <?php  }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php include 'footer.php'  ?>
</body>

</html>