<?php
header("content-type:text/html; charset=UTF-8");

include('../../lib/db_connect.php');
$connect = dbconn(); //DB컨넥트
$member = member($connect); //회원정보

if( !$member["user_id"])
    Error('로그인 후 이용해 주세요.');

$no = $_GET["no"];
$user_id = $member["user_id"];
$query ="SELECT * FROM bbs1 WHERE no='$no' AND user_id='$user_id' ";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);

if( !$result )
    die("연결에 실패 하였습니다.".mysqli_error());

if( $data["file01"] )
{
    $user_id = $data["user_id"];

    $qy = "UPDATE bbs1 SET  file01='' WHERE no='$no' AND user_id='$user_id'";
    mysqli_query($connect, $qy);

    $del_file= "./data/".$data["file01"];
    if( $data["file01"] && is_file($del_file) )
        unlink($del_file);
}

mysqli_close($connect);
?>

<script language="JavaScript">
    alert('파일이 삭제 되었습니다.');
    opener.location.reload();
    window.close();
</script>