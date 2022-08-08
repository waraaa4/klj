<meta charset="utf-8">
<?php
if(isset($_POST['email'])) {
     
    
	$email_to = "warcjh00@naver.com";
	$email_subject = "프리드라이프 상담신청 입니다.";
	$email_subject = '=?UTF-8?B?'.base64_encode($email_subject).'?=';

     
     
    function died($error) {
      // your error code can go here
      echo "<script> alert('견적신청이 실패하였습니다.');";
      echo "history.go(-1);";
      echo "</script>";
      die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
    
     
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
	// 여기부터 여분내용작업
	// $category = $_POST['category'];
	// $etc1 = $_POST['etc1'];
	// $etc2 = $_POST['etc2'];
	// $etc3 = $_POST['etc3'];
	// $etc4 = $_POST['etc4'];
	/*$etc5 = $_POST['etc5'];
	$etc6 = $_POST['etc6'];
	$etc7 = $_POST['etc7'];
	$etc8 = $_POST['etc8'];
	$etc9 = $_POST['etc9'];*/
     
    // $error_message = "";
    // $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/';
  // if(!preg_match($email_exp,$email_from)) {
  //   $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  // }
    
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    // $email_message = "";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

	$email_message .= "고객사명 : ".clean_string($name)."<br>";
  $email_message .= "연락처 : ".clean_string($telephone)."<br>";
  $email_message .= "통화가능시간/궁금한 사항 : ".clean_string($comments)."";
  $email_message .= "".clean_string($email_from)."";


// create email headers
$headers = "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= 'From: '.$email_from."\r\n";
// 제목이 깨질경우 아래 캐릭터셋 적용

@mail($email_to, $email_subject, $email_message, $headers, $mailbody);  
?>
 
<!-- include your own success html here -->
 
<script>
alert ("문의주셔서 감사합니다.\n빠른 시일안에 답변드리겠습니다.");
window.location = document.referrer;
</script>
 
<?php
}
?>