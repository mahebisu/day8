<!-- login.php⇒ login_act.php⇒ read.php -->

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
    //持ってなければ、read_notlogin.phpに移動する。

        if ($_SESSION["chk_ssid"]  == session_id()) {
            // OKの場合
            session_regenerate_id(true);
            $_SESSION["chk_ssid"]  = session_id();
        
        } else {
            // NGの場合
            redirect('read_notlogin.php');
        }


    // データベース通信開始
        $pdo = db_conn();

?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>read.php</title>

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
                    <th>メール（前）</th>
                    <th>メール（後）</th>
                    <th>都道府県</th>
                    <th>市区町村</th>
                    <th>丁目番地</th>
                    <th>マンション</th>
                    <th>電話番号</th>
                    <th>電話番号（-）</th>
                    <th>ID</th>
                    <th>PASS</th>
                    <th>権限（1=管理者）</th>
                    <th>退社済（1=退社済）</th>
                    <th>登録日時</th>
                    <th>更新日時</th>
                    <th>編集</th>
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
                                $p3 = h($result['mail1']);
                                $p4 = h($result['mail2']);
                                $p5 = h($result['address1']);
                                $p6 = h($result['address2']);
                                $p7 = h($result['address3']);
                                $p8 = h($result['address4']);
                                $p9 = h($result['phone']);
                                $p10 = h($result['phone_hyoji']);
                                $p11 = h($result['lid']);
                                $p12 = h($result['lpw']);
                                $p13 = h($result['kanri_fig']);
                                $p14 = h($result['life_fig']);
                                $p15 = h($result['reg_date']);
                                $p16 = h($result['up_date']);

                                if($_SESSION["kanri_fig"] == 1){

                                    $p17 = <<<EOM
                                        <button><a href="update.php?unique_code=$p0">[編集]</button><button><a href="delete.php?unique_code=$p0">[削除]</button>
                                    EOM;

                                }else{
                                    $p17 = '-';
                                }


                                $row = <<<EOM
                                    <tr>
                                        <td>$p0</td>
                                        <td>$p1</td>
                                        <td>$p2</td>
                                        <td>$p3</td>
                                        <td>$p4</td>
                                        <td>$p5</td>
                                        <td>$p6</td>
                                        <td>$p7</td>
                                        <td>$p8</td>
                                        <td>$p9</td>
                                        <td>$p10</td>
                                        <td>$p11</td>
                                        <td>$p12</td>
                                        <td>$p13</td>
                                        <td>$p14</td>
                                        <td>$p15</td>
                                        <td>$p16</td>
                                        <td>$p17</td>
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
            <li><p><a href="logout.php">ログアウトする</a></p></li>
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
            width:5.55%;
            height:20px;
            padding:10px 0 0 0;
            
        }
        
        


    </style>

