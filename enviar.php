<?php
    //error_reporting(1);

    $seletor = $_POST['seletor'];
    $mensagem = $_POST['mensagem'];
    $sender = $_POST['sender'];

    if($seletor == "" || $mensagem == ""){
        echo "
            <script>    
                alert('Preencha todos os campos!')
                document.location.href = 'index.php'
            </script>
        ";

    } else {
        
        $seletores = ["Seletor 1", "Seletor 2", "Seletor 3", "Seletor 4", "Seletor 5", "Seletor 6"];
        $teste = 0;

        for($i = 0; $i<count($seletores);$i++){
            if($seletor != $seletores[$i])
                $teste++;
        }

        if($teste == count($seletores)){
            echo "
            <script>    
                alert('Seleção Inválido!')
                document.location.href = 'form.php'
            </script>
            ";

        } else {
        
            require 'vendor/autoload.php';
            
            if (SendEmail($seletor, $mensagem, $sender)){
                echo "
                    <script>    
                        alert('Enviado com sucesso!')
                        document.location.href = 'index.php'
                    </script>
                ";
            } else {
                echo "
                    <script>    
                        alert('Erro ao envio, contate o TI!')
                        document.location.href = 'index.php'
                    </script>
                ";
            }
        }
    }

    function SendEmail($seletor, $mensagem, $sender){
        
        $dest = SelecionaDestino($seletor,GetJsonEmail());
        //$Auth = GetJsonKey();
        
        $seletor = "Assunto do Email Aqui - " . $seletor;
        $mensagem .= "\n\nRemetente: " . $sender;
    
        $email = new \SendGrid\Mail\Mail(); 
        //O email remetente não precisa necessariamente existir
        $email->setFrom("email_remetente@example.com", "Email Remetente");
        $email->setSubject($seletor);
    
        if(is_array($dest)){
            for($i = 0; $i < count($dest); $i++){
                $email->addTo("$dest[$i]");
            }
        } else {
            $email->addTo("$dest");
        }
    
        $email->addContent("text/plain", $mensagem);
    
        $sendgrid = new \SendGrid(getenv("API_KEY"));
            
        try {
            $response = $sendgrid->send($email);
            return true;
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
            return false;
        }
    
    }

    function SelecionaDestino($seletor, $EmailObj){

        switch($seletor){
            case "Seletor 1":
                $Destino = $EmailObj->grupo1;
                break;
            case "Seletor 2":
                $Destino = $EmailObj->grupo2;
                break;
            default:
                $Destino = $EmailObj->todos;    
                break;
        }
        return $Destino;
    }

    function GetJsonEmail(){
        return json_decode(fread(fopen("466deec76ecdf5fca6d38571f6324d54/json/emails.json","r"),8192));
    }

    function GetJsonKey(){
        return json_decode(fread(fopen("466deec76ecdf5fca6d38571f6324d54/json/key.json","r"),8192));
    }
    
?>