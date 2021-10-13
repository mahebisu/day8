<!-- index.php ⇒ login.php ⇒ login_act.php -->

<?php
    //定義したfunctionを呼び出す
    require_once('funcs.php');
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
        <p>ログイン画面</p>
    </header>

    <body>

        <!-- login_act.phpに送信する -->
        <form method="post" action="login_act.php">
            <ul>
                <li class="komoku">
                    <!-- ID/PWフォーム -->
                    <dl class="cf">
                        <dt class="title">
                            <ul>
                                <li>ID/PW<span class="need">＊</span></li>
                                <li><span class="caution">登録済みのIDとPASSをご記入ください</span></li>
                            </ul>
                        </dt>
                        <dd class="data name">
                            <ul class="cf">
                                <li>ID<input class="input" maxlength="32" name="lid" type="text" placeholder="ID(半角英数)" style="margin-right: 10px; " required/></li>
                                <li>PW<input class="input" maxlength="32" name="lpw" type="text" placeholder="PW(半角英数)" required /></li>
                            </ul>
                        </dd>
                    </dl>
                </li>
                <li class="komoku">
                    <!-- 送信ボタン -->
                        <p><input type="submit" value="送信"></p>
                </li>
            </ul>

        </form>

        <ul>
            <li><p><a href="index.php">TOPに戻る</a></p></li>
        </ul>
    </body>

</html>


<!-- CSS -->
    <style type="text/css">

        .komoku{
            margin: 20px auto 40px auto ;
        }

        .title{
            width: 300px;
        }

        .name ul li {

            width: auto;
            margin: 0 3px 0 0;
            padding: 0;
            height: 35px;
            line-height: 35px;

        }

        .name ul, .cf{

            display: flex;
        }

        .name, .data{
            margin: 0 0 0 20px;
        }

        .cf2 li{
            margin: 0 0 20px 0;
        }


        input,select{

            width: 250px; /*--幅--*/
            padding: 10px; /*--余白--*/
            font-size: 16px; /*--文字サイズ--*/
            border: solid 2px #cccccc; /*--ボーダー線--*/
            border-radius: 5px; /*--角丸--*/

        }

        .input_mansion{
            width:400px;
        }

        .title ul>li{
            font-size: larger;
            font-weight: bold;
        }

        .caution{
            font-size: small;
            font-weight: lighter;
        }

        /*--focus--*/
        input:focus {

            background-color: #febe3e; /*--背景色--*/

        }

        input,select{
            margin: 0 0 0 20px;
        }

        body{
            margin: 20px 0 20px 20px;
        }


    </style>