<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Add A Job</title>
</head>
<body>
    <h1>Adding A Job<br>Enter The Info Below To Add A Job</h1>
    
    <div class="Center">
    <div class="Buttons">
        <a href="home.html"><button>Main Menu</button></a>
    </div>
    </div>

    <form action="insert_job.php" method="post">
   Company Name: <input type="text" name="company_name"><br>
   Job Title: <input type="text" name="job_title"><br>
   Salary: <input type="text" name="salary"><br>
   Desired Major:     <select name="desired_major" id="desired_major">
        <option name = "Biological and Agricultural Engineering" value="Biological and Agricultural Engineering">Biological and Agricultural Engineering</option>
        <option name = "Biomedical Engineering" value="Biomedical Engineering">Biomedical Engineering</option>
        <option name = "Chemical Engineering " value="Chemical Engineering ">Chemical Engineering </option>
        <option name = "Civil Engineering" value="Civil Engineering">Civil Engineering</option>
        <option name = "Computer Science and Computer Engineering" value="Computer Science and Computer Engineering">Computer Science and Computer Engineering</option>
        <option name = "Data Science" value="Data Science">Data Science</option>
        <option name = "Electrical Engineering" value="Electrical Engineering">Electrical Engineering</option>
        <option name = "Industrial Engineering" value="Industrial Engineering">Industrial Engineering</option>
        <option name = "Mechanical Engineering" value="Mechanical Engineering">Mechanical Engineering</option>
    </select>
   <input name="submit" type="submit" >
    </form>

    <?php
   include("php_db.php");

   
   $company_name = escapeshellarg($_POST[company_name]);
   $job_title = escapeshellarg($_POST[job_title]);
   $salary = escapeshellarg($_POST[salary]);
   $desired_major = escapeshellarg($_POST[desired_major]);

	if (isset($_POST['submit'])) 
	{  
	  $myDb = new php_db('mgviolan','Bie5doe6','mgviolan');
     
      $myDb->initDatabase();

      $Items = $myDb->query('SELECT * FROM JOBS');
      echo '<br>Table JOBS before:';
      $myDb->printTable($Items);
      $nextId = $myDb->nextId("JOBS");
      $values = strval($nextId) . "," . $company_name . "," . $job_title . "," . $salary . "," . $desired_major;

 
      $myDb->insert('JOBS', $values);
      
      
      $Items = $myDb->query('SELECT * from JOBS'); 
	  echo '<br>Table JOBS after:';
	  $myDb->printTable($Items);
	  
	}  
?>

</body>
</html>

