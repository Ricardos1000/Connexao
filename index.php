<?php
    include_once "./classe/enviar.php";
    echo'
     <!DOCTYPE html>
     	<html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="Assessoria em informática, Tecnologia, Firewall, Backup em Nuvem, Nuvem">
            <title>Formulario de contato</title>
        </head>
        <body>
        
        	<form method="post" name="Contato" action="enviar">
	        	<fieldset>
		        	<legend>Contato</Legend>     			
		        	<input type="text" name="nome" placeholder="Digite seu nome"/>
		        	<input type="text" name="email" placeholder="Digite seu e-mail"/>
		        	<input type="text" name="subject" placeholder="Digite o assunto"/>
		        	<br>
		        	<textarea name="mensagem" placeholder></textarea>
	        	</fieldset>
        	</form>
  
        </body>
     	</html>
    ';
