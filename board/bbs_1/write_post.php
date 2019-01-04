<?php
header("content-type:text/html; charset=UTF-8");

$id = $_POST["id"];
$user_id = $_POST["user_id"];
$name = $_POST["name"];
$pw = $_POST["pw"];
$memo = $_POST["memo"];
 
$regdate = date("YmdHis", time()); //날짜 , 시간
$ip = getenv("REMOTE_ADDR"); //ip

$connect = mysqli_connect("localhost","root","88deluxe", "board"); //mysql 연결
if( !$connect )
{
 echo "연결에 실패 하였습니다.".mysqli_error();
}

//쿼리전송
$query = "INSERT INTO 
            bbs_1(id, user_id, name, pw, memo, regdate, ip) 
          VALUES('$id','$user_id','$name','$pw','$memo','$regdate','$ip')";
mysqli_query($connect, $query);

mysqli_close($connect); //끝내기.
?>

<script>
    window. alert('쿼리가 정상적으로 전송 되었습니다.');
    location.href='./list.php';
</script>