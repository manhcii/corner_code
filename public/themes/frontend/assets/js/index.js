  const ourProduct = new Swiper('.our-product-swiper', {
    direction: 'horizontal',
    slidesPerView: 3,
    spaceBetween: 40,
    speed: 1000,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 16,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      },
      375: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 24,
        autoplay: false,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 40,
      }
    },
    navigation: {
        nextEl: '.our-product .swiper-button-next',
        prevEl: '.our-product .swiper-button-prev',
    }
  });

  const specialMenu = new Swiper('.special-menu-info', {
    direction: 'horizontal',
    slidesPerView: 1,
    spaceBetween: 20,
    speed: 1000,
    navigation: {
        nextEl: '.special-menu-info .swiper-button-next',
        prevEl: '.special-menu-info .swiper-button-prev',
    },
    pagination: {
      el: '.special-menu-info .swiper-pagination',
      clickable: true,
    },
  });

  const testimonial = new Swiper('.testimonial-swiper', {
    direction: 'horizontal',
    slidesPerView: 3,
    spaceBetween: 43,
    speed: 1000,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 24,
        autoplay: false,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 40,
      }
    },
  });


  const homeBlog = new Swiper('.home-blog-swiper', {
    direction: 'horizontal',
    slidesPerView: 2,
    spaceBetween: 40,
    speed: 1000,
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
        spaceBetween: 20,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 24,
        autoplay: false,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 40,
      }
    },
    navigation: {
        nextEl: '.home-blog .swiper-button-next',
        prevEl: '.home-blog .swiper-button-prev',
    }
  });


//   const homePartner = new Swiper('.partner-swiper', {
//     direction: 'horizontal',
//     slidesPerView: 5,
//     spaceBetween: 40,
//     speed: 1000,
//     autoplay: {
//       delay: 3000,
//     },
//     breakpoints: {
//       0: {
//         slidesPerView: 2,
//         spaceBetween: 20,


//       },
//       375: {
//         slidesPerView: 3,
//         spaceBetween: 30,
//       },
//       768: {
//         slidesPerView: 4,
//         spaceBetween: 24,
//       },
//       1200: {
//         slidesPerView: 5,
//         spaceBetween: 39,
//         grid: {
//           rows: 2,
//           fill: 'row'
//         },
//       }
//     }
//   });

  //Set min date, hour cho form book table
//   const bookingDateHome = document.querySelector('#bookingDateHome')
//   const bookingTimeHome = document.querySelector('#bookingTimeHome')
//   const today = new Date();
//   const year = today.getFullYear();
//   const month = (today.getMonth() + 1).toString().padStart(2, '0')
//   const day = today.getDate().toString().padStart(2, '0')
//   const todayFormat = `${year}-${month}-${day}`
//   bookingDateHome.setAttribute('min', todayFormat)
//   bookingDateHome.value = todayFormat

//   const currentHour = today.getHours().toString().padStart(2, '0');
//   const currentMinute = today.getMinutes().toString().padStart(2, '0');
//   const currentTimeString = `${currentHour}:${currentMinute}`;

//   bookingTimeHome.setAttribute("min", currentTimeString);
//   bookingTimeHome.value = currentTimeString
