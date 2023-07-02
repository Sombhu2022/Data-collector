<?php
include("database.php");
error_reporting(0);

   session_start();
   $id= $_GET['id'];
  // echo $_SESSION[name];
//   echo $_SESSION['DOB'];
  // echo $_SESSION['email'] ;
   echo "<br><br>";
   //echo $_SESSION['photo'], $_SESSION['name'], $_SESSION['email'], $_SESSION['password'], $_SESSION['phone'],;
          /*  $photo=$_GET['photo'];
            $name=$_GET['name'];
            $email=$_GET['email'];
            $password=$_GET['password'];
            $phone=$_GET['phone'];
            $DOB=$_GET['DOB'];
            $gender=$_GET['gender'];
            $language=$_GET['language'];
            $course=$_GET['course'];
           $college=$_GET['college'];
            $search=$_GET['search'];
            $address=$_GET['address'];
      
       
         $in1="insert into try(id,photo,name,email,password,phone,DOB,gender,language,course,college,search,Address) values('$id','$photo','$name','$email','$password','$phone','$DOB','$gender','$language','$course','$college','$search','$address') where id='$id'";*/


         $in1="insert into try(photo,name,email,password,phone) value('$_SESSION[photo]', '$_SESSION[name]', '$_SESSION[email]', '$_SESSION[password]', '$_SESSION[phone]')";
            $data2=mysqli_query($conn,$in1);
                
                  if($data2)
            {
                echo "<script>alert('Data Submited Successfuly')</script>";
                echo "<h3>Data Submited Successfuly</h3>";
                echo "<div style='margin-left:40%;'><table border='1'><tr>".
                "<th colspan='2'>Your Data</th></tr>".

                "<tr><td rowspan='7'><img src='".."' width='300px'></td></tr>".
                 "<tr><td>". $name. "</td></tr>".
                "<tr><td>".$email."</td></tr>".
                   
                    "<tr><td>".$phone."</td></tr>".
                     
                        " </tr></table></div>";


                    }
            else {
                echo "<script>alert('Not Submited')</script>";
            echo "Data Not Submited........ go back to<a href='from.php'> Home</a> page!";
           }

            
   
session_unset();

?>



