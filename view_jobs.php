<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Viewing Jobs</title>
</head>
<body>
    <h1>Viewing Jobs<br>Select A Major Below To See All Jobs Wanting That Major</h1>
    
    <div class="Center">
    <div class="Buttons">
        <a href="home.html"><button>Main Menu</button></a>
    </div>
    </div>

    <form action="view_jobs.php" method="post">
    <label>Select a major:</label>
    <select name="major" id="major">
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

    $major = escapeshellarg($_POST[major]);

	if (isset($_POST['submit'])) 
	{        
        $myDb = new php_db('mgviolan','Bie5doe6','mgviolan');
        
        $myDb->initDatabase();
      
        $Items = $myDb->query("SELECT * FROM JOBS WHERE DESIRED_MAJOR = $major");
	    $myDb->printTable($Items); 
	}  
?>
</body>
</html>