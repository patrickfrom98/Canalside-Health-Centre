<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="views/css/application-header.css">
      <link rel="stylesheet" type="text/css" href="views/css/application-footer.css">
      <link rel="stylesheet" type="text/css" href="views/css/styles.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <title><?php echo $title; ?></title>
  </head>
  <body>
  <header>
      <h1>Canalside Health Centre</h1>
  </header>
  <nav>
      <div class='topnav' id='myTopnav'>
          <a class='home' href="index.php?action=home">Home</a>
          <?php
          if ($_SESSION['role'] === "Receptionist") {
              echo "<a href='index.php?action=register'>Registration</a>";
              echo "<a href='index.php?action=diary'>Diaries</a>";
              echo "<a href='index.php?action=users'>Users</a>";
          } else if ($_SESSION['role'] === "Patient") {
              echo "<a href='index.php?action=details'>Details</a>";
              echo "<a href='index.php?action=bookings'>Bookings</a>";
          }
          ?>
          <a href='index.php?action=logout'>Logout</a>
          <a href='javascript:void(0);' class='icon' onclick='myFunction()'>
              <i class='fa fa-bars'></i>
          </a>
      </div>
  </nav>
