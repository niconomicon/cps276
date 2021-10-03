<?php
/*Exercise 2
Modify the provided webpage provided where the title, heading 1, paragraph text, and
footer content are php variables. Those PHP variables will be displayed in the HTML
areas designated (see the starter file) using echo.
When you write this make sure that most of the PHP will be at the top above the
doctype and only the variable that are being echoed out will be in the HTML areas.
Also, the three paragraphs will be generated using a loop and concatenating the three
paragraphs together as one long string. This is based upon the provided text from one
of the paragraphs.
See screenshot for exercise 2 on how it should look when done.
NOTE: Your name will replace "Scott Shaper"
NOTE: I have provided the text for the first paragraph which will be duplicated three
times. You will use a loop to create the three paragraphs and the loop will be above the
doctype of the HTML page.*/
$title="Exercise 2";
$heading1="My Web Page";
$name="Nicole Williams";
$footer="My Web Page, 2021";


function paraFunction() {
    $para="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat mollis dolor at bibendum. In congue maximus ligula, ut faucibus mi accumsan at. Vestibulum sagittis tortor eget dui ultricies, a vulputate lacus faucibus. Fusce aliquet bibendum erat, sed bibendum eros cursus eu. Nulla at neque rhoncus, ultricies odio at, accumsan elit. Proin in turpis eu leo dapibus pulvinar. Vivamus viverra massa ut enim fringilla ultricies. Donec in enim blandit, iaculis nulla quis, egestas elit. Nullam ut enim id erat bibendum finibus nec ac eros. Nulla malesuada ex facilisis ultrices rhoncus. Nullam in euismod nisl. Donec pulvinar ex sit amet aliquet egestas.
<br><br>
    ";
    for ($i=1; $i <= 3; $i++) {
        echo $para;
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title?></title>
	<style>
		* {margin: 0; padding: 0;}
		body {font: 120%/1.5 sans-serif;}
		#wrapper {width: 1000px; margin: 0 auto; border: 1px solid black;}
		header {background: green; height: 150px; padding: 20px;}
		header h1 {color: white;}
		main {padding: 10px;}
		main h2 {margin: 15px 0;}
		main p {margin-bottom: 15px;}
		footer {background: #eee; padding: 10px 0; text-align: center}
		footer p {font-size: .8em;}
	</style>
</head>
<body>
	<div id="wrapper">
		<header>
			<h1><?php echo $heading1?></h1>
		</header>
		<main>
			<h2>My name is <?php echo $name?></h2>
			<p><?php echo paraFunction()?></p>
			
		</main>
		<footer>
			<p><?php echo $footer?></p>
		</footer>
	</div>
	
</body>
</html>