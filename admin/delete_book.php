<?php
     $connection = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($connection, "lms");
     $query = "delete from books where book_no=$_GET[bno]";
     $query_result = mysqli_query($connection, $query);
?>
<script>
    alert("Book Deleted successfully !!");
    window.location.href = "manage_book.php";
</script>