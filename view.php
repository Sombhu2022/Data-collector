 <html>
 <head>
    <style type="">
        body{
            font-size:50px;
            background: linear-gradient(rgb(89, 167, 226),rgb(228, 11, 252));
            color: white;
}
       

    </style>
 </head>
 <body>
    <h3>Dashboard</h3>
     <table border='1'><tr>
                           <td>Id</td>
                           <td>Photo</td>
                           <td>Name</td>
                           <td>Email   Id</td>
                           <td>Phone Number</td>
                           <td>DOB</td>
                           <td>Gender</td>
                           <td>Language</td>
                           <td>Your Search</td>
                           <td>Address</td>
                            </tr>

    <?php  
    include("connection.php");                     

                $q="SELECT id,photo,name,email ,phone,DOB,gender,language,search,Address from try";
                $result=mysqli_query($conn,$q);
                $row=mysqli_num_rows($result);
            

                    

                for($i=0;$i<$row;$i++)
                {

                $out=mysqli_fetch_assoc($result);
                $r=$out["photo"];
                echo "<tr>".
                "<td>".$out["id"] . "</td>".
                "<td><img src='".$out["photo"]."' width='90px'></td>".
                 "<td>". $out["name"]. "</td>".
                "<td>".$out["email"]."</td>".
                   
                    "<td>".$out["phone"]."</td>".
                     "<td>".$out["DOB"]."</td>".
                      "<td>".$out["gender"]."</td>".
                       "<td>".$out["language"]."</td>".
                       " <td>".$out["search"]."</td>".
                        " <td>".$out["Address"]."</td>".
                        " </tr>"
                ;
                
                }
            
        
         
?>
 </table>

</body></html>

