<?php

require 'classes/DB.php';

$database = new DB;// connection for db by constructing
echo "<br>";


///////////////		Inserting Data //////////////
$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
if($post['submit'])
{
	$title = $post['title'];
	$body = $post['body'];

	echo $title."<br>".$body;

	$database->query('insert into post(title,body) values(:title,:body)');
	$database->bind(':title',$title);
	$database->bind(':body',$body);
	$database->execute();

	if($database->lastid())
	{
		echo "<p>Post Added!</p>";
	}
}


////////////////		update 			//////////////
if($post['update'])
{
	$id = $post['id'];

	$database->query('update post set title=:title,body=:body where id=:id');
	$database->bind(':id',$id);
	$database->bind(':title',$title);
	$database->bind(':body',$body);
	$database->execute();

}

////////////////	delete data 		//////////////
if($post['delete'])
{
	$id = $_POST['delete_id'];//we not take $post cause we dont want it to sanitize as it is integer

	$database->query('delete from post where id=:id');
	$database->bind(':id',$id);
	$database->execute();
}

?>




<!--//////////////		from 		///////////////-->
<h1> Add Post</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<label>Post Id</label><br>
	<input type="text" name="id"><br>
	<label>Post title</label><br>
	<input type="text" name="title"><br>
	<label>Post body</label><br>
	<textarea name="body"></textarea><br>
	<input type="submit" name="submit">
	<input type="submit" name="update" value="update"><br>





<?php
//////////////    Fetching data ////////////////
echo "<br>";echo "<br>";

$database->query('select * from post');//this call query function to write query

/*$database->query('select * from post where title = :title');
$database->bind(':title',"me");//this is bind to get a specific data
*/
$rows = $database->resultset();// it gives all data of our query
//print_r($rows);

foreach ($rows as $value) :?>
	<div>
	<h3><?php echo $value['title'];?></h3>
	<p><?php echo $value['body'];?></p>
	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
	<input type="hidden" name="delete_id" value="<?php echo $value['id']; ?>">
	<input type="submit" name="delete" value="delete">
	</form>
	</div>

<?php endforeach; ?>

?>