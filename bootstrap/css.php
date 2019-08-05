<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		p::first-letter{
			content: '@';
			border: 10px solid #eee;
			height: 50px;
			width: 500px;
			background-color: red;
		}
		p::selection{
			background-color:blue; 
		}

		/*input[type="text"]:disabled{
			background-color: pink;
		}*/

		input[type="text"]:focus{
			background-color: blue;
		}

		li:nth-child(2){
			background-color: yellow;
		}

		li:last-child{
			background-color: red;	
		}

		p:hover{
			background-color: green;
		}

		input[type="text"]:empty{
			height: 50px;
			width: 50px;
			background-color: pink;
		}

		a:visited{
			color: pink;
		}
		a:hover{
			font-size: 500px;
		}
	</style>
</head>
<body>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<p>abcdjcshdkjas<br>dkas</p>
	<p>Hello</p>

	<input type="text" value="skjah">

	<ul>
		<li>abc</li>
		<li>kjshck</li>
		<li>nck</li>
		<li>jkdsh</li>
	</ul>
	
	<p></p>

	<a href="http://www.google.com">google.com</a>
</body>
</html>