<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Add A Application</title>
</head>
<body>
    <h1>Adding A Application<br>Enter The Info Below To Apply</h1>

    
    <div class="Center">
    <div class="Buttons">
        <a href="home.html"><button>Main Menu</button></a>
    </div>
    </div>


    <form action="insert_app.php" method="post">
      Student id: <input type="text" name="student_id"><br>
      Job id: <input type="text" name="job_id"><br>
      <input name="submit" type="submit" >
    </form>

    <?php
      include("php_db.php"); // include database class

  
    $student_id = escapeshellarg($_POST[student_id]);
    $job_id = escapeshellarg($_POST[job_id]);

	  if (isset($_POST['submit'])) 
	  {  
	    $myDb = new php_db('mgviolan','Bie5doe6','mgviolan');
      
      $myDb->initDatabase();
      
      $Items = $myDb->query('SELECT * FROM APPLICATIONS'); 
      echo '<br>Table APPLICATIONS before:';
      $myDb->printTable($Items);
      $values = $student_id . "," . $job_id;

      $myDb->insert('APPLICATIONS', $values);
      
      $Items = $myDb->query('SELECT * from APPLICATIONS');
	    echo '<br>Table APPLICATIONS after:';
	    $myDb->printTable($Items);
	  }  
?>

</body>
</html>

