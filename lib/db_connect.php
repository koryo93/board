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
