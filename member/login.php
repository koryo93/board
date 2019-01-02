<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title>로그인 페이지</title>
</head>

<body>
<table border='0' width='600' height='100%' align='center' cellspacing='0' cellpadding='0' bgcolor='#EEEEEE'>
    <form action='./login_post.php' name='login' method='POST'>
    <tr>
        <td width='100%' height='80' align='center' colspan="2">로그인</td>
    </tr>
    <tr>
        <td width='50px' align='left'>아이디</td>
        <td><input type='text' name='user_id' size='10'></td>
    </tr>
    <tr>
        <td>비밀번호</td>
        <td><input type='password' name='pw' size='15'></td>
    </tr>
    <tr>
        <td width='100%' height="30" align='center' colspan="2">
            <input type='submit' value='전송'>
        </td>
    </tr>
    <tr>
        <td width='100%' height='100%' align='center' colspan="2">&nbsp;</td>
    </tr>
</form>
</table>

</body>
</html>