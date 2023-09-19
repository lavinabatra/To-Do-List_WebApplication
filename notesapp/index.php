<!-- integrating to my other application  -->
<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!=true){
    header("location:/lavina/pages/login.php");
    exit;
   
}
$srnonj=$_SESSION['s.no'];
// echo $srnonj;  //use it for debugging i know its complicated but you can do it

?>



<?php
// maintaining access to the database
$hostname="localhost";
$username="root";
$password="";
$database="notes";
$verify=false;

//handeling errors;
$connection=false;
$submiterr=false;
$deleteerr=false;
$updateerr=false;


// to hide all errors 
error_reporting(0);
ini_set('display_errors', 0);

//to show all errors
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

//connecting to the database and error handeling 
$conn = mysqli_connect($hostname,$username,$password,$database);
if($conn){
    // echo "You are successfully connected to the database<br>";

}
else{
    header("Location: /lavina/notesapp/error.html");
    exit();
}

$sql= "SELECT * FROM `$srnonj`" ;
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "successfully connected to the notes databse<br>";
    } 
    else{
        header("Location: /lavina/notesapp/error.html");
        exit();
}

// deleting and updating the database 

// for deleting the data from the data base using delete button 
// because is set it delet as get request i use get here 
if(isset($_GET['delete'])){
    $srno=$_GET['delete'];
    $deletedb="DELETE FROM `$srnonj` WHERE `$srnonj`.`sr.no` = '$srno'";
    $deletecheck=mysqli_query($conn,$deletedb);
    if($deletecheck){
        $verify=true;
    }
    else{
        $deleteerr=true;
    }
}


// as insert and update  data i use post method so i add post here 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    

    //edit and update
    if(isset($_POST['snoedit'])){
        // i will update query here
        $srno=$_POST['snoedit'];
        $title=$_POST['edittitle'];
        $description=$_POST['editdescription'];
        $insertdb="UPDATE `$srnonj` SET `description` = '$description', `title`='$title' WHERE `$srnonj`.`sr.no` = '$srno';";
        $updatecheck=mysqli_query($conn,$insertdb);
        //for debugging
        if($updatecheck){
            // echo "success";
            $verify=true;
        }
        else{
            $updateerr=true;
        }
    }
    else{
        // i write the insert query here
    $title=$_POST['title'];
    $description=$_POST['description'];
    $insertdb="INSERT INTO `$srnonj` ( `title`, `description`, `date`) VALUES ('$title', '$description', current_timestamp())";
    $checkinsert=mysqli_query($conn,$insertdb);
    if ($checkinsert){
        $verify=true;
    }
    else{
        $submiterr=true;
    }
}
}


?>

<!-- from here html srart  i will create a css file seperatly -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes By lavina</title>
    <!-- This is the css of datatabe which i take form internet  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <!-- //to do some task like adding modal i use bootstrap here  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- this is my css file  -->
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="./notes.png" type="image/icon type">
</head>

<body>
      

      <!-- i start to edit modal here  -->
     <!-- This is the button of modal i will uncomment if there is some issue in javascript which triger modal basically i will use it for debugging  -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit modal</button> -->

    <!-- The main modal start form here  -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <!-- i had used post method to upsate the note  -->
                    <form action="/lavina/notesapp/index.php" method="POST">

                        <!-- i trigger hidden button here to trigger sno edit to edit the file serial number wise  -->
                        <input type="hidden" id="snoedit" name="snoedit">
                        <label for="edittitle" class="label">Title:</label>
                        <input name="edittitle" id="edittitle" type="text" placeholder="Enter Title here">
                        <label for="editdescription" class="label">Description:</label>
                        <textarea name="editdescription" id="editdescription" cols="30" rows="5"
                            placeholder="Enter Your note here"></textarea>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <!-- modal ends here  -->

    <!-- now the front page start from here  -->
    <div class="title">
    <div class="leftnavnj"><h2>SecureNote</h2></div>
    <div class="centernavnj">
    <h1>welcome <?php echo $_SESSION['username'];?></h1>
    </div>
    <div class="rightnavnj">
            <a href='/lavina/pages/logout.php'>Log Out</a>   
            </div>
    </div>

    <!-- I setup this main div as i want to edit all things inside this main box -->
    <div class="main">

        <!-- this php is make to hide error from user as if sometimes error my triger due to some internall issues -->
        <?php
            if($verify){
            // This will trigger id we are unable to connect to mysql database and the database of notes
            header("Location: /lavina/notesapp/index.php");
            exit();
            
    
        }
        if($submiterr){

            // This will trigger if we are unable to submit the note enter by user 
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Sorry for The incovenience, we are unable to submit your note at this moment please contact us at test@gmail.com
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        // This will trigger if we are unable to delet the note 
        if($deleteerr){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Sorry for The incovenience, we are unable to Delete your note at this moment please contact us at test@gmail.com
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        // This will trigger if we are unable to update the form enter by user
        if($updateerr){
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            Sorry for The incovenience, we are unable to Update your note at this moment please contact us at test@gmail.com
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
       
        ?>

        <!-- The note form start here  -->
        <div class="form">
            <form action="/lavina/notesapp/index.php" method="POST">
                <label for="title" class="label">Title:</label>
                <input name="title" id="title" type="text" placeholder="Enter Title here">
                <label for="description" class="label">Description:</label>
                <textarea name="description" id="description" cols="30" rows="7"
                    placeholder="Enter Your note here"></textarea>
                <button type="submit" class="butn">Submit</button>
            </form>
        </div>

        <!-- The form ends here  -->

        <!-- This is the container where i will display my datatable  -->
        <div class="container my-4 lavinacust">

            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">S.no</th>
                        <th scope="col" style="width: 22%;">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="width: 20%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- php to display the database starts here  -->
                    <?php
                        

                        // while loop is used so that it will print the result untill the database end 

                        // s.no is use as i don't want the user to see s.no use in the database is they are not systamatic arranged i want that user see the number in sequence 
                        $sno=0;
                        while($row=mysqli_fetch_assoc($result)){
                            $sno+=1;
                            // i have include the table in php so that the data will be shown to the user without any problem in the format of a table 
                            echo "<tr>
                            <th scope='row'>".$sno."</th>
                            <td><div class='titletb'>".$row['title']."</div></td>
                            <td><div class='njbox'><span>".$row['description']."</span></div> </td>
                            <td ><div class='njbutn'> <button class='edit butne' id=".$row['sr.no'].">Edit</button><button class='delete butne' id=del".$row['sr.no'].">Delete</button></div></td>
                            </tr>";

                        }
                    ?>
                    <!-- php ends here  -->


                </tbody>
            </table>
        </div>
        <footer>
            &copy; Created By Lavina Batra
        </footer>
    </div>

    <!-- The html ends here  -->



  <!-- This is the section for javascript  -->

    <!-- i will include jquarry here i take it from the official jquarry website it was important to runt the datatable script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
    </script>

    <!-- This is the datatabel script i take this from the official datatable website  -->
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">
    </script>

    <!-- i include this script so that te javascript will apply on the dataatable i created in html with id mytable -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <!-- This are the script written by me to do various operation in the application  -->


        <!-- This script is to make edit button working and to toogle modal which i created  -->
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            // i add a event listener and iet will listen clicks by the user 
            element.addEventListener("click", (e) => {
                //uncomment this if we face some issue in the program and see the result in the consoal 
                // console.log("edit",e.target.parentNode.parentNode.parentNode) 

                // we use nodeparent to shift on the proveous parent of the element eg ul is parent od li
                tr = e.target.parentNode.parentNode.parentNode; // this is the target which we set 
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                //use this for debugging
                // console.log(title, description); 


                editdescription.value = description;
                edittitle.value = title;
                snoedit.value = e.target.id;
                //use this for debugging
                // console.log(e.target.id); 

                $('#editModal').modal('toggle');
            })
        })
    </script>

    <!-- The script for edating ends here  -->

 
 <!-- This  is the script to make delet button working  -->
<script>
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            // i had add a event listener here to listen click on the delet button 
            element.addEventListener("click", (e) => {
                
                
                //use this for debugging
                // console.log("delete",e.target.parentNode.parentNode.parentNode) 


                sno=e.target.id.substr(3,); // This is because i want to remove del in the delet serial number eg del33 so it will remove del and we get 33

                // to have confirmation from user weather he want to delet the file or not befor deleting the note 

                if (confirm("Do You really want to Delete it!!")){
                    // use it for debugging
                    // console.log("yes");
                    // console.log(sno);
                    window.location=`/lavina/notesapp/index.php?delete=${sno}`;
                }
                else{
                    // use this for debugging 
                    // console.log("no");
                }
            })
        })
    </script>

    <!-- // The script for delete ends here  -->



   
    
    <!-- This are the bootstarp javascript which i need to run modal properly i can do it by own but i found it easy  -->

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

</body>

</html>


<!-- our html ends here  -->




         <!-- 😀 Finally i complet this  -->

        <!-- BY lavina batra  -->