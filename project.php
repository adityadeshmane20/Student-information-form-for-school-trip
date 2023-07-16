<?php
  
  $insert = false;

  if(isset($_POST['fname']))
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "school";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn)
    {
      die("Failed to connect database : ". mysqli_connect_error());
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $pnum = $_POST['pnum'];
    $q = "INSERT INTO `trip` (`fname`, `lname`, `age`, `gender`, `email`, `pnum`) VALUES ('$fname', '$lname', '$age', '$gender', '$email', '$pnum');";
    
    $r=$conn->query($q);

    if($r == true)
    {
      $insert = true;
    }
    else
    {
      echo "Error : $q <br> $conn->error";
    }

    $conn->close();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Form</title>
</head>
<body>

      <img src="bus.jpg" alt="bus">

      <div class="heading">

        <h1>Form for PES School Trip</h1>
        <br>
        <P>Enter your details and submit the form to participate in the school trip.</P>

        <?php

          if($insert == true)
          {
            echo "<p class='submitmsg'>Your form has been submitted successfully, thank you.</p>";
          }

        ?>

        <br>
        
        <form action="project.php" method="post">

          <input type="text" name="fname" id="fname" placeholder="Enter your first name.">          
          <input type="text" name="lname" id="lname" placeholder="Enter your last name.">
          <input type="number" name="age" id="age" placeholder="Enter your age.">
          <input type="text" name="gender" id="gender" placeholder="Enter your gender.">
          <input type="email" name="email" id="email" placeholder="Enter your email.">
          <input type="phone" name="pnum" id="pnum" placeholder="Enter your phone number.">

          <button class="btn">Submit</button>
          
        </form>

      </div>

      <script src="project.js"></script>


</body>
</html>