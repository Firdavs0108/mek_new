$(function() {

AOS.init({
   duration: 1500,
});
//어도비 폰트
(function(d) {
    var config = {
      kitId: 'pak3nbn',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);

// 사이트맵
let mapList = $("#map-gnb .map_menu");
mapList.hover(function(){
  $(this).addClass("active").find(".lnb_two li").css({display:"block"})
},function(){
  $(this).removeClass("active").find(".lnb_two li").css({display:"none"})
})
$(".m-gnb").click(function(){
  $("#sitemap").slideDown(400, 'linear').show();
});

$(".site_close").click(function(){
  $("#sitemap").slideUp(400, 'linear').hide();
});

// 서브 lnb
// $(document).ready(function() {
//     $("#snb > li").click(function() {
//         $(this).find(".lnb").slideToggle().toggleClass("on");
//     });
//     $("#snb > li").mouseleave(function() {
//         $(this).find(".lnb").slideUp().removeClass("on");
//     });
// });



// 메인 비주얼 스와이퍼
  var swiper = new Swiper("#main_01 .swiper-container", {
  loop: true,
  allowTouchMove: false,
  autoHeight: true,
  slidesPerView: '1',
  touchEventsTarget: 'wrapper',
  centeredSlides: true,
  maxBackfaceHiddenSlides:4,
  spaceBetween: 0, // 슬라이드 간의 거리(px 단위)
  autoplay: {
  delay: 6000,
  disableOnInteraction: false,
  },
  controller: {
  control: pagingSwiper,
  },
  pagination: {
  el: ".swiper-pagination",
  type: "fraction",
  formatFractionCurrent: function (number) {
              return ('0' + number).slice(-2);
          },
          formatFractionTotal: function (number) {
              return ('0' + number).slice(-2);
          },
  },
  navigation: {
  nextEl: ".swiper-button-next",
  prevEl: ".swiper-button-prev",
  },
  });
//두번째 페이지네이션
  var pagingSwiper = new Swiper("#main_01 .swiper-container", {
  loop: true,

  pagination: {
  el: ".swiper-pagination2",
  clickable: true,
  },
  controller: {
  control: swiper
  },
  });
  swiper.controller.control = pagingSwiper;
  pagingSwiper.controller.control = swiper;



//푸터 언어
  $(document).ready(function() {
              $(".ft_global").click(function() {
                  $(".ft_global_list").slideToggle();
              });

              $(".ft_global").mouseleave(function() {
                  $(".ft_global_list").slideUp();
              });
          });
          var swiper = new Swiper("#main_06 .main_cert_patent .main_cert_bond .swiper-container", {
            loop: true,
            loopAdditionalSlides: 1,
            slidesPerView: 1,


            navigation: {
              nextEl: ".swiper-button-next3",
              prevEl: ".swiper-button-prev3",
            },
            breakpoints: {
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 4,
        },
        1024: {
          slidesPerView: 5,
        },
      },
          });

          var swiper = new Swiper("#main_06 .main_cert .main_cert_wrap .main_cert_certification .main_cert_bond .swiper-container", {
            loop: true,
            loopAdditionalSlides: 1,
            slidesPerView: 1,


            navigation: {
              nextEl: ".swiper-button-next4",
              prevEl: ".swiper-button-prev4",
            },
            breakpoints: {
        640: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 4,
        },
        1024: {
          slidesPerView: 5,
        },
      },
          });

  });
  document.addEventListener("DOMContentLoaded", function() {
      var snbItems = document.querySelectorAll("#snb > li");

      snbItems.forEach(function(item) {
          item.addEventListener("click", function() {
              var lnb = this.querySelector(".lnb");
              if (lnb.style.display === "none" || lnb.style.display === "") {
                  lnb.style.display = "block";
                  lnb.classList.toggle("on");
              } else {
                  lnb.style.display = "none";
                  lnb.classList.remove("on");
              }
          });

          item.addEventListener("mouseleave", function() {
              var lnb = this.querySelector(".lnb");
              lnb.style.display = "none";
              lnb.classList.remove("on");
          });
      });
  });
