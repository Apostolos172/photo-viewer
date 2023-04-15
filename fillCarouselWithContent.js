`
<!-- Indicators/dots -->
      <div class="carousel-indicators">
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
      </div>

`;

`
<div class="carousel-inner">
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
</div>
`;

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
  //console.log(passedArray);
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
