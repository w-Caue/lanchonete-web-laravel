let swiper = new Swiper(".card__content", {
    slidesPerView: 4,
    loop: true,
    autoplay: {
        delay: 2000,
    },

    pagination: {
        el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

const navbar = document.querySelector(".navbar");
const elements = document.querySelector(".element-animation");
const block = document.querySelector(".content-block");

gsap.to(navbar, {
    padding: -20,
    duration: 2,
    scrollTrigger: {
        trigger: block,
        start: 'top',
        end: 'center',
        scrub: true,
    }
});

gsap.to(elements, {
    y: -25,
    opacity: 0,
    duration: 2,
    scrollTrigger: {
        trigger: block,
        start: 'top',
        end: 'center',
        scrub: true,
    }
});


const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const arrowBtn = document.querySelectorAll(".wrapper .btn");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const carouselChildrens = [...carousel.children];

let isDragging = false,
    startX,
    startScrollLeft,
    timeoutId;

let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

// carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
//     carousel.insertAdjacentHTML("afterbegin", card.outerHTML)
// });

// carouselChildrens.slice(0, cardPerView).forEach(card => {
//     carousel.insertAdjacentHTML("beforeend", card.outerHTML)
// });

arrowBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft +=
            btn.id === "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
};

const dragging = (e) => {
    if (!isDragging) return;
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
};

const dragStop = (e) => {
    isDragging = false;
};

const autoPlay = () => {
    if (window.innerWidth < 800) return;
    timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 3000);
};
autoPlay();

const infiniteScroll = () => {
    if (carousel.scrollLeft === 0) {
        // console.log("chegou no começo do carrossel");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
    } else if (
        Math.ceil(carousel.scrollLeft) ===
        carousel.scrollWidth - carousel.offsetWidth
    ) {
        // console.log("chegou no final do carrossel");
        carousel.scrollLeft = carousel.offsetWidth;
    }

    clearTimeout(timeoutId);
    if (!wrapper.matches(":hover")) autoPlay();
};

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);
