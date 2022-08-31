<?php
if(isset($_POST["title"]) && isset($_POST["text"])) {
    $conn = mysqli_connect("mysql", "root", "example", "example_db");

    $sql = "INSERT INTO posts (title, text) VALUES (\"" . $_POST["title"] . "\", \"" . $_POST["text"] . "\");";

    mysqli_query($conn, $sql);

    header( 'HTTP/1.1 303 See Other' );
    header( 'Location: .' );
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example Posts</title>
</head>
<body>
    <h1>POST</h1>
    <form action="." method="post">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="text" placeholder="Text">
        <input type="submit" value="send">
    </form>
    <dl>
        <dt>Coffee</dt>
        <dd>- black hot drink</dd>
        <dt>Milk</dt>
        <dd>- white cold drink</dd>
        <?php
        $conn = mysqli_connect("mysql", "root", "example", "example_db");

        $sql = "SELECT * FROM posts;";

        $results = mysqli_query($conn, $sql);

        while ($post = mysqli_fetch_array($results)) {
            echo "<dt>" . $post['title'] . "</dt>\n<dd>" . $post['text'] . "</dd>\n";
        }
        ?>
    </dl>
</body>
</html>
<?php
/*phpinfo();*/
?>