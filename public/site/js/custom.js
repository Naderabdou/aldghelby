// Aos
AOS.init();

setTimeout(() => {
  $(".loading").fadeOut(1000);
}, 1000);

window.onload = function () {
  setTimeout(() => {
    $(".header-pages").addClass("active");
    $(".aosh-page").addClass("active");
  }, 500);
};




let btnShowPass = document.querySelectorAll(".show-password i");
btnShowPass.forEach((ele) => {
  ele.parentElement.nextElementSibling.setAttribute("type", "password");
  ele.addEventListener("click", function (e) {
    e.preventDefault();
    const type =
      e.target.parentElement.nextElementSibling.getAttribute("type") ===
      "password"
        ? "text"
        : "password";

    e.target.parentElement.nextElementSibling.setAttribute("type", type);

    if (e.target.classList.contains("bi-eye-slash")) {
      e.target.classList.add("bi-eye");
      e.target.classList.remove("bi-eye-slash");
    } else {
      e.target.classList.add("bi-eye-slash");
      e.target.classList.remove("bi-eye");
    }
  });
});

// chenge img prpfile

$(document).ready(function () {
  var readURLprofile = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(".img-profile img").attr("src", e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  };

  $("#chenge1").on("change", function () {
    readURLprofile(this);
  });
});


if ($("#slider-hero").length) {
  $("#slider-hero").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    items: 1,
    autoplayTimeout: 6000,
    autoplayHoverPause: false,
    rtl: true,
    autoplay: true,

    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 700,
    responsiveClass: true,
    responsive: {
      992:{
        nav: false,
      },
      0: {
        items: 1,
      },
    },
  });
}

if ($("#slider-customers").length) {
  $("#slider-customers").owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    items: 1,
    autoplayTimeout: 3500,
    autoplayHoverPause: false,
    rtl: true,
    autoplay: false,

    autoplayHoverPause: true,
    dots: false,
    smartSpeed: 700,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
    },
  });
}

$(".remove_mune").click(function () {
  $("#menu-div").removeClass("active");
  $(".bg_menu").removeClass("active");
});

function open() {
  $(".navicon").addClass("is-active");
  $("#menu-div").addClass("active");
  $("#times-ican").addClass("active");
  $(".bg_menu").addClass("active");
}

function close() {
  $(".navicon").removeClass("is-active");
  $("#menu-div").removeClass("active");
  $("#times-ican").removeClass("active");
  $(".bg_menu").removeClass("active");


  $(".remove-mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".times-ican").removeClass("active");
  });
}

$("#times-ican").click(function () {
  if ($(this).hasClass("active")) {
    close();
  } else {
    open();
  }
});

$(".btns_menu_responsive").click(function (e) {
  close();
});

$(".remove-mune").click(function () {
  $("#menu-div").removeClass("active");
  $(".bg_menu").removeClass("active");
  $(".times-ican").removeClass("active");
  $(".navicon").removeClass("is-active");
});

$("#menu-div a").click(function () {
  e.preventDefault();
});

var $winl = $(window); // or $box parent container
var $boxl = $(
  "#menu-div, #times-ican "
);
$winl.on("click.Bst", function (event) {
  if (
    $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
    !$boxl.is(event.target) //checks if the $box itself was clicked
  ) {
    close();
  }
});




$("#upload-1").change(function (e) {
  $("#file-text").text(e.target.files[0].name);
});

if ($("#btn-show").length) {
let btnClick = document.querySelector("#btn-show"),
  formOrder = document.querySelector(".order-services"),
  textBtn = document.querySelector("#btn-show div");
btnClick.addEventListener("click", function () {
  if (btnClick.classList.contains("active")) {
    btnClick.classList.remove("active");
    formOrder.classList.remove("active");
    textBtn.textContent = "طلب الخدمة  ";
  } else {
    btnClick.classList.add("active");
    formOrder.classList.add("active");
    textBtn.textContent = "إلغاء طلب الخدمة ";
  }
});
}
