<?php 

$email= $_POST['email'];
$password =md5($_POST['password']);
ECHO $email;
ECHO $password;

$conn = mysqli_connect("localhost","root","","book_db");
$SQL = "SELECT * FROM `signup_form` where email= {$email} AND password ={$password}";
$result = mysqli_query($conn,$SQL);
$count = 0;
if($result->num_rows > 0 )
{
    // while($row = $result->FETCH_ASSOC())
    // {
    //     if($email == $row['email'] && $password == $row['password'] )
    //     {
            $count = 1;
            ?>
                <script>
                    alert("Log in Success");
                    location.href = "http://localhost/travel-project/home.php"
                    
                    </script>
            <?php 
        // }
    // }
}
if($count == 0)
{
?>
<script>
    alert("incorrect");
    location.href = "http://localhost/travel-project/home_login.php?#"

</script>
<?php 
}?>