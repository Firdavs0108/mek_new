<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once(G5_PATH.'/KeyShotXR.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<!-- 게시물 읽기 시작 { -->
<?php
// 분류 사용 여부
$is_category = false;
$category_option = '';
if ($board['bo_use_category']) {
    $is_category = true;
    $category_href = G5_BBS_URL.'/board.php?bo_table='.$bo_table;
    $category_option .= '<li><a href="'.$category_href.'"';
    if ($sca=='' && !$wr_id)
        $category_option .= ' id="bo_cate_on"';
    $category_option .= '>전체</a></li>';
    $categories = explode('|', $board['bo_category_list']); // 구분자가 , 로 되어 있음
    for ($i=0; $i<count($categories); $i++) {
        $category = trim($categories[$i]);
        if ($category=='') continue;
        $category_option .= '<li><a href="'.($category_href."&amp;sca=".urlencode($category)).'"';
        $category_msg = '';
        if ($category==$sca || $category==$category_name) { // 현재 선택된 카테고리라면
            $category_option .= ' id="bo_cate_on"';
            $category_msg = '<span class="sound_only">열린 분류 </span>';
        }
        $category_option .= '>'.$category_msg.$category.'</a></li>';
    }
}
?>

<!-- 게시판 카테고리 시작 { -->

<?php if ($is_category) { ?>

<nav id="bo_cate">
    <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
    <ul id="bo_cate_ul">
        <?php echo $category_option ?>
    </ul>
</nav>

<?php } ?>

<article id="bo_v" style="width:<?php echo $width; ?>">

    <section id="bo_v_info">
        <h2>페이지 정보</h2>
        <span class="sound_only">작성자</span> <strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
        <span class="sound_only">댓글</span><strong><a href="#bo_vc"> <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo number_format($view['wr_comment']) ?>건</a></strong>
        <span class="sound_only">조회</span><strong><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($view['wr_hit']) ?>회</strong>
        <strong class="if_date"><span class="sound_only">작성일</span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>

    </section>

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>
	  <div id="pro_text_w">
        <!-- 본문 내용 시작 { -->
		<div id="bo_v_text">
			  <h2 id="bo_v_title">
				<p class="bo_v_tit">
				<?php
				echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
				?></p>
				<?php if ($category_name) { ?>
				<span class="bo_v_cate"><?php echo $view['ca_name']; // 분류 출력 끝 ?></span>
				<?php } ?>
			</h2>
			<div id="bo_v_con">
				<?php echo get_view_thumbnail($view['content']); ?>
			</div><!-- } #bo_v_con 끝 -->
		</div> <!-- } #bo_v_text 끝 -->
        <?php //echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>
        <!-- } 본문 내용 끝 -->

        <?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

    <!-- 제품 이미지 출력 -->

    <div id="pro_img_w">
      <div class="pro_img">
        <ul class="big">
          <?php if($view['wr_8']) { ?>
            <li>
              <div id="KeyShotXR"><img src="<?=G5_URL?>/img/img_360.png" class="img_360"></div>
            </li>
          <?php } ?>
          <? for ($i=0; $i<=count($view['file']); $i++) {
             if ($view['file'][$i]['view'] && $i<5) { ?>
              <li><?php echo "<img src='{$view[file][$i][path]}/{$view[file][$i][file]}' style='max-width:100%;max-height:100%'>";  ?></li>
              <? }
             }?>
        </ul>
      </div><!-- .pro_img -->

      <div class="thum_w">
        <i class="fas fa-chevron-up thum_arrow arrow_up"></i>
        <i class="fas fa-chevron-down thum_arrow arrow_down"></i>
        <div class="thum_box">
           <ul class="thum">
             <?php if($view['wr_8']) { ?>
               <li>
                 <div id="KeyShotXR"><img src="<?=G5_URL?>/img/img_360.png" class="img_360"></div>
               </li>
             <?php } ?>
              <? for ($i=0; $i<=count($view['file']); $i++) {
               if ($view['file'][$i]['view'] && $i<5) { ?>
                <li><?php echo "<img src='{$view[file][$i][path]}/{$view[file][$i][file]}' style='max-width:100%;max-height:100%'>";  ?></li>
                <? }
               }?>
          </ul>
        </div>
      </div>
   </div><!-- .pro_img_w -->
	 </div>
   <!-- .pro_img_w -->

   <div class="add_img"<?php if(empty($view['file'][8]['file'])=='none') { echo "style=display:none"; }?>>
 		<?php if($view['file'][8]['file']) { ?>
 			<h2 class="view_title">계통도</h2>
 			<?php echo "<img src='{$view[file][8][path]}/{$view[file][8][file]}'>";  ?>
 		<?php } ?>
 	</div>

  <div class="spec_box">
    <div id="bo_v_feature"<?php if(empty($view['wr_1'])=='NULL') { echo "style=display:none"; }?>>
      <h2 class="view_title">제품 구성</h2>
      <p class="view_textbox"><?php echo $view['wr_1']; ?></p>
    </div><!-- } #bo_v_feature 끝 -->
  </div>

  <div class="spec_box">
    <div id="bo_v_use"<?php if(empty($view['wr_2'])=='NULL') { echo "style=display:none"; }?>>
      <h2 class="view_title">주요 기능</h2>
      <p class="view_textbox"><?php echo $view['wr_2']; ?></p>
    </div><!-- } #bo_v_use 끝 -->
  </div>

  <div id="bo_v_software"<?php if(empty($view['wr_7'])=='NULL') { echo "style=display:none"; }?>>
    <h2 class="view_title">알코파인드 음주관리시스템 전용 소프트웨어</h2>
    <p class="view_textbox"><?php echo $view['wr_7']; ?></p>
  </div><!-- } #bo_v_use 끝 -->

  <div class="spec_box">
    <h2 class="view_title spec_title"<?php if(empty($view['wr_3'])=='NULL') { echo "style=display:none"; }?>>제품 사양</h2>
    <?php if($view['file'][6]['file']) { ?><a href="<?php echo $view['file'][6]['href'];  ?>" class="manual"><i class="fas fa-download"></i> Manual</a><?php } ?>
        <table class="spec_table"<?php if(empty($view['wr_3'])=='NULL') { echo "style=display:none"; }?>>
      <?php $spec_title = explode('//',$view['wr_3']);
      $spec = explode('//',$view['wr_4']);
      for($i=0; $i<count($spec_title); $i++) { ?>
      <tr class="table_tr">
        <th><?=$spec_title[$i]?></th>
        <td><?=$spec[$i]?></td>
      </tr>
      <?php } ?>
     </table>
  </div>

  <div class="add_img"<?php if(empty($view['file'][10]['file'])=='none') { echo "style=display:none"; }?>>
  <?php if($view['file'][10]['file']) { ?>
    <h2 class="view_title">APP 모드 사용 방법</h2>
    <?php echo "<img src='{$view[file][10][path]}/{$view[file][10][file]}'>";  ?>
  <?php } ?>
  </div>

  <div id="bo_v_handset"<?php if(empty($view['wr_6'])=='NULL') { echo "style=display:none"; }?>>
    <h2 class="view_title">핸드셋 화면 설명</h2>
    <p class="view_textbox"><?php echo $view['wr_6']; ?></p>
  </div><!-- } #bo_v_use 끝 -->


    <div class="add_img"<?php if(empty($view['file'][9]['file'])=='none') { echo "style=display:none"; }?>>
      <?php if($view['file'][9]['file']) { ?>
       <h2 class="view_title">시동잠금장치 사용 시나리오</h2>
       <?php echo "<img src='{$view[file][9][path]}/{$view[file][9][file]}'>";  ?>
     <?php } ?>
    </div>

    <div class="add_img"<?php if(empty($view['file'][7]['file'])=='none') { echo "style=display:none"; }?>>
 		<?php if($view['file'][7]['file']) { ?>
 			<h2 class="view_title">음주관리시스템 사용 시나리오</h2>
 			<?php echo "<img src='{$view[file][7][path]}/{$view[file][7][file]}'>";  ?>
 		<?php } ?>
 		</div>

    </section>

    <?php
    $cnt = 0;
    if ($view['file']['count']) {
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

    <?php if($cnt) { ?>
    <!-- 첨부파일 시작 { -->
    <section id="bo_v_file" style="display:none">
        <h2>첨부파일</h2>
        <ul>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
            <li>
                <i class="fa fa-download" aria-hidden="true"></i>
                <a href="<?php echo $view['file'][$i]['href'];  ?>" class="view_file_download">
                    <strong><?php echo $view['file'][$i]['source'] ?></strong>
                </a>
                <?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
                <span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드 | DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
            </li>
        <?php
            }
        }
         ?>
        </ul>
    </section>
    <!-- } 첨부파일 끝 -->
    <?php } ?>



    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top">
        <?php
        ob_start();
        ?>

        <ul class="bo_v_left">
            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01 btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 수정</a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01 btn" onclick="del(this.href); return false;"><i class="fa fa-trash-o" aria-hidden="true"></i> 삭제</a></li><?php } ?>
            <?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin btn" onclick="board_move(this.href); return false;"><i class="fa fa-files-o" aria-hidden="true"></i> 복사</a></li><?php } ?>
            <?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="btn_admin btn" onclick="board_move(this.href); return false;"><i class="fa fa-arrows" aria-hidden="true"></i> 이동</a></li><?php } ?>
        </ul>


        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
         ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->


</article>
<!-- } 게시판 읽기 끝 -->
<script>
// 제품 이미지 폴더 설정
let folderName = "../../img360/<?=$view['wr_8']?>";

<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });


});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->
