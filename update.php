<?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection,"lms");
    $phone = number_format($_POST['phone']);
    $query = "update users set name='$_POST[name]', email='$_POST[email]', phone=$_POST[phone], address='$_POST[address]' where email='$_SESSION[email]'";
    $query_run = mysqli_query($connection, $query);
    if($query_run){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email']; 
    }
?>
<script type="text/javascript">
    alert("Data updated successfully ...");
    window.location.href="user_dashbord.php";
</script>