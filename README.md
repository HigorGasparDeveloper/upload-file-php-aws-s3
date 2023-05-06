# upload-file-php-aws-s3
Projeto de upload de arquivo no amazon S3 em php
Instruções:
Este é um projeto para estudo de funcionamento do recurso S3, da Amazon.
O recurso S3 é usado para armazenamento de arquivos de diversos tipos e é altamente escalável, dependendo do tipo de classe de armazenamento escolhida para uso. 

O Amazon S3 funciona com a criação de buckets e neles podemos criar pastas, realizar o upload e a remoção de arquivos como se estivéssemos em um computador comum. 
É preciso se atentar nas configurações de acesso aos arquivos e ao bucket, pois se deixarmos público, qualquer pessoa da internet pode acessar o conteúdo do mesmo.
- Primeiramente criei um bucket e configurei acesso privado á minha conta. 
- Após isto, criei uma política de bucket para permitir apenas o get e o put de arquivos dentro do bucket.
- Para o uso do bucket privado, é necessária a autenticação na hora de usarmos a sdk do php para realizar a ação de upload do arquivo, então criei um grupo de usuário
e um usuário com acesso inteiro à manipulação dos recursos S3, configurei uma chave de acesso pra ele e coloquei as mesmas, junto com o nome do bucket em uma variável
de ambiente de meu computador.
- Com isso, já é possível através do código fazer o acesso autenticado para upload dos arquivos. 

Para o upload, utilizei o composer para instalar a sdk com o comando:
composer require aws/aws-sdk-php

Após isto, apenas escrevi o código do arquivo upload-file.php
