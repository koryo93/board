<?header("content-type:text/html; charset=UTF-8");

/**************************************************************
***************************************************************
PHP Script Produced by: 박정원 PJW(Jimmy)  
Email: pjws0321@naver.com / pjws0321@gmail.com 
The purpose of the product : Educational (교육용)
Notice: 본 스크립트는 교육용도로 만들어 졌습니다. 
Blog  http://blog.naver.com/pjws0321
****************************************************************
***************************************************************/

 $id= $_POST[id];
 $user_id=$_POST[user_id];
 $name=$_POST[name];
 $pw=$_POST[pw];
 $memo=$_POST[memo];
 
 $regdate=date("YmdHis", time()); //날짜 , 시간
 $ip=getenv("REMOTE_ADDR"); //ip

 $connect= mysql_connect("localhost","jungwon","jw12345"); //mysql 연결
 mysql_select_db("jungwon",$connect); //DB선택
 if(!$connect){
	 echo "연결에 실패 하였습니다.".mysql_error();
 }


//쿼리전송
$query="insert into bbs_1(id, user_id, name, pw, memo, regdate, ip) 
                   values('$id','$user_id','$name','$pw','$memo','$regdate','$ip')";
mysql_query("set names utf8", $connect);
mysql_query($query, $connect);

mysql_close; //끝내기.
?>

<script>
window. alert('쿼리가 정상적으로 전송 되었습니다.');
location.href='./list.php';
</script>