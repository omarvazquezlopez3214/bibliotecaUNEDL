<?php
	header('Content-type: aplication/octet-stream');
	header('Content-Disposition: attachment; filename ="Dewey1.pdf"');
	readfile('Dewey1.pdf');
?>