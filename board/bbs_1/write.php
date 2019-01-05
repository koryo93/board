<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link type="text/css" href="../lib/m_style.css" rel='stylesheet' />
<title>TEST 게시판 글쓰기</title>
<?php
include ("../../lib/db_connect.php");
$connect = dbconn();
$member = member($connect);

if( !$member["user_id"] )
    Error("로그인 후 이용해 주세요");
?>
<script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    //<![CDATA[
    function LoadPage()
    {
        CKEDITOR.replace('story');
    }
    function FormSubmit(f)
    {
        CKEDITOR.instances.story.updateElement();
        if(f.story.value == "")
        {
            alert("내용을 입력해 주세요.");
            return false;
        }
        alert(f.story.value);

        // 전송은 하지 않습니다.
        return false;
    }
    //]]>
</script>
</head>

<body onLoad="LoadPage();">

<TABLE BORDER='0' CELLSPACING='0' CELLPADDING='0' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
<TR>
    <TD WIDTH='100%'  HEIGHT='70'  ALIGN='LEFT'  VALIGN='MIDDLE' BGCOLOR='#E89C05'>
        <table border='0' width='90%' height='70' bgcolor='#E89C05' align='center' cellspacing='0' cellpadding='0'>
        <tr>
            <td width='100%' height='70' align='left' valign='middle'>
                <a href='../../index.php'><strong>[홈]</strong></a>

            </td>
        </tr>
        </table>
    </TD>
</TR>
<TR>
    <TD WIDTH='100%'  HEIGHT='100%'  ALIGN='CENTER'  VALIGN='TOP'>
        <table border='0' width='75%' height='100%' bgcolor='FFFFF' align='center' cellspacing='0' cellpadding='0'>
        <form name='write' action='write_post.php' method='post' enctype="multipart/form-data">
            <input type='hidden' name='id' value='bbs1'>
        <tr>
            <td width='100%' height='10' colspan='2' bgcolor='FFFFF'>&nbsp;</td>
        </tr>
        <tr>
            <td width='100%' height='30' colspan='2' bgcolor='FFFFF' align='center'> - 자유게시판 글쓰기 -</td>
        </tr>



        <tr>
        <td width='20%' height='30'  align='right' valign='middle'><li>아이디</td>
        <td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
            <input type='text' name='user_id' size='15' value='<?=$member["user_id"]?>' readonly='readonly'>
        </td>

        <tr>
        <td width='20%' height='30'  align='right' valign='middle'> <li>이름 </td>
        <td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
            <input type='text' name='name' size='15' value='<?=$member["name"]?>' readonly='readonly'>
            닉네임:<input type='text' name='nick_name' size='15' value='<?=$member["nick_name"]?>' readonly='readonly'>
        </td>

        <tr>
            <td width='20%' height='30'  align='right' valign='middle'> <li>제목</td>
            <td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
        &nbsp;      <input type='text' name='subject' style="width:500px; height:30px;">
            </td>
        </tr>

        <tr>
            <td width='100%' height='420'  align='center' valign='middle' colspan='2'>
                <textarea   name='story' style="width:80%; height:400px;"></textarea>
            </td>
        </tr>

        <tr>
            <td width='100%' height='30'  align='center' valign='middle' colspan='2'>
                <input type="file" name="file01">
            </td>
        </tr>

        <tr>
            <td width='100%' height='30' bgcolor='#EDEDED' colspan='2' align='center' valign='middle'>
                <input type='Submit' value='전송' onClick="submitContents()">
            </td>
        </tr>

        <tr>
            <td width='100%' height='100%' colspan='2'  bgcolor='FFFFF'>&nbsp;</td>
        </tr>
        </form>
        </table>
    </TD>
</TR>

<TR>
    <TD WIDTH='100%'  HEIGHT='100%'  ALIGN='CENTER'  VALIGN='TOP'>&nbsp;</TD>
</TR>
</TABLE>

</body>
</html>