<!-- login.php⇒ login_act.php⇒ read.php -->

<?php	

    // エラーを表示してくれる構文
        ini_set("display_errors", 1);
        error_reporting(E_ALL);

    //定義したfunctionを呼び出す
        require_once('funcs.php');

    //SESSION開始！！
        session_start();

    // データベース通信開始
        $pdo = db_conn();

?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>read_mptlogin.php</title>

        <!-- jqueryを読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- CSSをリセット -->
        <link rel="stylesheet" type="text/css" href="css/reset.css">


    </head>

        <header>
        <p>会員データ</p>
        </header>

    <body>
        <section>

            <table id="table">
                <tr>
                    <th>ID</th>
                    <th>姓</th>
                    <th>名</th>
                </tr>

                <?php

                    //データ取得SQL作成
                        $stmt = $pdo->prepare("SELECT * FROM gs_user_table");
                        $status = $stmt->execute();
                    
                    //３．データ表示

                        if ($status == false) {
                            //execute（SQL実行時にエラーがある場合）
                            sql_error($stmt);

                        }else{
                            //Selectデータの数だけ自動でループしてくれる
                            //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
                            while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){

                                $p0 = h($result['unique_code']);
                                $p1 = h($result['fname']);
                                $p2 = h($result['lname']);

                                $row = <<<EOM
                                    <tr>
                                        <td>$p0</td>
                                        <td>$p1</td>
                                        <td>$p2</td>
                                    </tr>
                                EOM;
                        
                                echo $row;

                            };
                        };


                ?>

            </table>

        </section>

        <ul>
            <li><p><a href="index.php">TOPに戻る</a></p></li>
            <li><p><a href="login.php">ログインする</a></p></li>
            <li><p><a href="post.php">会員登録データの登録</a></p></li>
        </ul>

    </body>

</html>



<!-- CSS -->
    <style type="text/css">

        html{
            margin:20px 20px 20px 20px;
        }

        section{

            margin:0 0 20px 0;
        }

        tr{
            width:100%;
        }

        td,th{
            align-items:center;
            border:1px solid;
            width:33%;
            height:20px;
            padding:10px 0 0 0;
            
        }
        
        


    </style>

