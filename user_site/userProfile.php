<?php
session_start();

$user_name=$_SESSION['user_name'];
if(!isset($_SESSION['user_name'])){
    header('location:../home.php');
}
else{

$user_name= $_SESSION['user_name'];
$id = $_SESSION['id'];
$conn = mysqli_connect("localhost","root","","book_db");
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
    }
    else{
        $sql = "SELECT * from signup_form WHERE id = $id ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = $result->fetch_assoc();
          
        }
    }


?>
<!doctype html>
<title>User Profile</title>
<style>
body { 
  display: grid;
  grid-template-areas: 
    "header header header"
    "nav article ads"
    "footer footer footer";
  grid-template-rows: 80px 1fr 70px;  
  grid-template-columns: 20% 1fr 15%;
  grid-row-gap: 10px;
  grid-column-gap: 10px;
  height: 100vh;
  margin: 0;
  }  
header, footer, article, nav, div {
  padding: 1.2em;
background-color: #EEEDED;
  }
#pageHeader {
  grid-area: header;
  padding: 5px 20px 50px 30px;
  }
#pageFooter {
  grid-area: footer;
  }
#mainArticle { 
  grid-area: article;      
  }
#mainNav { 
  grid-area: nav; 
  }
#siteAds { 
  grid-area: ads; 
  } 
/* Stack the layout on small devices/viewports. */
@media all and (max-width: 575px) {
  body { 
    grid-template-areas: 
      "header"
      "article"
      "ads"
      "nav"
      "footer";
    grid-template-rows: 80px 1fr 70px 1fr 70px;  
    grid-template-columns: 1fr;
 }
}
.smallSize{
    font-size:18px;
}
table {
    border-collapse: collapse;
    /* Other styles for the table */
  }
  td, th {
    padding: 5px;
    /* Other styles for table cells */
  }
</style>
<body>
  <header id="pageHeader"><h1>User Profile </h1></header>
  <article id="mainArticle">
    <h2>Previous History</h2>
    <hr>
    <table border="1px solid black" >
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Destinaton</th>
        <th>Number of people</th>
        <th>Total Cost</th>
        <th>View</th>
        </tr>
        <?php
            include "../config.php";
            //read all row from database table;

            $sql = "SELECT * FROM `book_form` where  user_id= $id";
            $result = $conn->query($sql);
            $idnum=1;
            if(!$result){
            die("Invalid Query: " . $conn->error);
            }
            while($rows = $result->fetch_assoc()){
              echo" 
              <tr>
            <td>$idnum</td>
            <td>$rows[name]</td>
            <td>$rows[email]</td>
            <td>$rows[phone]</td>
            <td>$rows[address]</td>
            <td>$rows[location]</td>
            <td>$rows[guests]</td>
            <td>$rows[cost]</td>
            <td>
            <a href='my_book.php'  class='btn'>View</a>
            </td>
            </tr>
            ";
            $idnum++;
          }
            ?>
    </table>
    
    
 </article>
  <nav id="mainNav">
    <h2>Details</h2>
    <hr>
    <h3>Name :<span class="smallSize"><?php echo $row['name']; ?></span></h3> 
    <h3>Email:<span class="smallSize"> <?php echo $row['email']; ?></span></h3>
    <!-- <h3>Password:<span class="smallSize"> -->
    <h3>User type:<span class="smallSize"><?php echo ucfirst($row['user_type']); ?></span></h3> 

</nav>
  <div id="siteAds">Interested</div>
  <!-- <footer id="pageFooter">Footer</footer> -->
</body>
<?php
}
?>