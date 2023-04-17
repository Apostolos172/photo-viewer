<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Photo manager</title>
  <style>
    html {
      height: 100%;
    }

    html body {
      height: 100%;
    }

    html body div#demo {
      height: 100%;
    }

    html body div#demo button.carousel-control-next,
    html body div#demo button.carousel-control-prev {
      background-color: rgb(0, 0, 0);
      opacity: 0.7;
    }

    html body div#demo .carousel-indicators [data-bs-target] {
      height: 5px;
    }

    html body div#demo .carousel-indicators .active {
      background-color: yellowgreen;
    }

    html body div#demo div.carousel-inner {
      height: 100%;
      background-color: black;
    }

    html body div#demo div.carousel-inner div.carousel-item {
      height: 100%;
    }

    html body div#demo div.carousel-inner div.carousel-caption {
      display: flex;
      flex-direction: row;
      justify-content: center;
    }

    html body div#demo div.carousel-inner div.carousel-caption * {
      width: -moz-fit-content;
      width: fit-content;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 15px;
      margin: auto;
      margin-right: 5px;
      margin-left: 5px;
      overflow: auto;
    }

    html body div#demo div.carousel-inner img {
      height: 100%;
      margin: auto;
    }

    @media screen and (max-width: 1000px) {
      html body div#demo div.carousel-inner {
        background-color: black;
      }

      html body div#demo div.carousel-inner div.carousel-item {
        transition-delay: 0s;
        transition-duration: 0s;
        display: none;
      }

      html body div#demo div.carousel-inner div.carousel-item.active {
        display: flex;
      }

      html body div#demo div.carousel-inner div.carousel-caption {
        display: flex;
        flex-direction: column;
        align-items: center;
      }

      html body div#demo div.carousel-inner div.carousel-caption * {
        width: -moz-fit-content;
        width: fit-content;
        background-color: rgba(232, 232, 232, 0.3);
        padding: 9px;
        margin: auto;
        overflow: auto;
        max-width: 250px;
        margin-top: 5px;
      }

      html body div#demo div.carousel-inner div.carousel-item img {
        height: 100%;
        width: auto;
      }

      html body div#demo div.carousel-inner div.carousel-item.active img {
        width: 100%;
        height: auto;
        margin: auto;
      }
    }

    /*# sourceMappingURL=style.css.map */
  </style>
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
    if ($splitted[1] == "png" || $splitted[1] == "jpg" || $splitted[1] == "gif" || $splitted[1] == "jpeg") {
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
  <!-- Carousel -->
  <div id="demo" class="carousel slide">

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
  <script>
    let contentData = [
      "lightsSea.jpg",
      "car-bridge.jpeg",
      "clouds-rock-mountains-landscape.jpg",
    ];

    let split = "lightsSea.jpg".split(".");
    console.log(split[0]);

    // let nameOfCarousel = "demo";
    // var carousel = document.getElementById(nameOfCarousel);

    document.addEventListener("DOMContentLoaded", () => {
      console.log(passedArray);
      contentData = passedArray;
      console.log(contentData);

      let nameOfCarousel = "demo";
      const carouselObj = {
        domObj: document.getElementById(nameOfCarousel),
      };

      let fillCarousel = () => {
        createDots();
        addImagesAndCaptions();
      };

      let createDots = (
        carousel = carouselObj.domObj,
        nameCarousel = nameOfCarousel
      ) => {
        let dotsContainer = document.createElement("div");
        dotsContainer.classList.add("carousel-indicators");
        contentData.forEach((currentValue, index) => {
          let btn = document.createElement("button");
          // index === 0 ? btn.classList.add("active") : "Do nothing";
          index === 0 && btn.classList.add("active");
          btn.setAttribute("data-bs-target", `#${nameCarousel}`);
          btn.setAttribute("data-bs-slide-to", index);
          dotsContainer.appendChild(btn);
        });
        carousel.appendChild(dotsContainer);
      };

      let addImagesAndCaptions = (
        carousel = carouselObj.domObj,
        nameCarousel = nameOfCarousel
      ) => {
        let carouselInnerDiv = document.createElement("div");
        carouselInnerDiv.classList.add("carousel-inner");
        contentData.forEach((currentValue, index) => {
          let div = document.createElement("div");
          div.classList.add("carousel-item");
          index === 0 && div.classList.add("active");

          let img = document.createElement("img");
          img.src = currentValue;
          img.alt = "image";
          img.classList.add("d-block");
          div.appendChild(img);

          let caption = document.createElement("div");
          caption.classList.add("carousel-caption");
          let h3 = document.createElement("h3");
          h3.appendChild(document.createTextNode(`Όνομα του αρχείου εικόνας`));
          caption.appendChild(h3);
          let p = document.createElement("p");
          p.appendChild(document.createTextNode(`${currentValue}`));
          caption.appendChild(p);
          div.appendChild(caption);

          carouselInnerDiv.appendChild(div);
        });
        carousel.appendChild(carouselInnerDiv);
      };

      fillCarousel();
    });
  </script>
</body>

</html>