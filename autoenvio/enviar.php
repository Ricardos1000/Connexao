<?php

    require_once ('PHPMailer.php');
    require_once ('SMTP.php');
    require_once ('Exception.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //$para ='contato@connexaoinformatica.com.br';
    $nome = isset($_REQUEST['name']);
    
    //"Titulo do nosso email",
    $assunto = isset($_REQUEST['subject']); 

    //"Este email foi enviado pelo website Connexão Informática"
    $mensagem = isset($_REQUEST['mensagem']);

    //quem está enviando o e-mail "de"
    $remetente = isset($_REQUEST['email']);
    /*
    //quem está enviando o e-mail "de"
    $headers = 'MIME-Version: 1.0'.'\r\n';
    $headers = 'Content-type: text/html; charset=UTF-8'.'\r\n';
    $headers = 'From: '.$remetente;

    $destinatario = 'contato@connexaoinformatica.com.br';

    $enviaremail = mail($destinatario, $assunto, $mensagem, $headers);

    //Função que verifica se o e-mail foi enviado ou não
    if($enviaremail){
        $msg = 'E-MAIL ENVIADO COM SUCESSO';
        echo "<meta http-equiv='refresh' content='10;URL=contato.php'>";
    }else{
        $msg = "ERRO AO ENVIAR E-Mail!";
        echo '';
    }
    */

    $mailer = new PHPMailer(true);

    try{

        $mailer->SMTPDebug = SMTP::DEBUG_SERVER;
        //Define que o padrão de envio é SMTP
        $mailer->isSMTP();

        //Define o servidor de evio
        $mailer->Host = 'email.connexaoinformatica.com.br';

        //define que será usado o SMTP
        $mailer->SMTPAuth = true;

        //Define o tipo de protocolo de segurança
        //$Mailer->SMTPSecure = 'ssl';

        //Aceitar caracteres especiais
        $mailer->Charset = "UTF-8";

        //Define o usuário remetente;
        $mailer->Username = 'ricardo@connexaoinformatica.com.br';

        //Define a senha do usuário remetente
        $mailer->Password = 'Rid@488306s';

        //Define a porta de saída usada no envio do email
        $mailer->Port = "465";

        //================ Dados do Remetente ============================

        //Enviar e-Mail em Html
        $mailer->IsHtml(true);

        //Email do remetente
        $mailer->SetFrom($remetente, $nome);
        //Assunto 
        $mailer->Subject = $assunto;
        //Corpo da mensgem
        $mailer->Body = $mensagem;
        //Caso a mensgem não vem em HTML
        $mailer->AltBody = $mensagem;

        //print_r($mailer);

        if($mailer->Send()){
            echo 'e-Mail enviado com Sucesso!';
            echo '<br><a href=https://www.connexaoinformatica.com.br>Voltar</a>';
        }else{
        
            echo 'Erro no envio do e-Mail'. $mailer->ErrorInfo();
            echo '<br><a href=https://www.connexaoinformatica.com.br>Voltar</a>';
        }
    
    /*
        //Nome do servidor
        $Mailer->'email.connexaoinformatica.com.br';

        //Porta de saída do e-mail
        $Mailer->Port = 465;

        //Dados do e-mail 
        $Mailer->Username = "contato@connexaoinformatica.com.br";
        $Mailer->Password = 'Ric@488306s';

        //e-Mail de saída
        $Mailer->From = 'ricardo@connexaoinformatica.com.br';

        //Remetente
        $Mailer->FromName = "Connexão";

        //Assunto
        $Mailer->Subject = 'Titulo - Recuperar Senha';

        //Conteúdo da Mensagem
        $Mailer->Body = "Conteúdo do e-Mail";

        //Corpo da Mensagem
        $Mailer->AltBody = 'conteúdo do e-mail em texto';

        //Destinatário
        $Mailer->AddAddress('ricardo@connexaoinformatica.com.br');
    */ 
    }Catch(Exception $e)
    {
        echo "Erro ao enviar mensgem :{$mailer->ErrorInfo}";
        echo '<br><a href=https://www.connexaoinformatica.com.br>Voltar</a>';
    }

?>