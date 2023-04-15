<!-- <?php
      // echo "hi from php<br/>";
      foreach (glob("*.*") as $filename) {
        $revFilename = strrev($filename);
        // echo $revFilename . "<br/>";
        // echo $filename . "<br/>";
        $splitted = explode(".", $revFilename);
        $splitted = explode(".", $filename);
        $imges = array();
        if ($splitted[1] == "png" || $splitted[1] == "jpg" || $splitted[1] == "gif" || $splitted[1] == "jpeg" || $splitted[1] == "mp4") {
          // echo $filename . "<br />";
          array_push($imges, $filename);
        }
        // echo $imges;
        foreach ($imges as $value) {
          echo $value . "<br />";
        }

        //$imges 
      }
      ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Photo manager</title>
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
  <?php
  $imges = array();

  // echo "hi from php<br/>";
  foreach (glob("*.*") as $filename) {
    $revFilename = strrev($filename);
    // echo $revFilename . "<br/>";
    // echo $filename . "<br/>";
    $splitted = explode(".", $revFilename);
    $splitted = explode(".", $filename);
    if ($splitted[1] == "png" || $splitted[1] == "jpg" || $splitted[1] == "gif" || $splitted[1] == "jpeg" || $splitted[1] == "mp4") {
      // echo $filename . "<br />";
      array_push($imges, $filename);
    }
  }

  // echo $imges;
  foreach ($imges as $value) {
    //echo $value . "<br />";
  }

  //$imges
  //print_r($imges);
  ?>
  <script>
    // Access the array elements
    var passedArray =
      <?php echo json_encode($imges); ?>;
    // console.log(passedArray);
    // Display the array elements
    for (let i = 0; i < passedArray.length; i++) {
      console.log(passedArray[i]);
    }
  </script>
  <script src="./fillCarouselWithContent.js"></script>
  <!-- Carousel -->
  <div id="demo" class="carousel slide">
    <!-- data-bs-ride="carousel" -->
    <!-- Indicators/dots -->
    <!-- <div class="carousel-indicators">
        <button
          type="button"
          data-bs-target="#demo"
          data-bs-slide-to="0"
          class="active"
        ></button>
        <button
          type="button"
          data-bs-target="#demo"
          data-bs-slide-to="1"
        ></button>
        <button
          type="button"
          data-bs-target="#demo"
          data-bs-slide-to="2"
        ></button>
      </div> -->

    <!-- The slideshow/carousel -->
    <!-- <div class="carousel-inner">
        <div class="carousel-item active">
          <img
            src="lightsSea.jpg"
            alt="Los Angeles"
            class="d-block"
            style=""
          />
          <div class="carousel-caption">
            <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="car-bridge.jpeg"
            alt="Chicago"
            class="d-block"
            style=""
          />
          <div class="carousel-caption">
            <h3>Chicago</h3>
            <p>Thank you, Chicago!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img
            src="clouds-rock-mountains-landscape.jpg"
            alt="New York"
            class="d-block"
            style=""
          />
          <div class="carousel-caption">
            <h3>New York</h3>
            <p>We love the Big Apple!</p>
          </div>
        </div>
      </div> -->

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- <div class="container-fluid mt-3">
      <h3>Carousel Example</h3>
      <p>
        The following example shows how to create a basic carousel with
        indicators and controls.
      </p>
    </div> -->
</body>

</html>