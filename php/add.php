<!DOCTYPE html>
<html>
<body>
<?php


function calc($op)
{
	$id=$_POST['id'];
	$id2=$_POST['id2'];
	if($op=="+"){
		echo $id."+".$id2."=".$id+$id2;
	}else if($op=="-"){
		echo $id."-".$id2."=".$id-$id2;
	}else if($op=="/"){
		echo $id."/".$id2."=".$id/$id2;
	}else if($op=="*"){
		echo $id."*".$id2."=".$id*$id2;
	}else{
		echo "<p> invalid";
	}

}

if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['id2']) && !empty($_POST['id2'])  && isset($_POST['by_']))
{
	$by_=$_POST['by_'];
	calc($by_);
}else
{
	echo "<p> not valid\n";
}
?>

</body>
</html>
