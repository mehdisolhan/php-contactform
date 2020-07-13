<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
  <div class="container"> 
      <div class="col-md-8 order-md-1">
      <h4>İletişim Formu</h4>

      <?php if(isset($_SESSION["alert"])) { ?>
                <div class="alert alert-<?php echo $_SESSION["alert"]["type"]; ?>" role="alerts">
                 <?php echo $_SESSION["alert"]["message"]; ?>
                 </div>
                 <?php unset($_SESSION["alert"]); ?>
      <?php } ?>

      <form name="frmContact" id="" method="post" enctype="multipart/form-data" action="phpmailer/send.php">
        <div class="row mb-4">
          <div class="col-lg-10">
            <div class="name-input">
              <label for="nameLabel">İsim-Soyisim</label>
              <input id="userName" name="userName" class="form-control" type="text" required>
            </div>
          </div>
        </div>  

        <div class="row mb-4">
          <div class="col-lg-10">
            <div class="email-input">
              <label for="mailLabel">Mail Adresiniz</label>
              <input id="userMail" name="userMail" class="form-control" type="mail" placeholder="kullaniciadi@example.com" required> 
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-lg-10">
            <div class="subject-input">
              <label for="subjectLabel">Konu</label>
              <input id="subject" name="subject" class="form-control" type="text" required>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-lg-10">
            <div class="content-input">
              <label for="contentLabel">Mesaj</label>
              <textarea id="content" name="content" class="form-control" rows="8" required ></textarea>
            </div>
          </div>
        </div>

        <div class="row mb-2">
          <div class="submit-input mx-auto">
            <button type="submit" name="send" class="form-control btn btn-primary">Mesajı Gönder</button>
          </div>
        </div>

      </form>
      </div>
  </div>  

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>