<?php
     $connection = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($connection, "lms");
     $query = "delete from authors where author_id=$_GET[aid]";
     $query_result = mysqli_query($connection, $query);
?>
<script>
    alert("Author Deleted successfully !!");
    window.location.href = "manage_author.php";
</script>