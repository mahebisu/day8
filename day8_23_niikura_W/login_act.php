<?php
    // 定義した関数を呼び出す
        require_once("funcs.php");

    //最初にSESSIONを開始
        session_start();

    //POST値を受け取る
        $lid = $_POST['lid'];
        $lpw = $_POST['lpw'];

    //DB接続します
        $pdo = db_conn();

    //2. データ登録SQL作成
    // gs_user_tableに、IDとWPがあるか確認する。
        $stmt = $pdo->prepare('SELECT 
                            * 
                        FROM 
                            `gs_user_table` 
                        WHERE 
                            `lid`= :lid
                        AND 
                            `lpw` = :lpw
                        ');

        $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
        $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
        $status = $stmt->execute();

    //3. SQL実行時にエラーがある場合STOP
        if($status==false){
            sql_error($stmt);
        }

    //4. 抽出データ数を取得
        $val = $stmt->fetch();         //1レコードだけ取得する方法

    //5. 該当レコードがあればSESSIONに値を代入
    //if(password_verify($lpw, $val["lpw"])){ //* PasswordがHash化の場合はこっちのIFを使う
        if( $val["unique_code"] != "" ){

            //Login成功時
                $_SESSION["chk_ssid"]  = session_id();
                $_SESSION["kanri_fig"] = $val['kanri_fig'];
                $_SESSION["fname"]      = $val['fname'];
                header('Location: read.php');

        }else{

            //Login失敗時(Logout経由)
                header('Location: login.php');

        }

        exit();

?>