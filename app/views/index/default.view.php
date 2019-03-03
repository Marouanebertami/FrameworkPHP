<?php
foreach($test as $t):
	
	echo $t['Name'].'<br>';
	echo $t['email'].'<br>';

endforeach;

?>

<form action="index/add" method="post">
	<input type="text" name="name" placeholder="Name">
	<input type="text" name="email" placeholder="Email">
	<input type="password" name="password" placeholder="Password">
	<input type="submit" value="Inscrir">
</form>