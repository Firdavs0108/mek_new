<meta charset="utf-8">
<?php
include_once('./_common.php');

if(isset($_POST['email'])) {

  // 파일 업로드 처리
  $file = $_FILES['attachment'];
  $tmpName = $file['tmp_name'];
  $filename = basename($file['name']);
  $target_dir = G5_DATA_PATH . "/mail/"; // 파일 업로드 디렉토리
  $target_file = $target_dir . $filename; // 업로드할 파일 경로

  // Rename file if it already exists
  $i = 1;
  while (file_exists($target_file)) {
      $filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . $i . '.' . pathinfo($filename, PATHINFO_EXTENSION);
      $target_file = $target_dir . $filename;
      $i++;
  }

  // 디렉토리 생성
  if (!is_dir($target_dir)) {
    @mkdir($target_dir, 0707);
    @chmod($target_dir, 0707);
  }

  move_uploaded_file($tmpName, $target_file);

  function died($error) {
   // your error code can go here
   echo "<script> alert('메일전송이 실패하였습니다.');";
   echo "history.go(-1);";
   echo "</script>";
   die();
  }

  function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }

  if(!isset($_POST['title']) ||
      !isset($_POST['group']) || //다중체크
      !isset($_POST['name']) ||
      !isset($_POST['email']) ||
      !isset($_POST['phone']) ||
      !isset($_POST['cell']) ||
      !isset($_POST['company']) ||
      !isset($_POST['date']) ||
      !isset($_POST['process']) ||
      !isset($_POST['thickness']) ||
      !isset($_POST['width']) ||
      !isset($_POST['comments']) ||
      !isset($_POST['agree'])) {
      died('죄송합니다.\n제출하신 양식에  문제가 있습니다.\n양식을 다시 확인해주세요.');
  }

  $title = $_POST['title']; // required
  $group = $_POST['group']; //다중체크
  echo $group[0];
  echo $group[1];
  $group = implode(', ', $_POST['group']); // ,로 결합.
  $name = $_POST['name']; // required
  $email_from = $_POST['email']; // required
  $phone = $_POST['phone'];
  $cell = $_POST['cell']; // required
  $company = $_POST['company']; // required
  $date = $_POST['date'];
  $process = $_POST['process'];
  $thickness = $_POST['thickness'];
  $width = $_POST['width'];
  $comments = $_POST['comments']; // required
  // $file_name = $file['name'];
  $file_url = G5_DATA_URL . "/mail/" . $filename; // 파일 경로

  $email_to = "sy@designtalktalk.com";

  $email_subject = "[A/S 문의]"."[$company]".$title;
  $email_subject = '=?UTF-8?B?'.base64_encode($email_subject).'?=';

  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  $email_message .= "문의 설비 : ".clean_string($group)."<br><br>"; //다중체크
  $email_message .= "이름 : ".clean_string($name)."<br><br>";
  $email_message .= "이메일 : ".clean_string($email_from)."<br><br>";
	$email_message .= "전화번호(유선) : ".clean_string($phone)."<br><br>";
  $email_message .= "핸드폰 : ".clean_string($cell)."<br><br>";
  $email_message .= "회사명 : ".clean_string($company)."<br><br>";
  $email_message .= "구매시기 : ".clean_string($date)."<br><br>";
  $email_message .= "적용 공정 : ".clean_string($process)."<br><br>";
  $email_message .= "측정 두께 : ".clean_string($thickness)."<br><br>";
  $email_message .= "측정 폭 :  ".clean_string($width)."<br><br>";
  $email_message .= "내용 : ".clean_string(nl2br($comments))."<br><br>";

  if(!empty($filename) && file_exists($target_file)) {
      $email_message .= "첨부파일 : <a target='_blank' href='" . $file_url . "' download>".$filename."</a><br><br>";
  } else {
      $email_message .= "첨부파일 : 없음<br><br>";
  }

// create email headers
$headers = 'From: '.$email_from."\r\n";
$headers .= 'Reply-to: '.$email_from."\r\n";
$headers .= 'Content-type: text/html'."\r\n";
// $headers .= 'Content-Disposition: attachment';
// $headers .= 'filename="example.txt"';

// 제목이 깨질경우 아래 캐릭터셋 적용

@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- include your own success html here -->

<script>
alert ("문의주셔서 감사합니다.\n빠른 시일안에 답변드리겠습니다.");
location.href='/home/sub04_03.php';
</script>

<?php
}
?>
