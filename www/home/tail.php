<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}
?>

<?php if(!defined('_INDEX_')) { // index 아닐때만 실행 ?>
  </div><!-- } #sub 끝 -->
<?php }?>

<!-- 푸터시작 -->
<footer id="footer" class="section fp-auto-height fp-auto-height-responsive main_contact_section">
  <div class="footer container">
    <div class="footer_wrap">
      <div class="footer_left">
        <h1 class="logo_w"><a href="<?php echo G5_URL?>"><img src="<?php echo G5_IMG_URL?>/logo.png" alt="MEK"></a></h1>
        <div class="footer_info">
          <address>
            <ul>
              <li><?php echo $default['de_admin_company_name'];?></li>
              <li>대표 : <?php echo $default['de_admin_company_owner'];?></li>
              <li>주소 : <?php echo $default['de_admin_company_addr']; ?></li>
              <li>TEL :  <a href="tel:<?php echo $default['de_admin_company_tel']; ?>"><?php echo $default['de_admin_company_tel']; ?></a><span class="spc"> | </span><br class="mobr">FAX : <?php echo $default['de_admin_company_fax']; ?></li>
              <li><a href="mailto:<?php echo $default['de_admin_info_email']; ?>" >E-mail : <?php echo $default['de_admin_info_email']; ?></a></li>
            </ul>
          </address>
          <small>Copyrightⓒ MEK Engineering Corp. & MEK Inc. All rights reserved. <span class="spc"> | </span> <a href="https://designtalktalk.com/home/" target="_blank">Design by DesignTalkTalk</a></small>
      </div>
      </div>
      <div class="footer_link">
        <ul class="footer_link_list">
          <li><a href="#"><img src="<?php echo G5_IMG_URL?>/icon_naver_blog.png" alt="MEK 네이버 블로그 링크 아이콘"></a></li>
          <li class="ft_global">
            <a href="javascript:" class="ft_global_btn"><i class="ri-global-line"></i></a>
          <ul class="ft_global_list">
            <li><a href="<?php echo G5_URL?>">KO</a></li>
            <li><a href="#">EN</a></li>
            <li><a href="#">CN</a></li>
            <li><a href="#">JP</a></li>
          </ul>
        </li>
        </ul>
        <a href="#" class="pt_pri">개인정보처리방침</a>
      </div>
    </div>
  </div>
</footer>
<!-- 푸터 끝 -->



<?php
include_once(G5_PATH."/tail.sub.php");
