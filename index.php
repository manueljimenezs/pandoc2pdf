<?php 
    if(isset($_POST['text'])){ 
	file_put_contents("tmp.md", $_POST['text']);
	$err = shell_exec("pandoc -t latex -o out.pdf tmp.md 2>&1");
	print "<pre>$err</pre></span>";
    }
?>
<html>

<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<link rel="icon" type="image/png" href="favicon.png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>

<div id=container>

<div id="left">
<div id="textarea">
<?php if (isset($_POST['text'])): ?>
<form action="" method="post">
<textarea name="text" autocomplete="off" autocorrect="off" autocapitalize="off">
<?php print $_POST['text']; ?>
</textarea>
  <br>
  <input type="submit" name="submit" value="pandoc!" id="submit">
 <button type="submit" formaction="download.php" id="submit">Download PDF</button>
</form>

<?php else: ?>
<form action="" method="post">
<textarea name="text" autocomplete="off" autocorrect="off" autocapitalize="off">
# Generador de PDF Latex a partir de markdown
Usando `pandoc` se pueden generar pdfs a partir del texto insertado.
</textarea>
  <br>
  <input type="submit" name="submit" value="pandoc!" id="submit">
 <button type="submit" formaction="download.php" id="submit">Download PDF</button>
</form>
<?php endif;?>
</div>

</div>

<div id="right"/>
<?php if(isset($_POST['text'])): ?>
<embed id="pdf" src="out.pdf?a=a#toolbar=0&navpanes=0" height="100%" width="100%"></embed>
<?php endif; ?>
</div>
</div>
</body>
</html>
