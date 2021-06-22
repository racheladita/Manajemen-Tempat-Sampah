<?php
	$dom = new DOMDocument("1.0");
	$node = $dom->createElement("markers");
	$parnode = $dom->appendChild($node);
	
	$conn = mysqli_connect("localhost", "root", "");
	mysqli_select_db($conn, "db_bu");
	$rs = mysqli_query($conn, "SELECT * FROM tbl_bu");
	header("Content-type: text/xml");
	while($row = mysqli_fetch_assoc($rs))
	{
		$node = $dom->createElement("marker");
		$newnode = $parnode->appendChild($node);
		$newnode->setAttribute("nama_BU",$row['nama_BU']);
		$newnode->setAttribute("alamat_BU",$row['alamat_BU']);
		$newnode->setAttribute("telepon_BU",$row['telepon_BU']);
		$newnode->setAttribute("tipe_BU",$row['tipe_BU']);
		$newnode->setAttribute("longitude_BU",$row['longitude_BU']);
		$newnode->setAttribute("latitude_BU",$row['latitude_BU']);
	}
	echo $dom->saveXML();
?>