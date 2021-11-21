<?php


	include_once 'crud.php';
	//include_once 'form.php';

	$modelno=$carname=$coname=$milage=$msg=$id='';
	//insert and update data

			if($_SERVER["REQUEST_METHOD"] == "POST")
			{
		    if( $_POST['milage'] == '' || $_POST['cname'] == '' || $_POST['mno'] == '')
		    {
		       $msg = "Please Fill All Feild Correctly!!";
		    }
		    else
		    {
		    	$modelno = $_POST['mno'];$carname = $_POST['cname'];$coname = $_POST['coname'];$milage = $_POST['milage'];
				if($conn && isset($_GET['id']))
				{
					$id = $_GET['id'];
			    	if($id == '')
			    	{
			        	insert($modelno,$carname,$coname,$milage);
			        	$msg = "Data Added!";

			    	}
					else
					{
						update($id,$modelno,$carname,$coname,$milage);
						$msg = "Data Updated!";
						header("location:form.php");
						$id = '';
					}
			    }	
			}
			//header("location:form.php");

		}


?>