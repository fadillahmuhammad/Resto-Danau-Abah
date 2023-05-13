//toggle class active
const navbarNav = document.querySelector(".navbar-nav");
//on-clicked
document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

//click out of sidebar
const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

// navbar scrolling
const navbar = document.querySelector(".navbar");
window.addEventListener("scroll", function () {
  if (window.scrollY > 0) {
    navbar.classList.add("scroll");
  } else {
    navbar.classList.remove("scroll");
  }
});

// carousel
const carouselSlides = document.querySelectorAll(".carousel-slide");
const prevBtn = document.querySelector(".carousel-prev");
const nextBtn = document.querySelector(".carousel-next");
const carouselIndicators = document.querySelectorAll(".carousel-indicator");

let currentIndex = 0;
let intervalId = null;

function showSlide(index) {
  carouselSlides.forEach((slide) => slide.classList.remove("active"));
  carouselSlides[index].classList.add("active");

  carouselIndicators.forEach((indicator) =>
    indicator.classList.remove("active")
  );
  carouselIndicators[index].classList.add("active");
}

function prevSlide() {
  currentIndex =
    currentIndex === 0 ? carouselSlides.length - 1 : currentIndex - 1;
  showSlide(currentIndex);
}

function nextSlide() {
  currentIndex =
    currentIndex === carouselSlides.length - 1 ? 0 : currentIndex + 1;
  showSlide(currentIndex);
}

function startInterval() {
  intervalId = setInterval(() => {
    nextSlide();
  }, 5000);
}

function stopInterval() {
  clearInterval(intervalId);
}

prevBtn.addEventListener("click", () => {
  prevSlide();
  stopInterval();
  startInterval();
});

nextBtn.addEventListener("click", () => {
  nextSlide();
  stopInterval();
  startInterval();
});

carouselIndicators.forEach((indicator, index) => {
  indicator.addEventListener("click", () => {
    currentIndex = index;
    showSlide(currentIndex);
    stopInterval();
    startInterval();
  });
});

showSlide(currentIndex);
startInterval();

// animasi teks
const text = document.querySelector(".text-animate");

const words = ["Resto", "Coffee Shop", "Wedding", "Outbound", "Leisure Park"];
let i = 0;

setInterval(() => {
  text.innerHTML = words[i];
  i++;
  if (i >= words.length) {
    i = 0;
  }
}, 5000);

// indicator menu food
const menuCategoriesFood = document.querySelectorAll(".menu-category.food");
menuCategoriesFood.forEach((category) => {
  category.addEventListener("click", () => {
    menuCategoriesFood.forEach((category) => {
      category.classList.remove("active");
    });
    category.classList.add("active");
  });
});

// indicator menu beverage
const menuCategoriesBeverage = document.querySelectorAll(
  ".menu-category.beverage"
);
menuCategoriesBeverage.forEach((category) => {
  category.addEventListener("click", () => {
    menuCategoriesBeverage.forEach((category) => {
      category.classList.remove("active");
    });
    category.classList.add("active");
  });
});

// menu kategori food
document.querySelectorAll(".menu-category.food").forEach((item) => {
  item.addEventListener("click", (event) => {
    const category = event.target.dataset.category;
    fetch(`get_menu_food.php?category=${category}`)
      .then((response) => response.text())
      .then((data) => {
        // Update the content area with the fetched data
        document.querySelector(".menu-flex.food").innerHTML = data;
      });
  });
});

// menu kategori beverage
document.querySelectorAll(".menu-category.beverage").forEach((item) => {
  item.addEventListener("click", (event) => {
    const category = event.target.dataset.category;
    fetch(`get_menu_beverage.php?category=${category}`)
      .then((response) => response.text())
      .then((data) => {
        // Update the content area with the fetched data
        document.querySelector(".menu-flex.beverage").innerHTML = data;
      });
  });
});

// swiper menu (masih gajelasssss)
// food
const menuFlex = document.querySelector(".menu-flex.food");
const menuCards = document.querySelectorAll(".menu-card.food");
const menuPrev = document.querySelector(".menu-prev.food");
const menuNext = document.querySelector(".menu-next.food");

const cardWidth = menuCards[0].offsetWidth + 16;
const displayCards = 4;
const totalCards = menuCards.length;
const totalWidth = cardWidth * totalCards;
let currentIndexMenu = 0;

menuFlex.style.width = `${totalWidth}px`;

menuPrev.addEventListener("click", () => {
  currentIndexMenu--;
  if (currentIndexMenu < 0) {
    currentIndexMenu = totalCards - displayCards;
    menuFlex.style.transform = `translateX(-${currentIndexMenu * cardWidth}px)`;
    currentIndexMenu--;
  }
  menuFlex.style.transform = `translateX(-${currentIndexMenu * cardWidth}px)`;
});

menuNext.addEventListener("click", () => {
  currentIndexMenu++;
  if (currentIndexMenu + displayCards > totalCards) {
    currentIndexMenu = 0;
    menuFlex.style.transform = `translateX(0)`;
  }
  menuFlex.style.transform = `translateX(-${currentIndexMenu * cardWidth}px)`;
});

// beverage
const menuFlex2 = document.querySelector(".menu-flex.beverage");
const menuCards2 = document.querySelectorAll(".menu-card.beverage");
const menuPrev2 = document.querySelector(".menu-prev.beverage");
const menuNext2 = document.querySelector(".menu-next.beverage");

const cardWidth2 = menuCards2[0].offsetWidth + 16;
const displayCards2 = 4;
const totalCards2 = menuCards2.length;
const totalWidth2 = cardWidth2 * totalCards2;
let currentIndexMenu2 = 0;

menuFlex2.style.width = `${totalWidth2}px`;

menuPrev2.addEventListener("click", () => {
  currentIndexMenu2--;
  if (currentIndexMenu2 < 0) {
    currentIndexMenu2 = totalCards2 - displayCards2;
    menuFlex2.style.transform = `translateX(-${
      currentIndexMenu2 * cardWidth2
    }px)`;
    currentIndexMenu2--;
  }
  menuFlex2.style.transform = `translateX(-${
    currentIndexMenu2 * cardWidth2
  }px)`;
});

menuNext2.addEventListener("click", () => {
  currentIndexMenu2++;
  if (currentIndexMenu2 + displayCards2 > totalCards2) {
    currentIndexMenu2 = 0;
    menuFlex2.style.transform = `translateX(0)`;
  }
  menuFlex2.style.transform = `translateX(-${
    currentIndexMenu2 * cardWidth2
  }px)`;
});

// automatic scroll gallery
const galleryCards = document.querySelectorAll(".gallery-card");
const galleryWrap = document.querySelector(".gallery-wrap");

let currentPosition = 0;
let targetPosition = galleryWrap.offsetWidth - galleryCards[0].offsetWidth;

function slideCards() {
  currentPosition += 1;
  if (currentPosition >= targetPosition) {
    clearInterval(intervalId);
  }
  galleryCards.forEach((card) => {
    card.style.transition = "transform 0.1s ease-out";
    card.style.transform = `translateX(-${currentPosition}px)`;
  });
}

const intervalIdGallery = setInterval(slideCards, 30);

// form contact ajax
const contactForm = document.getElementById("contact-form");
const loader = document.querySelector(".loader");

loader.style.display = "none";

contactForm.addEventListener("submit", function (e) {
  loader.style.display = "block";

  e.preventDefault();

  const url = e.target.action;
  const formData = new FormData(contactForm);

  fetch(url, {
    method: "POST",
    body: formData,
    mode: "no-cors",
  })
    .then(() => {
      //url
      showNotification();
      document
        .querySelectorAll("input, textarea")
        .forEach((input) => (input.value = ""));
      loader.style.display = "none";
      window.location.href = "#contact";
    })
    .catch((e) => alert("Error occured"));
});

function showNotification() {
  const notification = document.querySelector("#successNotification");
  notification.style.display = "block";

  // Animate the notification smoothly
  setTimeout(() => {
    notification.style.top = "0";
  }, 50);

  // Hide the notification after 3 seconds
  setTimeout(() => {
    hideNotification(notification);
  }, 3000);
}

function hideNotification(notification) {
  notification.style.top = "-50px";

  // Hide the notification after the animation is complete
  setTimeout(() => {
    notification.style.display = "none";
  }, 500);
}
