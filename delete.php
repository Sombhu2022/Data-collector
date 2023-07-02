<html>
<head>
    
</head>
<body>
    <script type="text/javascript">
        function undo()
        {
           return  confirm('Are you sure Recover this Record?');
        }
    </script>
    </body>

<?php
include("database.php");
error_reporting();
session_start();
$id=$_GET['id'];
     $up="SELECT * from try where id='$id'";

                $data1=mysqli_query($conn,$up);
                $row1=mysqli_num_rows($data1);
                $select=mysqli_fetch_assoc($data1);
            /* echo $select['password'];
             echo $select['dob'];
             echo $select['chek'];*/

             


            $_SESSION['id']=$_GET['id'];
            $_SESSION['photo'] =$select['photo'];
            $_SESSION['name'] =$select['name'];
            $_SESSION['email'] =$select['email'];
            $_SESSION['password'] =$select['password'];
            $_SESSION['phone'] =$select['phone'];
            $_SESSION['DOB'] =$select['dob'];
            $_SESSION['gender'] =$select['gender'];
            $_SESSION['lang'] =$select['chek'];
            
           $_SESSION['course'] =$select['course'];
           $_SESSION['college'] =$select['college'];
            $_SESSION['search'] =$select['search'];
            $_SESSION['address'] =$select['address'];

    

                $delete="DELETE from try where id='$id'";
                $result=mysqli_query($conn,$delete);
                if($result)
                {

                
            echo "<p style='color:green; font-size:20px;'>Record delete sucessfuly</p>";
            echo "<a href='undo.php?id=$_SESSION[id], photo= $_SESSION[photo] 
           ,name= $_SESSION[name]
          ,email= $_SESSION[email] 
           ,password= $_SESSION[password]
          ,phone=  $_SESSION[phone] 
           ,DOB= $_SESSION[DOB] 
           ,gender= $_SESSION[gender] 
           ,language= $_SESSION[lang]
          , course= $_SESSION[course] 
          ,college= $_SESSION[college] 
          ,search=  $_SESSION[search]
          ,address=  $_SESSION[address]'>
            
              

            <input type='submit' value='Undo' name='Undo' onclick='return undo()'></a> ";
             echo $_SESSION['phone'];

                }
                else{
                    echo "<script>alert('Plese select record !')</script>";
            echo "Plese choose record";

                }




?>
</html>
