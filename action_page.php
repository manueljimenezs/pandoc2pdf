<?php
file_put_contents("tmp.md", $_POST['text']);
exec("pandoc -t latex -o out.pdf tmp.md");
exit;
?>
