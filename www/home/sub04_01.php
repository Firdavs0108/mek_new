<?php
include_once('./_common.php');

$menuCodeParent = 3;
$menuCodeChild = 0;
include_once(G5_PATH.'/head.php');
?>
<div id="sub_wrap" class="sub04_01">
  <section class="sub-section section01 sub-container" data-aos="fade-up"  data-aos-duration="2000">


    <div class="send_box02">
      <fieldset>
        <form name="contactform" method="post" action="/home/sub04_01_send.php" enctype="multipart/form-data" class="fields">
          <ul>
            <!-- <h4>기본정보</h4> -->
            <li>
              <label for="title" class="lbl required">제목</label>
              <div class="desc">
                <input name="title" type="text" class="input full" id="title" maxlength="50" required placeholder="제목을 입력하세요">
              </div>
            </li>
            <li id="equipment_area">
              <span id="equipment" class="lbl required">문의설비</span>
              <div class="desc flex ">
                <input name="group[]" type="checkbox" id="webcleaner" class="input full check" value="웹크리너">웹크리너
                <input name="group[]" type="checkbox" id="inspector" class="input full check" value="이물검사기">이물검사기
                <input name="group[]" type="checkbox" id="pinning" class="input full check"  value="피닝시스템">피닝시스템
                <input name="group[]" type="checkbox" id="etc_chk" class="input full check"  value="기타(직접입력)">기타 (직접입력)
                <input name="group[]" type="text" class="input full" id="etc_txt" maxlength="80">
              </div>
            </li>
            <li>
              <label for="name" class="lbl required">성명(담당자명)</label>
              <div class="desc">
                <input name="name" type="text" class="input full" id="name" maxlength="50" required  placeholder="이름을 입력하세요">
              </div>
            </li>
            <li>
            <label for="email" class="lbl required">이메일</label>
            <div class="desc">
              <input name="email" type="email" class="input full" id="email" maxlength="80" required placeholder="E-mail을 입력하세요">
            </div>
          </li>
          <li>
            <label for="phone" class="lbl">전화번호(유선)</label>
            <div class="desc">
            <input name="phone" type="tel" class="input full" id="phone" maxlength="30" placeholder="전화번호를 입력하세요">
            </div>
          </li>
          <li>
            <label for="cell" class="lbl required">핸드폰</label>
            <div class="desc">
              <input name="cell" type="tel" class="input full" id="cell" maxlength="80" required placeholder="핸드폰번호를 입력하세요">
            </div>
          </li>
            <li>
              <label for="component" class="lbl">제품 성분</label>
              <div class="desc">
                <input name="component" type="text" class="input full" id="component" maxlength="80" placeholder="ex. PET, PVC">
              </div>
            </li>
            <li>
              <label for="color" class="lbl">색상 및 투명도</label>
              <div class="desc">
                <input name="color" type="text" class="input full" id="color" maxlength="80">
              </div>
            </li>
            <li>
              <label for="area" class="lbl">적용 면</label>
              <div class="desc">
                <input name="area" type="text" class="input full" id="area" maxlength="80" placeholder="단면/양면">
              </div>
            </li>
              <li>
                <label for="thickness" class="lbl">두께</label>
                <div class="desc">
                  <input name="thickness" type="text" class="input full" id="thickness" maxlength="80" >
                </div>
              </li>
              <li>
                <label for="width" class="lbl">폭</label>
                <div class="desc">
                  <input name="width" type="text" class="input full" id="width" maxlength="80" >
                </div>
              </li>
              <li>
                <label for="lineSpeed" class="lbl">라인 속도</label>
                <div class="desc">
                  <input name="lineSpeed" type="text" class="input full" id="lineSpeed" maxlength="80" >
                </div>
              </li>
              <li>
                <label for="requests" class="lbl">요구 제거 & 검출 대상</label>
                <div class="desc">
                  <input name="requests" type="text" class="input full" id="requests" maxlength="80" placeholder="ex. 실리카, 머리카락">
                </div>
              </li>

            <!-- <h4>상담 내용</h4> -->
            <li>
              <label for="comments" class="lbl">내용</label>
              <div class="desc">
              <textarea type="text" class="input full" name="comments" id="comments" rows="10" cols="80" placeholder="문의 내용을 입력하세요"></textarea>
              </div>
            </li>
            <li>
              <label for="file" class="lbl">첨부파일</label>
              <div class="desc">
                <input type="file" name="attachment" style="border: 0; padding:0; ">
              </div>
            </li>
            <li>
              <label for="agree" class="lbl">개인정보 수집·이용</label>
              <div class="desc">
                <textarea readonly style="height:100px;border:1px solid #ddd;" class="input full" ><?php echo get_text($config['cf_privacy']) ?></textarea>
                <input type="checkbox" name="agree" required class="required">
                <label for="agree-check"></label> <span>위의 '개인정보 수집·이용'에 동의 합니다.<span>
              </div>
            </li>
          </ul>
          <div class="btn-group">
            <p><span>*</span> 표시가 있는 항목은 반드시 입력해야 합니다. 문의내용을 확인하는 대로 연락드리겠습니다.</p>
            <button type="submit" class="btn-submit">확인</button>
           </div>
        </form>
      </fieldset>
    </div>
  </div>

  </section>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const contactForm = document.forms["contactform"];
    const equipmentArea = document.getElementById("equipment_area");
    const etcChk = document.getElementById("etc_chk");
    const etcTxt = document.getElementById("etc_txt");
    const equipmentMessageSpan = document.createElement("span");
    equipmentMessageSpan.id = "equipmentMessage";
    equipmentMessageSpan.style.color = "red";
    equipment.appendChild(equipmentMessageSpan);

    // Initially disable the text field
    etcTxt.disabled = true;

    // Event listener for checkbox
    etcChk.addEventListener("change", function() {
        if (this.checked) {
            etcTxt.disabled = false;  // Enable the text field
        } else {
            etcTxt.disabled = true;   // Disable the text field
            etcTxt.value = "";        // Clear the text field value
        }
    });

    // Check if any checkbox inside equipment_area is checked
    function isAnyCheckboxChecked() {
        const checkboxes = equipmentArea.querySelectorAll("input[type='checkbox']");
        for (let checkbox of checkboxes) {
            if (checkbox.checked) {
                return true;
            }
        }
        return false;
    }

    contactForm.addEventListener("submit", function(e) {
        if (!isAnyCheckboxChecked()) {
            e.preventDefault();  // Stop form from submitting
            equipmentArea.scrollIntoView();  // Scroll to equipment_area
            equipmentMessageSpan.innerHTML = "<br>*문의설비를 체크하세요.";  // Show the error message
        } else {
            equipmentMessageSpan.innerHTML = "";  // Remove the error message if any checkbox is checked
        }
    });
});
</script>

<?php
include_once(G5_PATH.'/tail.php');
?>
