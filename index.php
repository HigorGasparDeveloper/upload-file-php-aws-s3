<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File upload AWS S3 - PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body> 
    <div class="container">
        <form class="card form mt-5 text-white" action="upload-file.php" method="POST" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center mt-5 mb-2">
                <h2 class="text-header">
                    File upload - PHP
                </h2>
            </div>
            <div class="row d-flex justify-content-center mb-2">
                <div class="col-md-6">
                    <label class="form-label">Filename</label>
                    <input type="text" name="filename" id="filename" class="form-control input-color-dark" placeholder="Filename...." required>
                </div>
            </div>
            <div class="row d-flex justify-content-center mb-5">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="file" name="file" id="file" class="form-control">
                        <button class="btn btn-dark" type="submit">Upload</button>
                    </div>
                </div>
            </div>
            <?php

            if (isset($_SESSION['response'])) {
                $response = $_SESSION['response'];
                $status_badges = array(201 => ['badge' => 'success', 'name' => "Sucesso"], 400 => ['badge' => 'danger', 'name' => 'Erro']);
                ?>
                <div class="alert alert-<?php echo $status_badges[$response['status']]['badge'] ?? 'danger' ?> alert-dismissible text-bg-<?php echo $status_badges[$response['status']]['badge'] ?? 'danger' ?> border-0 fade show" role="alert">
                    <strong><?php echo $status_badges[$response['status']]['name'] ?? 'danger' ?> - </strong> <?php echo $response['message']; ?>
                </div>
                <?php
                unset($_SESSION['response']);
            }

            ?>
        </form>
    </div>
</body>
</html>