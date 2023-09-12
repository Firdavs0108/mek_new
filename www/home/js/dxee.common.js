// site load : 사이트를 로드할 때 실행
function siteLoad () {

  // Animation init
  dxee.Animation.init()

  // mainSlideInit
  dxee.Slide.init();

  // fullpage init
  fullPageInit();

}

// 메인페이지의 풀페이지 설정
function fullPageInit() {
  if ($('#fullpage').length) new fullpage('#fullpage', {
    licenseKey: 'DXEE',
    anchors: ['section-page1', 'section-page2', 'section-page3', 'section-page4', 'section-page5', 'section-page6', 'section-page7', 'section-page8'],
    menu: '.main-page-anchor',
    afterLoad: function (index, anchorIndex){
      new dxee.Animation({obj: $('.fullpage-inner, .page01 .active', anchorIndex.item)})
    }
  });
}

//animation
$(function() {
	AOS.init();
});


// 이벤트 등록
$(siteLoad)
  .on('click', '.tab a', tabActive)
  .on('click', '.mobile-menu', mobileMenuToggle)

$(window).on('scroll', sticky)
