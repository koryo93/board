<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <!--다국어 언어: UTF-8-->
<title>회원가입</title>
</head>

<body>
<TABLE BORDER='1' CELLSPACING='0' CELLPADDING='0' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' VALIGN='TOP'>
    <TR>
        <TD WIDTH='100%'  HEIGHT='70'  ALIGN='LEFT'  VALIGN='MIDDLE' BGCOLOR='#E89C05'>
            <a href='../index.php'><strong>[홈]</strong></a>
        </TD>

    </TR>
    <TR>
        <TD WIDTH='100%'  HEIGHT='100%'  ALIGN='CENTER'  VALIGN='TOP'>
            <table border='1' width='750' height='100%' bgcolor='FFFFFF' align='center' cellspacing='0' cellpadding='0'>
            <form action='join_post.php' name='member' method='post'>
                <tr>
                    <td colspan="2" width='100%' height='30' bgcolor='EEEEEE' align='center' valign='top'>
                        <strong>[ 회 원 가 입  ]</strong>
                        <input type='hidden' name='id' value='test'>
                    </td>
                </tr>
                <tr>
                    <td> 회원아이디 </td>
                    <td><input type="text" name="user_id" size="10"></td>
                </tr>
                <tr>
                    <td> 이름 </td>
                    <td><input type="text" name="name" size="10"></td>
                </tr>
                <tr>
                    <td> 닉네임 </td>
                    <td><input type="text" name="nick_name" size="10"></td>
                </tr>
                <tr>
                    <td> 생년월일</td>
                    <td><input type="text" name="birth" size="10"></td>
                </tr>
                <tr>
                    <td> 성별</td>
                    <td>
                        <input type="radio" name="sex" value="male">남자
                        <input type="radio" name="sex" value="female">여자
                    </td>
                </tr>
                <tr>
                    <td> 연락처</td>
                    <td><input type="text" name="tel" size="10"></td>
                </tr>
                <tr>
                    <td> 이메일</td>
                    <td><input type="text" name="email" size="10"></td>
                <tr>
                    <td> 비밀번호</td>
                    <td><input type="password" name="pw" size="10"></td>
                </tr>
                <tr>
                    <td> 주소</td>
                    <td><input type="text" name="addr_1" size="15"></td>
                </tr>
                </tr>
                <tr>
                    <td> 상세주소</td>
                    <td><input type="text" name="addr_2" size="15"></td>
                </tr>
                <tr>
                    <td colspan="2"> <input type='submit' value='가입하기'> </td>
                </tr>
            </form>
            </table>
         </td>
    </TR>
</TABLE>

</body>
</html>