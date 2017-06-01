<?php
session_start();
if(!empty($_POST['categid'])){
	$categid = $_POST['categid'];
	$conn = mysqli_connect("Localhost","root","","book2") or die(mysqli_connect_error());
	$q = mysqli_query($conn,"SELECT * FROM book WHERE categid=$categid") or die("ERROR");
	$res = mysqli_fetch_all($q,MYSQLI_ASSOC);
	$table = "<table class='table table-striped table-hover'>";
        $table.="<thead>";
        $table.="<tr class='info'>";
        $table.="<th>"."Vernagir"."</th>"."<th>"."AUTHOR"."</th>"."<th>"."PRICE"."</th>"."<th>"."Patvirel"."</th>"."</tr>";
        $table.="</thead>";
    foreach($res as  $val){
        $id11=$val['bookid'];
        $table.="<tr id=$id11 class='apranq danger'>";
        $table.="<td name='title' class='base'>".$val['title']."</td>";
        $table.="<td name='author' class='base'>".$val['author']."</td>";
        $table.="<td name='price' class='base'>".$val['price']."</td>";      
        $table.="<td class='buy'>".'Patvirel'."</td>";
        $table.="</tr>";
    }
    $table.="</table>";
    print_r($table);
}

?>