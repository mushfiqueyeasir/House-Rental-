<?php
  require '../config/config.php';
  if(empty($_SESSION['username']))
    header('Location: login.php');  

    try {
      if($_SESSION['role'] == 'admin'){
        

        $stmt = $connect->prepare('SELECT * FROM room_rental_registrations');
        $stmt->execute();
        $data2 = $stmt->fetchAll (PDO::FETCH_ASSOC);

        $data = $data2;
      }

      if($_SESSION['role'] == 'user'){
        

        $stmt = $connect->prepare('SELECT * FROM room_rental_registrations WHERE :user_id = user_id ');
        $stmt->execute(array(
          ':user_id' => $_SESSION['id']
        ));
        $data2 = $stmt->fetchAll (PDO::FETCH_ASSOC);

        $data = $data2;
      }
    }catch(PDOException $e) {
      $errMsg = $e->getMessage();
    } 
    
?>
<?php include '../include/header.php';?>

  <!-- Header nav --> 
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li class="nav-item">
              <a href="../auth/logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- end header nav -->
  <section style="padding-left:0px;">
    <?php include '../include/side-nav.php';?>
  </section>

<section class="wrapper" style="margin-left: 16%;margin-top: -23%;">
  <div class="container">
    <div class="row">
      <div class="col-12">
      <?php
        if(isset($errMsg)){
          echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
        }
      ?>
      <h2>List of House Details</h2>
        <?php 
          foreach ($data as $key => $value) {           
            echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">          
                  <div class="card-block">';
                    echo '<a class="btn btn-warning float-right" href="update.php?id='.$value['id'].'&act=';if(!empty($value['own'])){ echo "ap"; }else{ echo "indi"; } echo '">Edit</a>';
                   echo   '<div class="row">
                      <div class="col-4">
                      <h4 class="text-center">Owner Details</h4>';
                        echo '<p><b>Owner Name: </b>'.$value['fullname'].'</p>';
                        echo '<p><b>Mobile Number: </b>'.$value['mobile'].'</p>';
                        echo '<p><b>Email: </b>'.$value['email'].'</p>';
                        echo '<p><b>Country: </b>'.$value['country'].'</p><p><b> City: </b>'.$value['city'].'</p>';
                        echo '<p><b>Address: </b>'.$value['address'].'</p>';
                        if ($value['image'] !== 'uploads/') {
                          # code...
                          echo '<img src="'.$value['image'].'" width="250">';
                        }

                        

                      
                    echo '</div>
                      <div class="col-3">
                      <h4>Other Details</h4>';
                      echo '<p><b>Facilities: </b>'.$value['accommodation'].'</p>';
                      echo '<p><b>Description: </b>'.$value['description'].'</p>';
                        if($value['vacant'] == 0){ 
                          echo '<div class="alert alert-danger" role="alert"><p><b>Occupied</b></p></div>';
                        }else{
                          echo '<div class="alert alert-success" role="alert"><p><b>Vacant</b></p></div>';
                        } 
                      echo '</div>
                    </div>              
                   </div>
                </div>';
          }
        ?>        
      </div>
    </div>
  </div>  
</section>
<?php include '../include/footer.php';?>