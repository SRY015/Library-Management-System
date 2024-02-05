<?php
     $connection = mysqli_connect("localhost", "root", "");
     $db = mysqli_select_db($connection, "lms");
     $query = "delete from category where cat_id=$_GET[cid]";
     $query_result = mysqli_query($connection, $query);
?>
<script>
    alert("Category Deleted successfully !!");
    window.location.href = "manage_category.php";
</script>