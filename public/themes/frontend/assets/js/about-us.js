const milestoneContentSwiper = new Swiper('.milestone-content-swiper', {
    direction: 'horizontal',
    slidesPerView: 4,
    spaceBetween: 58,
    speed: 1000,
    observer: true,
    observeParents: true,
    parallax:true,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      },
      375: {
        slidesPerView: 2,
        spaceBetween: 30,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 40,
        autoplay: false,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 58,
      }
    },
    navigation: {
        nextEl: '.milestone-content .swiper-button-next',
        prevEl: '.milestone-content .swiper-button-prev',
    }
  });

const leaderTeamSwiper = new Swiper('.leader-team-swiper', {
    direction: 'horizontal',
    slidesPerView: 3,
    spaceBetween:40,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween:20,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        }
      },
      375: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
        spaceBetween:30,
        autoplay: false,
      },
      992: {
        slidesPerView: 3,
      }
    },
    navigation: {
      nextEl: '.leader-team .swiper-button-next',
      prevEl: '.leader-team .swiper-button-prev',
    }
  });

  const spaceSwiper = new Swiper('.space-restaurant-swiper', {
    direction: 'horizontal',
    slidesPerView: 3,
    spaceBetween: 0,
    speed: 1000,
    breakpoints: {
      0: {
        slidesPerView: 1,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      },
      375: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
        autoplay: false,
      },
      992: {
        slidesPerView: 3,
      }
    },
    navigation: {
        nextEl: '.space-restaurant .swiper-button-next',
        prevEl: '.space-restaurant .swiper-button-prev',
    }
  });

  const homePartner = new Swiper('.partner-swiper', {
    direction: 'horizontal',
    slidesPerView: 5,
    spaceBetween: 40,
    speed: 1000,
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      375: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 24,
      },
      1200: {
        slidesPerView: 5,
        spaceBetween: 39,
        grid: {
          rows: 2,
          fill: 'row'
        },
      }
    }
  });
