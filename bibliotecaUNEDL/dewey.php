<?php
//Para desargar el codigo Dewey para conocerlo
//O para saber el codigo de algun libro
	header('Content-type: aplication/octet-stream');
	header('Content-Disposition: attachment; filename ="Dewey1.pdf"');
	readfile('Dewey1.pdf');
?>