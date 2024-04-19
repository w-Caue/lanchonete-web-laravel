
let swiper = new Swiper('.card__content', {
    slidesPerView: 4,
    loop: true,
    autoplay: {
        delay: 2000,
    },

    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

const myObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        } else {
            entry.target.classList.remove("show");
        }
    });
});

const elements = document.querySelectorAll(".element-animation");

elements.forEach((element) => myObserver.observe(element));




const dragging = (e) => {
    // if (!isDragging) return;
   
    carousel.scrollLeft = e.pageX;
};

const carousel = document.querySelector('.carousel');

carousel.addEventListener("mousemove", dragging);