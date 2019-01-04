<?php ob_start(); ?>
<html> 
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link type="text/css" href="../../lib/m_style.css" rel='stylesheet' />
<title>TEST 게시판 글보기</title>
<?php
include ("../../lib/db_connect.php");
$connect = dbconn();
$member = member();

if( !$member["user_id"])
    Error("로그인 후 이용해 주세요.");

$no = $_GET["no"];
$id = $_GET["id"];

$re_wt = $_GET["re_wt"];  //코멘트 답글입력란 생성  값이 (Y)면 .....
$lo_reply_1 = $_GET["lo_reply_1"]; //페이지 로케이션
$d_no = $_GET["d_no"]; //코멘트 순번.


$bbs1 = $no;

if( $no != $_COOKIE['hit_bbs1_'.$no] )
{
    $_query="UPDATE bbs1 SET hit=hit+1 WHERE no='$no'";
    mysqli_query($connect, $_query);
    setcookie("hit_bbs1_".$no, $no,time()+60*60*24,"/");
}
?>
</head>

<body>

<TABLE BORDER='0' CELLSPACING='0' CELLPADDING='0' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
<TR>
    <TD WIDTH='70%'  HEIGHT='100%'  ALIGN='LEFT'  VALIGN='MIDDLE' BGCOLOR='#ffffff'>
    <table border='0' width='90%' height='100%' bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0'>
    <tr>
        <td width='100%' height='70' align='center' valign='middle' bgcolor='D4D5D3'> 게시판 글 보기 </td>
    </tr>
<?php
$query = "SELECT * FROM bbs1 WHERE no='$no' AND id='$id' ";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
?>
    <tr>
        <td width='100%' height='10' align='center' valign='middle'> &nbsp; </td>
    </tr>

    <tr>
        <td width='100%' height='15' align='left' valign='middle'>
            <li> 이 름:<?=$data["name"]?> (<?=$data["user_id"]?>)  &nbsp;
            <?php
                if( $data["nick_name"] )
                {?>
                    닉네임: <?php echo $data["nick_name"];
                }?>
        </td>
    </tr>

    <tr>
        <td width='100%' height='25' align='left' valign='middle'> <li>글 제 목:<?=$data["subject"]?> </td>
    </tr>

    <tr>
        <td width='100%' height='300' align='left' valign='top' bgcolor='FFFFFF'>
            <hr size='0.1' width='98%' color='94A0FC' />
            <div align='center'>
            <?php
                if( $data["file01"] )
                {?>
                    <img src='./data/<?=$data["file01"]?>'>
                <?php
                }?>
            </div>
            <br>
            <?=$data["story"]?>
        </td>
    </tr>

    <tr>
        <td width='100%' height='10' align='center' valign='middle'> &nbsp; </td>
    </tr>

    <tr>
        <td width='100%' height='20' align='center' valign='middle' bgcolor='D4D5D3'>
        <a href="list.php">글목록</a> &nbsp; &nbsp;
        <a href="edit.php?no=<?=$data["no"]?>&id=<?=$data["id"]?>">글수정</a> &nbsp; &nbsp;
        <a href="del.php?no=<?=$data["no"]?>&id=<?=$data["id"]?>" onclick="return confirm('정말 삭제 하시겠습니까?');">삭 제</a>
        </td>
    </tr>

    <tr>
        <td width='100%' height='50' align='center' valign='middle'> &nbsp; </td>
    </tr>
    </table>
    </TD>

<TR>
    <TD WIDTH='100%'  HEIGHT='100%'  ALIGN='CENTER'  VALIGN='TOP'>
<!---/////////////////////////////[코 멘 트]//////////////////////////////////--->
    <table border='0'   width='100%' cellspacing='0' cellpadding='0'>
    <tr>
       <td width='854' align='center'><hr></td>
    </tr>

    <tr>
        <td width='854' align='center'>
        <!-------코맨트 출력---------->
        <table border='0'  width='800' cellspacing='0' cellpadding='0' id='lo_reply_1'>
        <?php
            $no = $data["no"];
            $q_count = "SELECT count(*) FROM bbs1_comment WHERE bbs1_no='$no'";
            $r_count = mysqli_query($connect, $q_count);
            $count = mysqli_fetch_array($r_count);
            $total_count = $count[0]; //코멘트 총개수
        ?>
        <tr>
            <td colspan='4' align='right'> <font color='9C9A9A'>TOTAL comment: <?=$total_count?></font></td>

        <?php
            $no = $data["no"];
            $q = "SELECT * FROM bbs1_comment WHERE bbs1_no='$no' and replys='0' ORDER BY regdate ASC, NO ASC";
            $r = mysqli_query($connect, $q);
            while( $d = mysqli_fetch_array( $r ) ){
        ?>

        <tr>
            <td width='50' align='center' valign='middle' rowspan='3' bgcolor='#E3E0E0'>
                <img src='./img/pv_x.gif' width='50' height='50'>
            </td>

            <td width='10' valign='middle' rowspan='3' bgcolor='#E3E0E0'>&nbsp;</td>
        </tr>

        <tr>
            <td width='674'  valign='middle' bgcolor='#E3E0E0'>
                <span style='font-size:9pt; font-family:Tahoma; color:#727371'>
                <?php
                if( $d["nick_name"]){
                    echo $d["nick_name"];
                }
                else
                {
                    echo $d["name"];
                }?>
            &nbsp;
                <?php
                    echo $d_Y= substr($d["regdate"],0,4)."-";
                    echo $d_m= substr($d["regdate"],4,2)."-";
                    echo $d_d= substr($d["regdate"],6,2)."&nbsp;";
                    echo $d_h= substr($d["regdate"],8,2).":";
                    echo $d_i= substr($d["regdate"],10,2);
                ?>
                </span>
            </td>

            <td width='120' align='right' valign='middle' bgcolor='#E3E0E0'>
                <?php
                if( $member["user_id"] )
                {?>
                    <a href='view.php?id=<?=$id?>&re_wt=Y&no=<?=$data["no"]?>&d_no=<?=$d["no"]?>&#lo_reply_2' onfocus="this.blur()">
                    <span style='font-size:9pt; font-family:Tahoma; color:#727371'>[답글달기]</span></a> &nbsp;
                <?php
                }?>
            </td>
        </tr>

        <tr>
            <td colspan='4' valign='top'bgcolor='#E3E0E0'>
		        <?php echo "<font color='#073C62'>".nl2br($d["memo"])."</font>";?>
		        <div align='right'>
		            <a href='./comment_del.php?d_no=<?=$d["no"]?>&no_s=<?=$data["no"]?>&bbs1_no=<?=$d["bbs1_no"]?>&replys_all=all' onfocus='this.blur()'>
		            <font color='#FF0000' onclick="return confirm('정말로 삭제 하시겠습니까?')">[DEL]</font></a>
		        </div>
		    </td>
        </tr>

        <?php
        ////////////// 코맨트 (답글-출력)/////////////
        $no = $data["no"];
        $dddd = $d["no"];
        $q_2 = "SELECT * FROM bbs1_comment WHERE bbs1_no='$no' AND replys='$dddd' ORDER BY regdate ASC";
        $r_2 = mysqli_query($connect, $q_2);
        while( $d_2=mysqli_fetch_array( $r_2 ) ){
        ?>
        <tr>
            <td  width='100%' height='5' valign='top' colspan='4'  >
            <table border='0' width='100%' height='5' valign='middle'>
            <tr>
                <td width='10'>&nbsp;</td>
                <td width='10' align='center'> <span style='font-size:11pt; color:#8A8A88'>└</span> </td>

                <td width='30' align='center'> <img src="./img/pv_x.gif" width='30' height='30'> </td>

                <td width='75%' align='left'>
                <span style='font-size:9pt; color:#8A8A88'>
                <?php
                if( $d_2["nick_name"])
                {
                    echo $d_2["nick_name"];
                }
                else
                {
                    echo $d_2["name"];
                }
                ?>
&nbsp; &nbsp; &nbsp; &nbsp;
                <?
                    echo $d_2_Y= substr($d_2["regdate"],0,4)."-";
                    echo $d_2_m= substr($d_2["regdate"],4,2)."-";
                    echo $d_2_d= substr($d_2["regdate"],6,2)."&nbsp;";
                    echo $d_2_h= substr($d_2["regdate"],8,2).":";
                    echo $d_2_i= substr($d_2["regdate"],10,2);
                ?>
                 <br>
                <?=$d_2["memo"]?></span>
                &nbsp;
		        <div align='right'>
                    <a href="comment_del.php?d_no=<?=$d_2["no"]?>&no_s=<?=$data["no"]?>&bbs1_no=<?=$d_2["bbs1_no"]?>&replys=<?=$d_2["replys"]?>&reply_rr=rr" onfocus="this.blur()" >
                    <span style='font-size:8pt; color:#5A5B5A' onclick="return confirm('정말로 삭제 하시겠습니까?')">[del]</span></a> &nbsp;
		        </div>
	
                </td>
            </tr>
            </table>
            </td>
<?php
}
//////////////  코맨트 (답글-출력) [끝]///////////// ?>



<? /// 코맨트 (답글-입력) ///
    if( $re_wt == 'Y' and $d_no == $d[no] )
    {
?>
        <form name='replys'  action='comment_write.php' method='post'>
            <input type=hidden name='id' value='<?=$data["id"]?>'>
            <input type=hidden name='bbs1_no' value='<?=$data["no"]?>' >
            <input type=hidden name='replys' value='<?=$d["no"]?>'>

        <tr>
            <td id='lo_reply_2' colspan='2' align='right'> <span style='font-size:11pt; color:#8A8A88'>└</span> </td>
            <td  align='center' valign='middle'> <textarea name='memo' style="width:90%; height:30px;"></textarea> </td>
            <td align='center' valign='middle'> <input type=submit value='submit' style="width:80px; height:20px;" /> </td>
        </form>
        </tr>
<?php
	}  
} /// 코맨트 (답글-입력) [끝] ///?>


        <tr>
         <td  width='100%' height='5' valign='top' colspan='4'>&nbsp;</td>
        </tr>
        </table>

<?php /////////// 코맨트 (입력) ////////////
if( $member["user_id"])
{  //회원아이디가 있으면 실행
?>
        <table border='0' width='800' cellspacing='0' cellpadding='0'>
        <tr>
            <td width='100%' height='30' colspan='5' align='center' valign='middle' bgcolor='#FFFFFF'>
                <hr size='0.1' width='95%' color='#B2B2B2' />
            </td>
        </tr>
	 
	    <tr>
            <form name='replys'  action='comment_write.php' method='post'>
                <input type=hidden name='bbs1_no' value='<?=$data[no]?>' title='게시판글 번호'>
                <input type=hidden name='replys' value='0'>
                <input type=hidden name='id' value='<?=$data[id]?>'>

            <td width=120 align='center' valign='middle' bgcolor='#E7CADE'>
                <?php
                if( $member["nick_name"])
                {
                     echo $member["nick_name"];
                }else
                {
                    echo $member["name"];
                }
                ?>
            </td>

            <td width='20' align='left' bgcolor='#FFD2F1'>&nbsp;</td>


            <td width='100' align='right' bgcolor='#FFD2F1'>Comment &nbsp;</td>

            <td align='left' bgcolor='#FFD2F1'>
                <textarea name='memo' cols=80 rows=3 style='width=100%'></textarea>
            </td>
	   
	   
	        <td width=30><input type=submit value='O K'></td>
	   </tr>
	   </form>
        </table>
	<?} //회원아이디가 있으면 여기까지?>
 <!---//////////코맨트 (입력) [끝] //////////--->

    </td>
    </tr>
    </table>
<!---/////////////////////////////[코 멘 트 ((끝))]//////////////////////////////////--->

</TD>
</TR>
</TABLE>

</body>
</html>
