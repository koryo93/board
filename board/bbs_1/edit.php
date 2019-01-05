<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link type="text/css" href="../../lib/m_style.css" rel='stylesheet' />
<title>게시판 글수정</title>
<?php
include ("../../lib/db_connect.php");
$connect = dbconn();
$member = member($connect);

if( !$member["user_id"] )
    Error("로그인 후 이용해 주세요.");
?>

<style>
#cancel
{
    margin-top:0pt;
	text-align:center;
}

#cancel div
{
    margin-top:2pt;
	text-align:center;
    width:70pt; height:20pt;
}
</style>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    //<![CDATA[
    function LoadPage()
    {
        CKEDITOR.replace('ir1');
    }
    function FormSubmit(f)
    {
        CKEDITOR.instances.ir1.updateElement();
        if(f.ir1.value == "")
        {
            alert("내용을 입력해 주세요.");
            return false;
        }
        alert(f.ir1.value);

        // 전송은 하지 않습니다.
        return false;
    }
    //]]>
</script>
</head>

<body onLoad="LoadPage();">

<TABLE BORDER='0' CELLSPACING='0' CELLPADDING='0' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
<TR>
    <TD WIDTH='70%'  HEIGHT='100%'  ALIGN='LEFT'  VALIGN='MIDDLE' BGCOLOR='#ffffff'>
    <table border='0' width='90%' height='100%' bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0'>
    <tr>
        <td width='100%' height='70' colspan='2' align='center' valign='middle' bgcolor='#C3C3C3'> 게시판 글 수정 </td>
    </tr>

    <tr>
        <td width='100%' height='10' colspan='2' align='center' valign='middle'></td>
    </tr>
<?php
$no = $_GET["no"];
$id = $_GET["id"];

$query = "SELECT * FROM bbs1 WHERE no='$no' AND id='$id'";

$result = mysqli_query($connect, $query);
$data = mysqli_fetch_array($result);
?>
    <tr>
    <form name='edit' action='edit_post.php' method='post' enctype='multipart/form-data'>
        <input type='hidden' name='id' value='<?=$data["id"]?>'>
        <input type='hidden' name='no' value='<?=$data["no"]?>'>
        <td width='100%' height='15' colspan='2' align='left' valign='middle'>
            <li> 이 름:<?=$data["name"]?> (<?=$data["user_id"]?>)  &nbsp;
            <?php
                if( $data["nick_name"] )
                {
                ?>
                    닉네임:<?php echo $data["nick_name"];
                }
                ?>
        </td>
    </tr>

    <tr>
        <td width='100%' height='25' colspan='2' align='left' valign='middle'>
            <li>글 제 목 <input type='text' name='subject' value="<?=$data["subject"]?>" style="width:60%; height:25px;">
        </td>
    </tr>

    <tr>
        <td width='100%' height='300' colspan='2' align='center' valign='middle' bgcolor='FFFFFF'>
            <textarea id='ir1'  name='story' style="width:95%; height:300px;"><?=nl2br($data["story"])?></textarea>
        </td>

    <tr>
        <td width='100' height='10' colspan='2' bgcolor='FFFFFF'>&nbsp;</td>
    </tr>

    <tr>
        <td width='100%' height='30' colspan='2' align='left' valign='middle' bgcolor='FFFFFF'>
        <?php
            if( $data["file01"])
                {
                ?>
            <li>파일: <?php echo "<font color='3F6FF8'>". $data["file01"]."</font>";
                ?>
        &nbsp;
            <a href='#' onclick="window.open('./file_del.php?no=<?=$no?>','open','width=450,height=150,top=50,left=5,scrollbars=no, resizable=no')">
            <font color='FF0000'>[삭제]</font></a>
        <?php
        }
        ?>
         파일: <input type='file' name='file01'>
        </td>
    </tr>

    <tr>
        <td width='50%' height='20' align='right' valign='middle' bgcolor='D4D5D3'>
            <input type='submit' value="완료" onclick='submitContents()'>&nbsp; &nbsp;
        </td>

        <td width='50%' height='20' align='left' valign='middle' bgcolor='D4D5D3' id='cancel'>
            <div><input type='button' onclick='history.back(-1)' value='취소'></div>
        </td>
    </tr>

    <tr>
        <td width='100%' height='100%' colspan='2' align='center' valign='middle'>&nbsp;</td>
    </tr>

    </form>
    </table>
    </TD>

<TR>
    <TD WIDTH='100%'  HEIGHT='100%' colspan='2' ALIGN='CENTER'  VALIGN='TOP'>&nbsp;</TD>
</TR>
</TABLE>

</body>
</html>