<?php
    error_reporting(1);

    $seletor = $_POST['acao'];
    $mensagem = $_POST['mensagem'];
    $ip = $_POST['ipzinho'];

    if($seletor == "" || $mensagem == ""){
        echo "
            <script>    
                alert('Preencha todos os campos!')
                document.location.href = 'index.php'
            </script>
        ";

    } else {
        if ($seletor !="Inserir" && $seletor !="Aprimorar" && $seletor !="Elogiar" && $seletor !="Descontinuar" && $seletor !="Dúvida" && $seletor !="Outros"){
            
            echo "
            <script>    
                alert('Valor Inválido!')
                document.location.href = 'index.php'
            </script>
            ";

        } else {
            
            require 'vendor/autoload.php';
            
            $assunto = "Portal de Feedback - " . $seletor;
            $mensagem .= "\n\nIP remetente: " . $ip; 
            
            $json = fopen("emails.json","r");
            $destinatario = fread($json,8192);
            $destinatario = json_decode($destinatario,true);

            $key = json_decode((fread("key.json",8192)),true);
            
            $email = new \SendGrid\Mail\Mail(); 
            $email->setFrom("portalfeedback@generic.com", "Portal Feedback");
            $email->setSubject($assunto);
            for($i = 0; $i < count($destinatario) ; $i++){
                $email->addTo("$destinatario[$i]");
            }
            $email->addContent("text/plain", $mensagem );

            $sendgrid = new \SendGrid($key);
            try {
                $response = $sendgrid->send($email);
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";
            }
    
            echo "
                <script>    
                    alert('Mensagem enviada com sucesso!')
                    document.location.href = 'index.php'
                    </script>
            ";

        }
        
    }
    
?>