<?php
include("database.php");
error_reporting(0);

$id=$_GET['id'];

                $up="SELECT * from try where id='$id'";

                $data1=mysqli_query($conn,$up);
                $row1=mysqli_num_rows($data1);
                $select=mysqli_fetch_assoc($data1);
                 
                $check= $select['language'];
               $checked=explode(", ", $check);
              //  print_r( $checked);



             
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <form action="" method="post" enctype="multipart/form-data">
            <h1>Registration Form </h1>
            <input type="hidden" name="id" value="<?php echo $select['id'];?> ">
             Photo
            <input type="file" name="image" accept="image/*" ><img src="<?php echo  $select['photo'];  ?>" size=50, hight='100px' , width='100px',align="right" >
                <input type="hidden" name="image2" value="<?php echo $select['photo'];?>">
            <br> Name:
            <input type="name" placeholder="Enter Your Name" name="name" value="<?php echo $select['name']; ?>" ><br>
             Email:
            <input type="Email"  placeholder="enter your Email" name="email" value="<?php echo $select['email']; ?>" ><br>
             Password
            <input id="pass" type="password" placeholder="enter password" name="password" value="<?php echo $select['password']; ?>" ><br>
            confirm password:<input type="password" name="pass" id="con" value="<?php echo $select['password']; ?>">
            <br> Phone Number:
            <input type="phone" placeholder="Enetr your Phone number"  name="phone" value="<?php echo $select['phone']; ?>" ><br>
            DOB <input type="datetime-local" name="dob" value="<?php echo $select['DOB'] ?>">
             <p>Gender
             <ul type="none">
            <li>Male<input id="in"  type="radio"value="male"  name="gender"
                    <?php
             if($select['gender']=="male")
             {
                echo "checked";
                }
                ?>></li>
           <li> Female<input id="in" type="radio" value="female" name="gender"
                <?php
             if($select['gender']=="female")
             {
                echo "checked";
                }
                ?>></li>
            <li>Others<input id="in" type="radio"value="others"  name="gender"
                    <?php
             if($select['gender']=="others")
             {
                echo "checked";
                }
                ?>></li></ul></p>
            <p>Language:<br>
           <input id="in" type="checkbox"value="Bengali" name="chek[]"
           <?php 
             if(in_array('Bengali', $checked))
             {
                echo "checked";
             }
              ?>> Bengali
            <input id="in" type="checkbox" value="English"name="chek[]"
             <?php 
             if(in_array('English', $checked))
             {
                echo "checked";
             }
              ?>>English
          <input id="in" type="checkbox"value="Hindi" name="chek[]"
           <?php 
             if(in_array('Hindi', $checked))
             {
                echo "checked";
             }
              ?>>  Hindi</p>
        <br>Your College  <select name="college">
           
             <option value="not select"
              <?php
                if($select['college']=="not select")
                {
                    echo "selected";
                }
                ?>>....select college</option>
             <option value="Panskura Banamali College"
              <?php
                if($select['college']=="Panskura Banamali College")
                {
                    echo "selected";
                }
                ?>>Panskura Banamali College</option>            

              <option value="Midnapur Day college" 
               <?php
                if($select['college']=="Midnapur Day college")
                {
                    echo "selected";
                }
                ?> 
          >Midnapur Day college</option>
             <option value="Belda college"
             <?php
                if($select['college']=="Belda college")
                {
                    echo "selected";
                }
                ?>>Belda college</option> 
              <option value="Dantan college"
           <?php
                if($select['college']=="Dantan college")
                {
                  echo "selected";
                }
                ?>>Dantan college</option>            
              <option value="Kharagpur In the college"
              <?php
                if($select['college']=="Kharagpur In the college")
                {
                    echo "selected";
                }
                ?>>Kharagpur In the college</option>      
                  <option value="kontai college"
                <?php
                if($select['college']=="kontai college")
                {
                    echo "selected";
                }
                ?>>kontai college</option>            
          </select>

          
          
         <br>Your course: <input type="text" name="course" list="list1" value="<?php
         echo $select['course']; ?>">
         <datalist id="list1">
              <option value="BCA"
              >BCA</option>
              <option value="BBA"
              >BBA</option>
             <option value="MCA"
             >MCA</option> 
              <option value="MBA"
              >MBA</option>            
              <option value="B.TECH"
              >B.TECH</option>        
              <option value="M.TECH"
              >M.TECH</option> 

         </datalist>

         <br> Your Search:<input type="search" name="search" value="<?php echo $select['search']; ?>">
             <p>Address</p>
            <textarea type="text" name="address"  size="70"><?php echo $select['Address']; ?></textarea><br>
            
       <center><input type="checkbox" size=20>I Have Read And Agree All Terms And Condition</center><br>


            <input id="button" type="submit" value="submit" name="submit" >
            <button><a href="from.php">Home</button>
          
            
</form>

</body>
</html>
<?php
$id=$_POST['id'];
if(isset($_FILES['image']))
              {
              $name=$_FILES['image']['name'];
    $tmp=$_FILES['image']['tmp_name'];
    $size=$_FILES['image']['size'];
    $photo="upload_image/" . $name;
    move_uploaded_file($tmp,$photo);
   }
else{
  $photo=$_POST['image2'];

}
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $phone=$_POST['phone'];
            $DOB=$_POST['dob'];
            $gender=$_POST['gender'];
            $lang=$_POST['chek'];
            foreach ($lang as $item) {
                
            }
          // $language=implode(", " , $lang);
           
           $course=$_POST['course'];
           $college=$_POST['college'];
            $search=$_POST['search'];
            $address=$_POST['address'];
            if(isset($_POST['submit']))
            {
              /*  if(!isset($_POST['file']))
                {
                $update="UPDATE try set photo='$photo' , name='$name', email='$email', password='$password', phone='$phone' , DOB='$DOB', gender='$gender' language='$language' college='$college' course='$course' search='$search', address='$address' where id='$id'";
                $data2=mysqli_query($conn,$update);
                  if($data2)
            {
                echo "<script>alert('Data Submited Successfuly')</script>";
            }
        else {
                echo "<script>alert('Not Submited')</script>";
                
           }
       }
    else
  {*/
     $update="UPDATE try SET photo='$photo',name='$name',email='$email',password='$password',phone='$phone',DOB='$DOB',search='$search',address='$address' where id='$id'";
                $data2=mysqli_query($conn,$update);
                 
    

                echo "<h3>Data Submited Successfuly</h3>";
                echo "<div style='margin-left:40%;'><table border='1'><tr>".
                "<th colspan='2'>Your Data</th></tr>".

                "<tr><td rowspan='7'><img src='".$photo."' width='300px'></td></tr>".
                 "<tr><td>". $name. "</td></tr>".
                "<tr><td>".$email."</td></tr>".
                   
                    "<tr><td>".$phone."</td></tr>".
                     "<tr><td>".$DOB."</td></tr>".
                      "<tr><td>".$gender."</td></tr>".
                       "<tr><td>".$item."</td></tr>".
                          "<tr><td>".$course."</td>".
                     "<td>".$college."</td></tr>".
                       " <tr><td colspan='2'>".$search."</td></tr>".
                        " <tr><td colspan='2'>".$address."</td></tr>".
                        " </tr></table></div>";

                    }
   


?>


