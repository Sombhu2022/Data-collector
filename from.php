
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <form action="connection.php" method="post" enctype="multipart/form-data">
            <h1>Registration Form </h1>
             Photo
            <input type="file" name="image" accept="image/*">
            <br> Name:
            <input type="name" placeholder="Enter Your Name" name="name" ><br>
             Email:
            <input type="Email"  placeholder="enter your Email" name="email" ><br>
             Password
            <input id="pass" type="password" placeholder="enter password" name="password" ><br>
            confirm password:<input type="password" name="pass" id="con">
            <br> Phone Number:
            <input type="phone" placeholder="Enetr your Phone number"  name="phone" ><br>
            DOB <input type="date" name="dob">
             <p>Gender
             <ul type="none">
            <li>Male<input id="in"  type="radio"value="male"  name="gender"></li>
           <li> Female<input id="in" type="radio" value="female" name="gender"></li>
            <li>Others<input id="in" type="radio"value="others"  name="gender"></li></ul></p>
            <p>Language:<br>
           <input id="in" type="checkbox"value="Bengali" name="chek[]"> Bengali
            <input id="in" type="checkbox" value="English"name="chek[]">English
          <input id="in" type="checkbox"value="Hindi" name="chek[]">  Hindi</p>
        <br>Your College  <select name="college">
           
             <option value="not select">....select college</option>
             <option value="Panskura Banamali College">Panskura Banamali College</option>            

              <option value="Midnapur Day college">Midnapur Day college</option>
             <option value="Belda college">Belda college</option> 
              <option value="Dantan college">Dantan college</option>            
              <option value="Kharagpur In the college">Kharagpur In the college</option>        <option value="kontai college">kontai college</option>            
          </select>

          
          
         <br>Your Course: <input type="text" name="course" list="list1">
         <datalist id="list1">
              <option value="BCA">BCA</option>
              <option value="BBA">BBA</option>
             <option value="MCA">MCA</option> 
              <option value="MBA">MBA</option>            
              <option value="B.TECH">B.TECH</option>        <option value="M.TECH">M.TECH</option> 

         </datalist>

         <br> Your Search:<input type="search" name="search">
             <p>Address</p>
            <textarea type="text" name="address"  size="70"></textarea><br>
            
       <center><input type="checkbox" size=20>I Have Read And Agree All Terms And Condition</center><br>


            <input id="button" type="submit" value="submit" name="submit" >
            <input id="button"type="reset" value="reset" name="reset">
          <input id="button" type="submit"  name="View" value="View">
        <input id="button" type="submit"  name="search" value="search">
            
</form>

</body>
</html>