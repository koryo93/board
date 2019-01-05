<?php
/**
 * Created by PhpStorm.
 * User: gre327
 * Date: 2019-01-02
 * Time: 오후 4:38
 */

function dbconn()
{
    $host_name = "localhost";
    $db_user_id = "root";
    $db_passwd = "88deluxe";
    $db_name = "board";
    $link = mysqli_connect($host_name, $db_user_id, $db_passwd, $db_name);

    if( !$link)
    {
        echo "Error: 연결에 실패하였습니다..".PHP_EOL;
        echo "Debugging errno: ".mysqli_connect_errno().PHP_EOL;
        echo "Debugging errer: ".mysqli_connect_errer().PHP_EOL;
        exit;
    }

    return $link;
}

function Error($msg)
{
    echo "
        <script>
            window.alert('$msg');
            history.back(1);
        </script>
    ";
    exit;   // 위에 에러 메시지만 띄운다.
}

function aprintf($array)
{
    echo("<pre>");
    print_r($array);
    echo("</pre>");

}

function popupmsg($msg)
{
    print<<<HTML
<script>
    alert('{$msg}');
</script>
HTML;

}

function popupmsg_exit($msg)
{
    print<<<HTML
<script>
    alert('{$msg}');
</script>
HTML;
    exit;
}

function member($link)
{
    if( isset($_COOKIE["COOKIES"]) ) {
        $temps = $_COOKIE["COOKIES"];
        $cookise = explode("//", $temps);

        // 회원정보
        $query = "SELECT * FROM member WHERE user_id='$cookise[0]'";
        $result = mysqli_query($link, $query);
        $member = mysqli_fetch_array($result);

        return $member;
    }

    return;
}

