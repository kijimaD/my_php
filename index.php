<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>check</title>
    </head>
    <body>
        <h1>
            <?php print ("PHPのprint関数によって出力された"); ?>
        </h1>

        <form method="POST" action="sayhello.php">
            Your Name: <input type="text" name="user" />
            <br/>
            <button type="submitf">Say Hello</button>
        </form>

        <?php
        print <<<_HTML_
        <form method="post" action="$_SERVER[PHP_SELF]">
            Your Name: <input type="text" name="user" />
          </br>
          <button type="submit">Say Hello</button>
        </form>
        _HTML_;
        ?>

        <?php
        if ($_POST['user']) {
            print "Hello, ";
            print $_POST['user'];
            print "!";
        } else {
            print <<<_HTML_
            <form method="post" action="$_SERVER[PHP_SELF]">
            Your Name: <input type="text" name="user" />
            <br/>
            button
            </form>
            _HTML_;
        }
        ?> 
    </body>
</html>
