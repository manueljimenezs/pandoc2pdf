<?php 
    if(isset($_POST['text'])){ 
	file_put_contents("tmp.txt", $_POST['text']);
	$err = shell_exec("pandoc -t beamer -o out.pdf -i tmp.txt --slide-level=2 2>&1");
	print "<pre>$err</pre></span>";
    }
?>
<html>

<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
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
---
title: Texto de prueba con beamer
subtitle: Descripción
author: Autor
date: \today
theme: Copenhagen
colortheme: crane
fontfamily:
header-includes:
- \usepackage[spanish]{babel}
- \newcommand{\columnsbegin}{\begin{columns}}
- \newcommand{\columnsend}{\end{columns}}
fontsize: 10pt
---


# Code demo

## test

\columnsbegin
\column{.5\textwidth}


Esto es una prueba de otra columna

\column{.5\textwidth}

Esto es una prueba de una columna

\columnsend

# Here's some code:

## ertty

```c
int main() {
  for(i=0;i<34;i++){
   printf("Hello World!");
  }
}
```

# another

## Gradual lists
> - First Element
> - Second Element

## Breakfast

- First Element
- Second Element

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
