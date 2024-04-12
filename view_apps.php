<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Viewing Applications</title>
   <script>
      function showForm(formName) {
        // Hide all forms
        var forms = document.getElementsByClassName("my-form");
        for (var i = 0; i < forms.length; i++) {
          forms[i].style.display = "none";
        }
        // Show the selected form
        var selectedForm = document.getElementById(formName);
        selectedForm.style.display = "block";
      }
    </script>
</head>
<body>

    <h1>Viewing Applications<br>Select An Option Below To Find Applicants</h1>
      <div class="Center">
    <div class="Buttons">
        <a href="home.html"><button>Main Menu</button></a>
        <button onclick="showForm('major-form')">Applications By major</button>
        <button onclick="showForm('student-form')">Applications By Particular Student</button>
        <button onclick="showForm('job-form')">Applications By Job Id</button>
        <button onclick="showForm('all-form')">All Applications</button>
    </div>
    </div>

    <form action="view_apps.php" method="post" id="major-form" style="display: none;">
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
        <input name="major-submit" type="submit" >
    </form>


    <form action="view_apps.php" method="post" id="student-form" style="display: none;">
    Student id: <input type="text" name="student_id"><br>
    <input name="student-submit" type="submit" >
    </form>

    <form action="view_apps.php" method="post" id="job-form" style="display: none;">
    job id: <input type="text" name="job_id"><br>
    <input name="job-submit" type="submit" >
    </form>

    <form action="view_apps.php" method="post" id="all-form" style="display: none;">
        <label>Click To Display All Applications</label>
        <input name="all-submit" type="submit" >
    </form>

    <?php
        include("php_db.php");

        $myDb = new php_db('mgviolan','Bie5doe6','mgviolan');
   
        $myDb->initDatabase();

        $major = escapeshellarg($_POST[major]);
        $student_id = escapeshellarg($_POST[student_id]);
        $job_id = escapeshellarg($_POST[job_id]);

	    if (isset($_POST['major-submit'])) 
	    {        
           
            $Items = $myDb->query("SELECT STUDENTS.STUDENTNAME, JOBS.COMPANYNAME, JOBS.SALARY, STUDENTS.MAJOR
            FROM STUDENTS
            JOIN APPLICATIONS ON STUDENTS.STUDENT_ID = APPLICATIONS.STUDENT_ID
            JOIN JOBS ON APPLICATIONS.JOB_ID = JOBS.JOB_ID
            WHERE STUDENTS.MAJOR = $major");
	          $myDb->printTable($Items); 
	    }

        if (isset($_POST['all-submit'])) 
	    {        
            
            $Items = $myDb->query("SELECT STUDENTS.STUDENTNAME, JOBS.COMPANYNAME, JOBS.SALARY, STUDENTS.MAJOR
            FROM STUDENTS
            JOIN APPLICATIONS ON STUDENTS.STUDENT_ID = APPLICATIONS.STUDENT_ID
            JOIN JOBS ON APPLICATIONS.JOB_ID = JOBS.JOB_ID"); 
	          $myDb->printTable($Items); 
	    }  

        if (isset($_POST['student-submit'])) 
	    {        
            $Items = $myDb->query("SELECT STUDENTS.STUDENTNAME, JOBS.COMPANYNAME, JOBS.SALARY, STUDENTS.MAJOR
            FROM STUDENTS
            JOIN APPLICATIONS ON STUDENTS.STUDENT_ID = APPLICATIONS.STUDENT_ID
            JOIN JOBS ON APPLICATIONS.JOB_ID = JOBS.JOB_ID
            WHERE STUDENTS.STUDENT_ID = $student_id"); 
	          $myDb->printTable($Items); 
	    }  

        if (isset($_POST['job-submit'])) 
	    {        
            $Items = $myDb->query("SELECT STUDENTS.STUDENTNAME, JOBS.COMPANYNAME, JOBS.SALARY, STUDENTS.MAJOR
            FROM STUDENTS
            JOIN APPLICATIONS ON STUDENTS.STUDENT_ID = APPLICATIONS.STUDENT_ID
            JOIN JOBS ON APPLICATIONS.JOB_ID = JOBS.JOB_ID
            WHERE JOBS.JOB_ID = $job_id"); 
	          $myDb->printTable($Items); 
	    }  
    ?>


</body>
</html>