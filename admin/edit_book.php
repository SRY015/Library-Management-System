<?php 
require("functions.php");
session_start();
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "lms");
$query = "select * from books where book_no = $_GET[bno]";
$query_res = mysqli_query($connection, $query);
$b_name ="";
$b_author ="";
$b_category ="";
$b_no ="";
$b_price ="";
while($row = mysqli_fetch_assoc($query_res)){
    $b_name = $row['book_name'];
    $b_author = $row['author_id'];
    $b_category = $row['cat_id'];
    $b_no = $row['book_no'];
    $b_price = $row['book_price'];
}
// Updaing the book details -->
if(isset($_POST['updateBook'])){
    $query = "update books set book_name='$_POST[book_name]',author_id=$_POST[book_author],cat_id=$_POST[category], book_price=$_POST[book_price] where book_no = $_GET[bno]";
    $quer_res = mysqli_query($connection, $query);
    header("Location: manage_book.php");
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
    <link rel="stylesheet" href="style.css">
    <title>Library Management System</title>
</head>

<body>
<?php include 'header.php'; ?>
    <!-- ------------------- -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand pl-5" href="admin_dashbord.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <div class="nav-item dropdown my-2 my-lg-0">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Book
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="add_new_book.php">Add New Book</a>
                            <a class="dropdown-item" href="manage_book.php">Manage Books</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item active">
                    <div class="nav-item dropdown my-2 my-lg-0">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="add_new_category.php">Add New Category</a>
                            <a class="dropdown-item" href="manage_category.php">Manage Category</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item active">
                    <div class="nav-item dropdown my-2 my-lg-0">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Author
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="add_author.php">Add New Author</a>
                            <a class="dropdown-item" href="manage_author.php">Manage Author</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="issue_book.php">Issue Books</a>
                </li>
            </ul>
        </div>
    </nav>
    <br />
    <span>
        <marquee>This is a Library Management System. Library opens at 8.00 AM and close at 8.00 PM.</marquee>
    </span>
    <br /><br />
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-primary">
                        <h3>Edit Book</h3>
                    </div>
                    <div class="card-body"> 
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="book_name">Book Name</label>
                                <input type="text" class="form-control" name="book_name" value="<?php echo $b_name ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="book_author">Book Author</label>
                                <select class="form-control" name="book_author" id="author">
                                    <option value="<?php echo $b_author ?>"> 
                                        <?php 
                                        $query = "select author_name from authors where author_id = $b_author";
                                        $query_res = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($query_res)){
                                            echo $row['author_name'];
                                        }
                                        ?>
                                    </option>
                                    <?php
                                        $query = "select * from authors";
                                        $query_run = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($query_run)){ ?>
                                        <option value="<?php echo $row['author_id'] ?>"><?php echo $row['author_name'] ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category">Book Category</label>
                                <select class="form-control" name="category">
                                    <option value="<?php echo $b_category ?>">
                                    <?php 
                                        $query = "select cat_name from category where cat_id = $b_category";
                                        $query_res = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($query_res)){
                                            echo $row['cat_name'];
                                        }
                                        ?>
                                    </option>
                                    <?php
                                        $query = "select * from category";
                                        $query_run = mysqli_query($connection, $query);
                                        while($row = mysqli_fetch_assoc($query_run)){ ?>
                                        <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                                   <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="book_no">Book No.</label>
                                <input type="number" class="form-control"  name="book_no" value="<?php echo $b_no ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="book_price">Book Price</label>
                                <input type="number" class="form-control"  name="book_price" value="<?php echo $b_price ?>"/>
                            </div>
                            <button type="submit" class="btn btn-primary" name="updateBook" id="btn">Update Book</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php include '../footer.php'  ?>
</body>

</html>