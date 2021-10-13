<?php


    // エラーを表示してくれる構文
        ini_set("display_errors", 1);
        error_reporting(E_ALL);

    //定義したfunctionを呼び出す
        require_once('funcs.php');

    //SESSION開始！！
        session_start();


    //ログインチェック処理！
    //以下、セッションID持ってたら、ok
    //持ってなければ、閲覧できない処理にする。
    // logincheckはfuncs.phpにて定義した
        loginCheck();


    // データベース通信開始
        $pdo = db_conn();

    $unique_code = $_GET['unique_code'];

    //２．データ登録SQL作成
        $stmt = $pdo->prepare('DELETE 
                            FROM
                                gs_user_table
                            WHERE
                            unique_code = :unique_code
                            ;');
        $stmt->bindValue(':unique_code',$unique_code,PDO::PARAM_INT);
        $status = $stmt->execute();

    //３．データ表示
    $view = '';
    if ($status == false) {
        sql_error($status);
    } else {
        redirect('read.php');
    }


?>