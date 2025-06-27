// Плавность прокрутки якорей
const smoothLinks = document.querySelectorAll('a[href^="#"]');
for (let smoothLink of smoothLinks) {
  smoothLink.addEventListener("click", function (e) {
    e.preventDefault();
    const id = smoothLink.getAttribute("href");
    document.querySelector(id).scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  });
}

// Выпадающий список
document.querySelectorAll(".accordion-header").forEach((button) => {
  button.addEventListener("click", () => {
    const body = button.nextElementSibling;
    const icon = button.querySelector(".accordion-icon");
    const allBodies = document.querySelectorAll(".accordion-body");
    const allIcons = document.querySelectorAll(".accordion-icon");
    const allHeaders = document.querySelectorAll(".accordion-header");

    allBodies.forEach((b) => {
      if (b !== body) b.style.display = "none";
    });

    allIcons.forEach((i) => {
      if (i !== icon) i.classList.remove("active");
    });

    allHeaders.forEach((h) => {
      if (h !== button) h.classList.remove("active");
    });

    const isVisible = body.style.display === "flex";
    body.style.display = isVisible ? "none" : "flex";
    button.classList.toggle("active", !isVisible);
    icon.classList.toggle("active", !isVisible);
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("applicationForm");
  const message = document.getElementById("thankYouMessage");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(form);

    fetch("send.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((text) => {
        if (text.includes("OK")) {
          form.style.display = "none";
          message.style.display = "block";
        } else {
          alert("Произошла ошибка при отправке.");
        }
      })
      .catch((error) => {
        console.error("Ошибка:", error);
        alert("Ошибка соединения.");
      });
  });
});

new Swiper(".swiper", {
  navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
  loop: true,
  spaceBetween: 1,
  autoplay: {
    delay: 3000, // 3 секунды между слайдами
    disableOnInteraction: false, // не останавливать при взаимодействии пользователя
  },
  breakpoints: {
    320: {
      slidesPerView: 1, // На маленьких экранах — 1 слайд
    },
    640: {
      slidesPerView: 2, // На средних — 2 слайда
    },
    1024: {
      slidesPerView: 4, // На больших — 4 слайда
    },
  },
});
