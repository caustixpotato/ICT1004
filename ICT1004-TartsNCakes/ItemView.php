<?php
    if(isset($_GET['item_id'])) {
        $sql = "SELECT Img FROM Items WHERE ItemID=" . $_GET['item_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: image/jpeg");
        echo $row["Img"];
	}
	mysqli_close($conn);
?>