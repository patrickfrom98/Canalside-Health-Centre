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
  <header>Canalside Health Centre</header>
  <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="" title="Canalside Health Centre">CHS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="color: #fff;"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
              <a class="nav-item nav-link active" href='index.php?action=home'>Home <span class="sr-only">(current)</span></a>
              <?php
              if ($_SESSION['role'] === "Receptionist") {
                  echo "<a class='nav-item nav-link' href='index.php?action=register'>Registration</a>";
                  echo "<a class='nav-item nav-link' href='index.php?action=diary'>Diaries</a>";
                  echo "<a class='nav-item nav-link' href='index.php?action=users'>Users</a>";
              }
              ?>
              <a class="nav-item nav-link" href='front-controller.php?action=logout'>Logout</a>
          </div>
      </div>
  </nav>
