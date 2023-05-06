<?php 
    @session_start();
    require 'vendor/autoload.php';
    use Aws\S3\S3Client;
    use Aws\Credentials\Credentials;
    use Aws\Exception\AwsException;
    if (isset($_FILES['file'])) {
        $file_name = $_POST['filename'];
        if (!empty(trim($file_name))) {
            // Configure as credenciais da AWS
            $aws_access_key_id = getenv("ACCESS_KEY");
            $aws_secret_access_key = getenv("SECRET_KEY");
            $bucket_name = getenv("BUCKET_NAME");
            $key_name = $file_name;
            $file_tmp_name = $_FILES['file']['tmp_name'];
            $fileType = strtolower(pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));

            $credentials = new Credentials(
                $aws_access_key_id,
                $aws_secret_access_key,
            );

            // Instancie o cliente S3 da SDK do AWS para PHP
            $s3 = new S3Client([
                'version' => 'latest',
                'region' => 'us-east-2',
                'credentials' => $credentials,
            ]);

            // Faça upload do arquivo para o bucket
            $result = $s3->putObject([
                'Bucket' => $bucket_name,
                'Key' => $key_name.".".$fileType,
                'SourceFile' => $file_tmp_name,
            ]);

            // Verifique se o upload foi bem-sucedido
            if ($result['ObjectURL']) {
                $_SESSION['response'] = array(
                    'status'=> 201,
                    'message'=> 'Arquivo enviado com sucesso para o bucket.' 
                );
            } else {
                $_SESSION['response'] = array(
                    'status'=> 400,
                    'message'=> 'Erro ao enviar arquivo para o bucket.' 
                );
            }
        }else {
            $_SESSION['response'] = array(
                'status'=> 400,
                'message'=> 'Preencha o nome do arquivo.' 
            );
        }
        header('location: index.php');
    }
?>