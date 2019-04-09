<html>
<body>
<?php
/*print $_POST['text'];*/

file_put_contents("tmp.md", $_POST['text']);
/*$output = exec("echo $_POST['text']");*/
/*shell_exec("echo'".$_POST['text']."'| pandoc -t latex -o out.pdf'");*/
exec("pandoc -t latex -o out.pdf tmp.md");
header("Location: out.pdf?a=a");
exit;

?>

</body>
</html>
