<?php
header("content-type:text/html; charset=UTF-8");

include("../../lib/db_connect.php");
$connect = dbconn(); //DB컨넥트
$member = member($connect); //회원정보

if( !$member["user_id"])
    Error("로그인 후 이용해 주세요.");

$no = $_GET["no"];
$id = $_GET["id"];

$user_id = $member["user_id"];
$query = "SELECT * FROM bbs1 WHERE no='$no' AND user_id='$user_id'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

if( $data["file01"] )
{
    $del_file = './data/'.$data["file01"];
    if( $data["file01"] && is_file($del_file) )
        unlink($del_file);
}

$user_id = $member["user_id"];
$query = "DELETE FROM bbs1 WHERE no='$no' AND id='$id' AND user_id='$user_id' ";
mysqli_query($connect, $query);
?>

<script>
    window.alert('삭제 되었습니다.');
    location.href='./list.php';
</script>