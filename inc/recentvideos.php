<?php

include('connect.php');

$id=$_GET["id"];
$i=0;
$recentvideos = array();

$result = mysqli_query($con,"SELECT videos.id, videos.name, videos.description, videos.user_id, videos.categories_id, videos.date_added, videos.url, videos.length, videos.image, categories.category FROM videos INNER JOIN categories ON categories.id=videos.categories_id ORDER BY videos.id DESC LIMIT 12");

while($row = mysqli_fetch_array($result)){
	$recentvideos[$i]['id'] = $row['id'];
	$recentvideos[$i]['title'] = $row['name'];
	$recentvideos[$i]['description'] = $row['description'];
	$recentvideos[$i]['user_id'] = $row['user_id'];
	$recentvideos[$i]['category'] = $row['category'];
	$recentvideos[$i]['date_added'] = $row['date_added'];
	$recentvideos[$i]['url'] = $row['url'];
	$length = explode(":", $row['length']);
	$mins = $length[1];
	$length = explode(".", $length[2]);
	$recentvideos[$i]['length'] = $mins.":".$length[0];
	$recentvideos[$i]['image'] = $row['image'];
	$i++;
}
echo json_encode($recentvideos);
?>