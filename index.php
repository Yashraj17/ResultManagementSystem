<?php
$conn = mysqli_connect("localhost","root","","rms");
if (!$conn) {
    echo"unsucessfull :(";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>resultmanagement</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary " >
        <div class="container">
            <a href="index.php" class="navbar-brand text-light">RESULT MANAGEMENT</a>
            <form action="index.php" method="get" class="d-flex mx-auto">
                <input type="search" name="search" class="form-control" placeholder="Enter your roll " size="60">
                <input type="submit" name="go" class="btn btn-dark ms-2" value="search">
            </form>
        </div>
        
    </nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
        <form action="index.php" method="post">
     <div class="mt-5">
     <label for="">Name</label><br>
      <input type="text" placeholder="Enter your name" name="name"  class="form-control">
     </div>
     <div class="mt-3">
     <label for="">contact</label><br>
     <input type="number" placeholder="Enter your contact" name="contact" class="form-control">
     </div>

     <div class="mt-3">
     <label for="">email</label><br>
     <input type="email" placeholder="Enter your email" name="email" class="form-control">
     </div>

 <div class="row ">
 <div class=" col mt-3">
     <label for="">Maths</label><br>
     <input type="number" placeholder="Marks" autocomplete="off" name="maths" class="form-control">
     </div>
     <div class="col mt-3">
     <label for="">Science</label><br>
     <input type="number" placeholder="Marks" autocomplete="off" name="science" class="form-control">
     </div>
     <div class=" col mt-3">
     <label for="">Sst</label><br>
     <input type="number" placeholder="Marks" autocomplete="off" name="sst" class="form-control">
     </div>
 </div>
<div class="row">
<div class="mt-3 col">
     <label for="">English</label><br>
     <input type="number" placeholder="Marks" name="english" class="form-control">
     </div>
     <div class="mt-3 col">
     <label for="">Hindi</label><br>
     <input type="number" placeholder="Marks" name="hindi" class="form-control">
     </div>
</div>
        <input type="submit" name="create" class="btn btn-success mt-3 w-100">
    </form>
        </div>

        <div class="col-8">
            <table class="table table-bordered table-striped">
                <thead>
                   <tr>
                       <th scope="col">Roll</th>
                       <th scope="col">Name</th>
                       <th scope="col">Contact</th>
                       <th scope="col">Email</th>
                       <th scope="col">Maths</th>
                       <th scope="col" >Science</th>
                       <th scope="col">SSt</th>
                       <th scope="col">English</th>
                       <th scope="col">Hindi</th>
                       <th scope="col">Total</th>
                       <th scope="col">Action</th>
                   </tr>
                </thead>
                
<?php
        if (isset($_POST['create'])) {
           $name = $_POST['name'];
           $contact = $_POST['contact'];
           $email = $_POST['email'];
           $maths = $_POST['maths'];
           $science = $_POST['science'];
           $sst = $_POST['sst'];
           $english= $_POST['english'];
           $hindi = $_POST['hindi'];
           $insert_query = "insert into results (name,contact,email,maths,science,sst,english,hindi) value ('$name','$contact','$email','$maths','$science','$sst','$english','$hindi')";
    
           $query = mysqli_query($conn,$insert_query);
        }
?>
                <?php
                                if (isset($_GET['go'])) {
                                    $search = $_GET['search'];
                                    $sql = "select * from results where name LIKE '%$search%'";
                                    $data= mysqli_query($conn,$sql);
                                    $count = mysqli_num_rows($data);
                                    if ($count<1) {
                                       echo"<div class='alert alert-danger'>No Result found </div> ";
                                    }
                                   
                            }
                        else {
                            $sql = "SELECT * FROM results ";
                            $data = mysqli_query($conn,$sql);
                        }
            
                    while($row=mysqli_fetch_assoc($data))
                    { 
                        $total = $row['maths'] + $row['science'] + $row['sst'] + $row['english'] + $row['hindi'] ;
                        ?>
       
                            <tbody>
                            <tr>
                                <td><?php echo $row['roll'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['contact'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['maths'] ?></td>
                                <td><?php echo $row['science'] ?></td>
                                <td><?php echo $row['sst'] ?></td>
                                <td><?php echo $row['english'] ?></td>
                                <td><?php echo $row['hindi'] ?></td>
                                <td><?php echo $total  ?></td>
                                <td> <a href="result.php?id=<?php echo $row['roll'] ?>" class="btn btn-sm btn-success" >view result</a> </td>
                                <td> <a href="delete.php?id=<?php echo $row['roll'] ?>" class="btn btn-sm btn-danger" > X </a></td>
                                
                            </tr>
                        </tbody>
                   <?php } ?>
          
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>