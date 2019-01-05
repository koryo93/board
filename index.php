<?php
include("./lib/db_connect.php");
$connect = dbconn();
$member = member($connect);
?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
    <title>TEST 홈페이지</title>
</head>
<body>
    <table border="0" width="100%" height="100%" align="center" cellspacing="0" cellpadding="0">
        <tr>
            <td width="100%" height="100%" align="center">
                <table border="0" width="100%" height="100%" align="center" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="100%" height="80" align="center" bgcolor="#764300">
                            <font color=""#FFFFFF"><strong>[홈페이지 상단입니다]</strong></font>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" height="50" align="right">
                            <?php
                                if( $member["user_id"] )
                                {
                                    echo $member["name"]."(".$member["user_id"].") 님 환영합니다.";
                                }
                                else
                                {
                            ?>
                            <a href="./member/join.php"><strong>[회원가입]</strong></a>
                            <a href="./member/login.php"><strong>[로그인]</strong></a>
                            <?php
                                }
                            ?>
                            &nbsp;
                            <?php
                                if( $member["user_id"] )
                            {
                            ?>
                            <a href="./member/logout.php"><strong>[로그아웃]</strong></a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" height="500" align="left" valign="top" bgcolor="#FFFFFFF">
                            &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="./board/bbs_1/list.php"><font color="#452403">[자유게시판]</font></a>
                        </td>
                        <td width="100%" height="100%" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
