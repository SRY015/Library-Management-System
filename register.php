<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection,"lms");
$phoneNumber = (int)$_POST['phone'];
$query = "insert into users values(null, '$_POST[name]', '$_POST[email]', $phoneNumber, '$_POST[password]', '$_POST[address]')";
$query_run = mysqli_query($connection, $query);

?>
<script type="text/javaScript">
    alert("Registered successfully!");
    window.location.href = "index.php";
</script>