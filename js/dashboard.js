// update content
$(document).ready(function () {
  $.get("../dashboard-pages/dashboard_page.php", function (result) {
    $("#content").html(result);
  });

  $("#dashboard").click(function () {
    $.ajax({
      url: "../dashboard-pages/dashboard_page.php",
      success: function (result) {
        $("#content").html(result);
      },
    });
  });
  $("#foods").click(function () {
    $.ajax({
      url: "../dashboard-pages/foods_page.php",
      success: function (result) {
        $("#content").html(result);
      },
    });
  });
  $("#beverages").click(function () {
    $.ajax({
      url: "../dashboard-pages/beverages_page.php",
      success: function (result) {
        $("#content").html(result);
      },
    });
  });
  $("#gallery").click(function () {
    $.ajax({
      url: "../dashboard-pages/gallery_page.php",
      success: function (result) {
        $("#content").html(result);
      },
    });
  });
  $("#reservation").click(function () {
    $.ajax({
      url: "../dashboard-pages/reservation_page.php",
      success: function (result) {
        $("#content").html(result);
      },
    });
  });
  $("#help").click(function () {
    $.ajax({
      url: "../dashboard-pages/help_page.php",
      success: function (result) {
        $("#content").html(result);
      },
    });
  });
});

// toggle burger
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");

closeBtn.addEventListener("click", () => {
  sidebar.classList.toggle("open");
  // call function
  changeBtn();
});

function changeBtn() {
  if (sidebar.classList.contains("open")) {
    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
  } else {
    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
  }
}

// sidebar when active
let links = document.getElementsByClassName("sidebar-item");

for (let i = 0; i < links.length; i++) {
  links[i].onclick = function () {
    for (let j = 0; j < links.length; j++) {
      if (links[j].classList.contains("active")) {
        links[j].classList.remove("active");
      }
    }

    this.classList.add("active");
  };
}

// GetCookie visits
// Mendapatkan nilai cookie dengan nama 'visits'
let visits = parseInt(getCookie("visits"));

// Jika cookie belum diatur, maka nilai 'visits' diatur menjadi 0
if (isNaN(visits)) {
  visits = 0;
}

// Menampilkan jumlah pengunjung
let visitsElement = document.getElementById("visits");
if (visitsElement !== null) {
  visitsElement.innerHTML = "Jumlah pengunjung: " + visits;
}

// Fungsi untuk mendapatkan nilai cookie dengan nama tertentu
function getCookie(name) {
  let cookies = document.cookie.split(";");
  for (let i = 0; i < cookies.length; i++) {
    let cookie = cookies[i].trim();
    if (cookie.startsWith(name + "=")) {
      return cookie.substring(name.length + 1);
    }
  }
  return null;
}
