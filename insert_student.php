<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Add A Student</title>
</head>
<body>
    <h1>Add A Student<br>Enter The Info Below To Add A Student</h1>
    
    <div class="Center">
    <div class="Buttons">
        <a href="home.html"><button>Main Menu</button></a>
    </div>
    </div>

    <form action="insert_student.php" method="post">
   Student id: <input type="text" name="student_id"><br>
   Student Name: <input type="text" name="student_name"><br>
   Major: <select name="major" id="major">
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


   $student_id = escapeshellarg($_POST[student_id]);
   $student_name = escapeshellarg($_POST[student_name]);
   $major = escapeshellarg($_POST[major]);

	if (isset($_POST['submit'])) 
	{  
	    $myDb = new php_db('mgviolan','Bie5doe6','mgviolan');
      
      $myDb->initDatabase();
      
      $Items = $myDb->query('SELECT * FROM STUDENTS');  
      echo '<br>Table STUDENTS before:';
      $myDb->printTable($Items);
      $values = $student_id . "," . $student_name . "," . $major;

      
      $myDb->insert('STUDENTS', $values);
      
      $Items = $myDb->query('SELECT * from STUDENTS');
	    echo '<br>Table STUDENTS after:';
	    $myDb->printTable($Items);
	  
	}  
?>
</body>
</html>

