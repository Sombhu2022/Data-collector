<html>
 <head>
    <style type="">
        body{
            font-size:50px;
            background: linear-gradient(45deg,rgb(89, 167, 226),rgb(228, 11, 252));
            color: white;
}
a.green{
    text-decoration:none;
     color:white; 
    border: 2px green solid;
     background:green;
}
.red{
    text-decoration:none;
     color:white; 
    border: 2px red solid;
     background:red;
}

        
    </style>
 </head>
 <body>
    
<?php

include("database.php");
error_reporting(0);
 


  


if(isset($_FILES['image']))
              {
              $name=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    $size=$_FILES['image']['size'];
    $folder="upload_image/" . $name;
    move_uploaded_file($tmp,$folder);
   

        }

            //$photo=$_POST['photo'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $phone=$_POST['phone'];
            $DOB=$_POST['dob'];
            $gender=$_POST['gender'];
            $lang=$_POST['chek'];
           // foreach ($lang as $item) {
               
          //  }
            if($lang)
            {
           $language=implode(", " , $lang);
       }
           
           $course=$_POST['course'];
           $college=$_POST['college'];
            $search=$_POST['search'];
            $address=$_POST['address'];
 ?>
 


   
 
 <?php
 
   
    if(isset($_POST['submit']))
    {
   if(!empty($_POST['name'])  && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']))
        {
              if (preg_match("/^[a-zA-Z-' ]*$/", $name) &&preg_match("/^([0-9]{10})$/", $phone)) 
               {
                if($_POST['password']==$_POST['pass'])
                {
             
           $in="insert into try(photo,name,email,password,phone,DOB,gender,language,course,college,search,Address) values('$folder','$name','$email','$password','$phone','$DOB','$gender','$language','$course','$college','$search','$address')";
         
            $data=mysqli_query($conn,$in);
            if($data)
            {
                echo "<script>alert('Data Submited Successfuly')</script>";
                echo "<h3>Data Submited Successfuly</h3>";
                echo "<div style='margin-left:40%;'><table border='1'><tr>".
                "<th colspan='2'>Your Data</th></tr>".

                "<tr><td rowspan='7'><img src='".$folder."' width='300px'></td></tr>".
                 "<tr><td>". $name. "</td></tr>".
                "<tr><td>".$email."</td></tr>".
                   
                    "<tr><td>".$phone."</td></tr>".
                     "<tr><td>".$DOB."</td></tr>".
                      "<tr><td>".$gender."</td></tr>".
                       "<tr><td>".$language."</td></tr>".
                          "<tr><td>".$course."</td>".
                     "<td>".$college."</td></tr>".
                       " <tr><td colspan='2'>".$search."</td></tr>".
                        " <tr><td colspan='2'>".$address."</td></tr>".
                        " </tr></table></div>";


                    }
            else {
                echo "<script>alert('Not Submited')</script>";
            echo "Data Not Submited........ go back to<a href='from.php'> Home</a> page!";
           }
       }
       else{
         echo "<script>alert('Password Not Match')</script>";
            echo "Password Not Match........ go back to<a href='from.php'> Home</a> page!";
           

       }
   }

       else{
             echo "<script>alert('Invalid data')</script>";
            echo "Plesce input your name and phone number(10 Digit) properly ........ go back to <a href='from.php'> Home</a> page!"; 
       }
        }
            else{
                echo "<script>alert('Plesce input data')</script>";
            echo "Plesce input Data ........ go back to <a href='from.php'> Home</a> page!";
            }

 }

               

 else if(isset($_POST['View']))
            {
                $q="SELECT id,photo,name,email ,phone,DOB,gender,language,course,college,search,Address from try";
                $result=mysqli_query($conn,$q);
                $row=mysqli_num_rows($result);
                    
                   if($row)
                   {
                      echo "<h3>Dashboard</h3>
                    <table border='1'><tr>
                           <td>Id</td>
                           <td>Photo</td>
                           <td>Name</td>
                           <td>Email   Id</td>
                           <td>Phone Number</td>
                           <td>DOB</td>
                           <td>Gender</td>
                           <td>Language</td>
                           <td>Course</td>
                           <td>College</td>
                           <td>Your Search</td>
                           <td>Address</td>
                           <td>Modified</td>
                            </tr>";          

                for($i=0;$i<$row;$i++)
                {

                $out=mysqli_fetch_assoc($result);

                echo "<tr>".
                "<td>".$out["id"] . "</td>".
                "<td><img src='".$out["photo"]."' width='90px'></td>".
                 "<td>". $out["name"]. "</td>".
                "<td>".$out["email"]."</td>".
                   
                    "<td>".$out["phone"]."</td>".
                     "<td>".$out["DOB"]."</td>".
                      "<td>".$out["gender"]."</td>".
                       "<td>".$out["language"]."</td>".
                          "<td>".$out["course"]."</td>".
                     "<td>".$out["college"]."</td>".
                       " <td>".$out["search"]."</td>".
                        " <td>".$out["Address"]."</td>".
                        "<td><a class='green' href='update.php?id=$out[id],name=$out[name]'>Update</a><br><br><a class='red' href='delete.php?id=$out[id]'><input type='submit'class='red' name='delete' valu='delete' onclick='return chek()'></a></td>
                        </tr>"
                ;
                
                }
            }
            else
            {
                 echo "<script>alert('Empty database')</script>";
            echo "Sorry User ! Database is fully Empty........ go back to <a href='from.php'> Home</a> page!";

            }
            
        
           }
 else if(isset($_POST['search']))

            {
                if(!empty($_POST['name']))
                {

                $q="SELECT id,photo,name,email ,phone,DOB,gender,language,course,college,search,Address from try where name='$name'";
                $result=mysqli_query($conn,$q);
                $row=mysqli_num_rows($result);
            

                   if($row) 
                   {
                    echo "<h3> Your  Data </h3>";

echo "
<table border='1'><tr>
                           <td>Id</td>
                           <td>Photo</td>
                           <td>Name</td>
                           <td>Email   Id</td>
                           <td>Phone Number</td>
                           <td>DOB</td>
                           <td>Gender</td>
                           <td>Language</td>
                           <td>College</td>
                           <td>Course</td>
                           <td>Your Search</td>
                           <td>Address</td>
                           <td>Modified</td>
                            </tr>" ;         

                for($i=0;$i<$row;$i++)
                {

                $out=mysqli_fetch_assoc($result);

                echo "<tr>".
                "<td>".$out["id"] . "</td>".
                "<td><img src='".$out["photo"]."' width='90px'></td>".
                 "<td>". $out["name"]. "</td>".
                "<td>".$out["email"]."</td>".
                   
                    "<td>".$out["phone"]."</td>".
                     "<td>".$out["DOB"]."</td>".
                      "<td>".$out["gender"]."</td>".
                       "<td>".$out["language"]."</td>".
                          "<td>".$out["course"]."</td>".
                     "<td>".$out["college"]."</td>".
                       " <td>".$out["search"]."</td>".
                        " <td>".$out["Address"]."</td>
                        <td><a class='green' href='update.php?id=$out[id],name=$out[name]'>Update</a><br> <br><a class='red' href='delete.php?id=$out[id]'  onclick='return chek()'>Delete</a></td>
                        </tr>"
                ;
                
                }
            }

          else{

            echo "<script>alert('No data match')</script>";
            echo "Searching Data is not matched with database........Plesce go back to <a href='from.php'> Home </a> page!";
            
          }  
            
        
  }
   else{
             echo "<script>alert('Plesce input data')</script>";
            echo "Plesce input your name........ go back to <a href='from.php'> Home </a> page!";
            
           }
  }     
 
          
      
?>
</table>
<script>
    function chek()
    {
        return confirm('Are you sure you wand to delete this record ?');
    } 
</script>
</body>
</html>        