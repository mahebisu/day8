<!-- index.php ⇒ post.php ⇒ write.php -->


<?php

    //定義したfunctionを呼び出す
    require_once('funcs.php');
    $pdo = db_conn();
?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>post.php</title>

        <!-- jqueryを読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- CSSをリセット -->
        <link rel="stylesheet" type="text/css" href="css/reset.css">


    </head>

    <header>
        <p>以下で会員登録をしました</p>
    </header>

    <body>

        <?php

            //POSTの受け取りは$_POST["input名"];
                $fname = $_POST["fname"];
                $lname = $_POST["lname"];

                $mail1 = $_POST["mail1"];
                $mail2 = $_POST["mail2"];

                $address1 = $_POST["address1"];
                $address2 = $_POST["address2"];
                $address3 = $_POST["address3"];
                $address4 = $_POST["address4"];

                $phone = $_POST["phone"];

                $lid = $_POST["lid"];
                $lpw = $_POST["lpw"];

                $kanri_fig = $_POST["kanri_fig"];
                $life_fig = $_POST["life_fig"];


            // 電話番号にハイフンを挿入する
                $phone_hyoji = mb_substr($phone, 0, 3).'-'.mb_substr($phone, 3, -4).'-'.mb_substr($phone, 7, 9);


            // 取得したプロフィールを配列に保存する
                $profile = [$fname, $lname, $mail1, $mail2,$address1, $address2, $address3, $address4, $phone,$phone_hyoji,$lid,$lpw,$kanri_fig,$life_fig];

            //データ登録SQL作成
            // 1. SQL文を用意
                $stmt = $pdo->prepare("INSERT INTO 
                                        gs_user_table
                                        (unique_code, fname, lname, mail1, mail2,address1,address2,address3,address4,phone,phone_hyoji,lid,lpw,kanri_fig,life_fig,reg_date,up_date)
                                        VALUES
                                        (NULL, :fname, :lname, :mail1, :mail2,:address1,:address2,:address3,:address4,:phone,:phone_hyoji,:lid,:lpw,:kanri_fig,:life_fig, sysdate(),sysdate())
                                        ");

            //  2. バインド変数を用意
                $stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
                $stmt->bindValue(':lname', $lname, PDO::PARAM_STR);
                $stmt->bindValue(':mail1', $mail1, PDO::PARAM_STR);
                $stmt->bindValue(':mail2', $mail2, PDO::PARAM_STR);
                $stmt->bindValue(':address1', $address1, PDO::PARAM_STR);
                $stmt->bindValue(':address2', $address2, PDO::PARAM_STR);
                $stmt->bindValue(':address3', $address3, PDO::PARAM_STR);
                $stmt->bindValue(':address4', $address4, PDO::PARAM_STR);
                $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
                $stmt->bindValue(':phone_hyoji', $phone_hyoji, PDO::PARAM_STR);
                $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
                $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
                $stmt->bindValue(':kanri_fig', $kanri_fig, PDO::PARAM_STR);
                $stmt->bindValue(':life_fig', $life_fig, PDO::PARAM_STR);


            // 実行
                $status = $stmt->execute();

            // データ登録処理後
                if ($status == false) {

                    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
                    sql_error($stmt);

                } else {

                    //index.phpへリダイレクト
                    // redirect('index.php');

                }


        ?>

        <ul>
            <li>
                <dl>
                    <dt class="dt_2">名前:</dt>
                    <dd><p><?=h($profile[0].' '.$profile[1])?></p></dt>
                </dl>                
            </li>
            <li>
                <dl>
                    <dt class="dt_2">メール:</dt>
                    <dd><p><?=h($profile[2].'@'.$profile[3])?></p></dt>
                </dl>
            </li>
            <li>
                <dl>
                    <dt class="dt_1">住所：</dt>
                    <dd>
                        <ul>
                            <li>
                                <dl>
                                    <dt class="dt_1">都道府県:</dt>
                                    <dd><p><?=h($profile[4].' '.$profile[5])?></p></dt>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="dt_1">丁目:</dt>
                                    <dd><p><?=h($profile[6])?></p></dt>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="dt_1">マンション:</dt>
                                    <dd><p><?=h($profile[7])?></p></dt>
                                </dl>
                            </li>
                        </ul>
                    </dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt class="dt_2">電話番号:</dt>
                    <dd><p><?=h($profile[9])?></p></dt>
                </dl>                
            </li>
        </ul>

        <ul>
            <li><p><a href="index.php">TOPに戻る</a></p></li>
            <li><p><a href="read.php">会員登録データの閲覧</a></p></li>
        </ul>


    </body>

</html>



<!-- CSS -->
    <style type="text/css">

        header{
            font-size: larger;
            margin: 20px 20px 40px 20px;
        }


        .dt_1{
            width: 150px;
        }


        .dt_2{
            width: 320px;
        }

        dl{
            display: flex;
        }


        li{
            margin: 20px 20px 20px 20px;
        }

        body{
            margin: 20px 0 20px 20px;
        }


    </style>
