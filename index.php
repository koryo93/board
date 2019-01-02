<?php
include("./lib/db_connect.php");
$connect = dbconn();
$member = member();
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
                <table border="1" width="100%" height="100%" align="center" cellspacing="0" cellpadding="0">
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
                        </td>
                        <tr>
                            <td width="100%" height="30" align="center" bgcolor="#EDEDED">My SQL 데이터 생성</td>
                            <tr>
                                <td width="100%" height="200" align="left" valign="top" bgcolor="#FFFFFF">
                                    <form action="./test2.php" name="test" method="POST">
                                        <input type="hidden" name="id" value="test">
                                        <li>아이디: <input type="text" name="user_id" size="10"></li>
                                        <li>이름: <input type="text" name="name" size="10"></li>
                                        <li>비밀번호: <input type="password" name="pw" size="10"></li>
                                        <li>메모:
                                            <textarea name="memo" cols="100" rows="5"></textarea>
                                        </li>
                                        <br/><br/>
                                        <input type="submit" value="전 송">
                                    </form>
                                </td>
                        <?php
                        $link = dbconn();

                        // 쿼리문으로 데이터를 불러오기
                        $sql = "SELECT * FROM bbs_1";
                        $result = mysqli_query($link, $sql);
                        while( $data = mysqli_fetch_array($result) )
                        {
                            $date_Y = substr($data["regdate"], 0, 4);   // 년도
                            $date_m = substr($data["regdate"], 4, 2);   // 월
                            $date_d = substr($data["regdate"], 6, 2);   // 일
                            $date_h = substr($data["regdate"], 8, 2);   // 시간
                            $date_i = substr($data["regdate"], 10, 2);   // 분

                            echo $date_Y;

                        ?>
                            </tr>
                        </tr>
                        <tr>
                            <td width="30" align="left" valign="top" bgcolor="#FFFFFF">
                                - 이름: <?php echo $data["name"]; ?>
                                - 아이디: <?php echo $data["user_id"]; ?>
                                - 메모: <?php echo $data["memo"]; ?>
                            </td>
                        </tr>
                    <?php  }
                        mysqli_close($link);
                    ?>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
