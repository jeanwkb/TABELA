<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // Redireciona para a página de visualização com o nome do arquivo
            header('Location: view.html?image=' . urlencode(basename($_FILES['image']['name'])));
            exit();
        } else {
            echo "Falha ao enviar o arquivo.";
        }
    } else {
        echo "Nenhum arquivo enviado ou erro no upload.";
    }
} else {
    echo "Método inválido.";
}
?>
