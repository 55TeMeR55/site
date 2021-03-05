<?php
$db = mysqli_connect("localhost","root","root","sql_database");
$query = "INSERT INTO historyofauthorization (dateauthorization) VALUES(NOW())";
mysqli_query($db,$query);