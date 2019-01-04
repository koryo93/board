<?php
header("content-type:text/html; charset=UTF-8");
 
$user_id = $_SESSION['user_id'];

$no_s = $_GET["no_s"]; //게시글 번호(1)
$bbs1_no = $_GET["bbs1_no"]; //게시글 번호(2)

$d_no = $_GET["d_no"]; //코멘트 순번
$replys = $_GET["replys"]; //코멘트 답글번호
$replys_all = $_GET["replys_all"]; //코멘트 삭제
$reply_rr = $_GET["reply_rr"]; //코멘트의 답글 삭제

include('../../lib/db_connect.php');
$connect = dbconn(); //DB컨넥트
$member = member(); //회원정보

$user_id = $member["user_id"];
$query = "SELECT * FROM bbs1_comment WHERE user_id='$user_id' AND no='$d_no'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

if( $member["user_id"] != $data["user_id"] )
    Error('자신의 글만 삭제 가능 합니다.');
if( !$no_s )
    Error('해당 게시물이 없습니다.');

$q_count = "SELECT count(*) FROM bbs1_comment WHERE bbs1_no='$bbs1_no' and replys='$d_no' ";
$r_count = mysqli_query($connect, $q_count);
$count = mysqli_fetch_array($r_count);
$total_comment = $count[0] + 1;


if($replys_all=='all')
{  //코멘트와 답글 삭제 하기
    $query_1 ="DELETE FROM bbs1_comment WHERE bbs1_no='$no_s' AND no='$d_no' ";
    $result_1 = mysqli_query($connect, $query_1);

    $query_2 = "DELETE FROM bbs1_comment WHERE bbs1_no='$no_s' AND replys='$d_no'";
    $result_2 = mysqli_query($connect, $query_2);

    $query = "UPDATE bbs1 SET comment=comment-$total_comment WHERE no='$bbs1_no'";
    $result=mysqli_query($connect, $query);
}

if($reply_rr=='rr')
{ //답글만 삭제 인 경우
    $query_1 = "DELETE FROM bbs1_comment WHERE no='$d_no' AND bbs1_no='$bbs1_no' AND replys='$replys' ";
    $result_1 = mysqli_query($connect, $query_1);

    $query = "UPDATE bbs1 SET comment=comment-1 WHERE no='$bbs1_no' ";
    $result = mysqli_query($connect, $query);
}
?>



<script>
    window.alert("댓글이 삭제 되었습니다.");
    location.href='view.php?no=<?=$bbs1_no?>&id=<?=$data["id"]?>&lo_reply_1=#lo_reply_1';
</script>