function switchRegisterForm() {
  let newUserText = document.getElementById("new__user--text");

  newUserText.addEventListener("click", openNewForm);

  function openNewForm() {
    let registerForm = document.getElementById("register_form");
    let flex_not_flex = registerForm.style.display;

    if ((registerForm.style.display = "none")) {
      registerForm.style.display = "flex";
      newUserText.innerHTML = "Cancel registration";
    }
    if (flex_not_flex === "flex") {
      registerForm.style.display = "none";
      newUserText.innerHTML = "New user, register now?";
    }
    console.log("clicked");
  }
}

function carrousel_images() {
  $.ajax({
    url: "../src/library/avatarsApi.php",
    type: "post",
    data: { thereArefotos: "adios" },
    success: function (response) {
      let myImages = JSON.parse(response);
      putImagesOnCarrousel(myImages);
    },
  });

  function putImagesOnCarrousel(arrayImages) {
    let owlCarousel = document.getElementById("owl-carousel");

    arrayImages.forEach((image) => {
      let myDiv = document.createElement("img");
      myDiv.setAttribute("class", "item img_carrousel");
      myDiv.setAttribute("src", `${image.photo}`);
      myDiv.setAttribute("alt", `${image.name}`);
      owlCarousel.appendChild(myDiv);
    });
    createCarrousel();
  }
}

function createCarrousel() {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
    // nav: true,
    center: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  $(".loop").owlCarousel({
    center: true,
    items: 2,
    loop: true,
    margin: 10,
    responsive: {
      600: {
        items: 4,
      },
    },
  });
}

function editEmployee(row) {
  window.location = `${window.location.pathname}/../../src/employee.php?id=${row.item.id}`;
}

function createNewEmployee() {
  window.location = `${window.location.pathname}/../../src/employee.php`;
}
