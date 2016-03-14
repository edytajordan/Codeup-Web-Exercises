<?php
	var_dump($_GET);
	var_dump($_POST);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>My First Form</title>
	</head>
	<body>
		<h1>My First HTML Form</h1>
		<h2>User Login</h2>
		<form method="POST" action="/my_first_form.php">
			<p>
				<label for="username">Username</label>
				<input id="username" name="username" type="email" placeholder="Username">
			</p>
			<p>
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Password">
			</p>
			<p>
				<textarea name="manifesto" placeholder="Type your manifesto."></textarea>
			</p>
			<p>
				<button type="submit">Login</button>
			</p>
		</form>
		<h2>Compose an Email</h2>
		<form method="POST" action="/my_first_form.php">
			<p>
				<label for="to">To</label>
				<input id="to" name="to" type="email" placeholder="Recipient Email">	
			</p>
			<p>
				<label for="from">From</label>
				<input id="from" name="from" type="email" placeholder="Sender Email">
			</p>
			<p>
				<label for="subject">Subject</label>
				<input id="subject" name="subject" type="text" placeholder="Email Subject">
			</p>
			<p>
				<textarea name="email_body" placeholder="Compose your email."></textarea>
			</p>
			<p>
				<input type="checkbox" id="mailing_list" name="mailing_list" value="yes" checked>
				<label for="mailing_list">Sign me up for the mailing list!</label>
			</p>
			<p>
				<button type="submit">Send</button>
			</p>
		</form>

		<h2>Multiple Choice Test</h2>
		<form method="POST" action="/my_first_form.php">
			<p>What is my name?</p>
			<label>
				<input type="radio" name="q1" value="betty">
				Betty
			</label>
			<label>
				<input type="radio" name="q1" value="kristen">
				Kristen
			</label>
			<label>
				<input type="radio" name="q1" value="pilot_inspektor"> Pilot Inspektor
			</label>
			<p>How old am I?</p>
			<label>
				<input type="radio" name="q2" value="27">
				27
			</label>
			<label>
				<input type="radio" name="q2" value="42">
				42
			</label>
			<label>
				<input type="radio" name="q2" value="34">
				34
			</label>
			<p>What element is best?</p>
				<label><input type="checkbox" id="elem_1" name="elem[]" value="magnesium">Magnesium</label>
				<label><input type="checkbox" id="elem_2" name="elem[]" value="hydrogen">Hydrogen</label>
				<label><input type="checkbox" id="elem_3" name="elem[]" value="nitrogen">Nitrogen</label>
			<p>Who gives the best lives performances?</p>
			<label for="live">Choose the best:</label>
			<select id="live" name="live[]" multiple>
				<option value="ewf">Earth, Wind, and Fire</option>
				<option value="queen_b">Beyonce</option>
				<option value="fbm">Frankie, Beverly, and Maze</option>
			</select>
			<p>
				<button type="submit">Submit</button>
			</p>
		</form>
		<form method="POST" action="/my_first_form.php">
			<label for="prince">Is Prince a musical genius?</label>
			<select id="prince" name="prince">
				<option selected disabled>Choose wisely!</option>
				<option value="1">Yes, Prince is a genius.</option>
				<option value="0">I have poor taste in music.</option>
			</select>
			<p>
				<button type="submit">Submit</button>
			</p>
		</form>
	</body>
</html>