<?php

	include_once 'crud.php';

	$id = $_GET['id'];

	//delete data
			if($conn)
			{
				delete($id);
			}

		header("location:form.php");

?>