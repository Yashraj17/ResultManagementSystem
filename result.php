<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="card " style="width: 40rem;">
            <div class="card-header text-center p-0"><h2>Report Card</h2></div>

            <?php 
            $conn = mysqli_connect("localhost","root","","rms");
            if (!$conn) {
                echo"unsucessfull :(";
            }
              $ids = $_GET['id'];
              $sql = "select * from results where roll= '$ids'";
              $data = mysqli_query($conn,$sql);
              $row = mysqli_fetch_array($data);
            ?>
               <table class="table table-striped">
                   <thead>
                   <tr>
                           <th>Roll</th>
                           <th><?php echo $row['roll'] ?></th>
                       </tr>
                       <tr>
                           <th>Name</th>
                           <th><?php echo $row['name'] ?></th>
                       </tr>
                       <tr>
                           <th>Contact</th>
                           <th><?php echo $row['contact'] ?></th>
                       </tr>
                       <tr>
                           <th>Email</th>
                           <th><?php echo $row['email'] ?></th>
                       </tr>
                   </thead>
                   <tbody>
                   <tr>
                           <th>Maths</th>
                           <th><?php echo $row['maths'] ?></th>
                       </tr>
                       <tr>
                           <th>Science</th>
                           <th><?php echo $row['science'] ?></th>
                       </tr> 
                        <tr>
                           <th>SSt</th>
                           <th><?php echo $row['sst'] ?></th>
                       </tr>
                       <tr>
                           <th>English</th>
                           <th><?php echo $row['english'] ?></th>
                       </tr>
                       <tr>
                           <th>Hindi</th>
                           <th><?php echo $row['hindi'] ?></th>
                       </tr>
                       <tr>
                           <th>Total</th>
                           <th><?php echo $total = $row['maths'] + $row['science'] + $row['sst'] + $row['english'] + $row['hindi'] ;?></th>
                       </tr>
                       <tr>
                           <th>Result</th>
                           <th><?php 
                           if ($total>=400) {
                              echo'1st Division Pass';
                           }
                           elseif ($total>=250 && $total<400) {
                            echo'2nd Division Pass';
                           }
                           else {
                            echo'3rd Division Fail';
                           }
                           ?></th>
                       </tr>
                   </tbody>
               </table>
               <a href="index.php" class="btn btn-dark">Back</a>
            </div>
           
        </div>
    </div>
  
</body>
</html>