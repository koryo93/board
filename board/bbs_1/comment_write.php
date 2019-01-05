<?php
header('content-type:text/html; charset=UTF-8');

$user_id = $_SESSION['user_id'];

$id = $_POST["id"];
$bbs1_no = $_POST["bbs1_no"]; //게시글 번호
$replys = $_POST["replys"];   // 코멘트 달글 번호
$memo = $_POST["memo"]; //코멘트 내용

include ('../../lib/db_connect.php');
$connect = dbconn(); //DB컨넥트
$member = member($connect); //회원정보

//aprintf($_POST);

if( !$member["user_id"] )
    Error('로그인 후 이용하세요.');
if( !$memo )
    Error('내용을 입력 하세요.');
if( !$bbs1_no )
    Error('접근이 잘못되었습니다.');

$regdate = date("YmdHis", time()); //날짜/시간

$user_id = $member["user_id"];
$name = $member["name"];
$nick_name = $member["nick_name"];

$query = "INSERT INTO 
            bbs1_comment (id, bbs1_no, user_id, name, nick_name, memo, replys, regdate)
          VALUES 
            ('$id', '$bbs1_no', '$user_id', '$name', '$nick_name', '$memo', '$replys', '$regdate')";

//aprintf($query);
//aprintf($connect);

mysqli_query($connect, $query);

$query="UPDATE bbs1 SET comment=comment+1 WHERE no='$bbs1_no'";
mysqli_query($connect, $query);
?>

<script>
    window.alert("댓글이 등록 되었습니다.");
    location.href='view.php?no=<?=$bbs1_no?>&id=<?=$id?>&lo_reply_1=#lo_reply_1';
</script>