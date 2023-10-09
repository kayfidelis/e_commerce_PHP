<?php
include 'conexao.php';  // incluindo a conexão
include 'resize-class.php'; // classe para redimensionar imagem

if (isset($_GET['cd_altera'])) {
    $id_produto = $_GET['cd_altera'];
    $consulta = $cn->prepare("SELECT img_produto FROM tbl_produto WHERE cd_produto = :id_produto");
    $consulta->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);
    $consulta->execute();
    $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
} else {
    // Lógica para lidar com o caso em que 'cd_altera' não está definido
    // Você deve adicionar o tratamento apropriado aqui.
    die("Código do produto não fornecido.");
}

// Validar e receber os dados do formulário
if (isset($_POST['sltcat'], $_POST['txtprod'], $_POST['txtpreco'], $_POST['txtdesc'], $_POST['txtqtde'], $_POST['sltlanc'])) {
    $categoria = $_POST['sltcat'];
    $produto = $_POST['txtprod'];
    $preco = $_POST['txtpreco'];
    $descricao = $_POST['txtdesc'];
    $qtde = $_POST['txtqtde'];
    $lanc = $_POST['sltlanc'];

    // Realize as substituições de preço aqui
    $preco = str_replace('.', '', $preco); // Substituindo . por vazio
    $preco = str_replace(',', '.', $preco); // Substituindo , por .

    $recebe_foto1 = $_FILES['txtfoto1'];
    $destino = "imagens/";

    if (!empty($recebe_foto1['name'])) {
        preg_match("/\.(jpg|jpeg|png|gif){1}$/i", $recebe_foto1['name'], $extensao1);
        $img_nome1 = md5(uniqid(time())) . "." . $extensao1[1];
        $upload_foto1 = 1;
    } else {
        $img_nome1 = $exibe['img_produto'];
        $upload_foto1 = 0;
    }

    try {
        $alterar = $cn->prepare("UPDATE tbl_produto SET  
        cd_categoria = :categoria,
        nm_produto = :produto,
        vl_preco = :preco,
        qt_estoque = :qtde,
        descrição = :descricao,
        img_produto = :img_nome1,
        sg_lançamento = :lanc
        WHERE cd_produto = :id_produto");

        $alterar->bindParam(':categoria', $categoria, PDO::PARAM_INT);
        $alterar->bindParam(':produto', $produto, PDO::PARAM_STR);
        $alterar->bindParam(':preco', $preco, PDO::PARAM_STR);
        $alterar->bindParam(':qtde', $qtde, PDO::PARAM_INT);
        $alterar->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $alterar->bindParam(':img_nome1', $img_nome1, PDO::PARAM_STR);
        $alterar->bindParam(':lanc', $lanc, PDO::PARAM_STR);
        $alterar->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);
        $alterar->execute();

        if ($upload_foto1 == 1) {
            move_uploaded_file($recebe_foto1['tmp_name'], $destino . $img_nome1);
            $resizeObj = new resize($destino . $img_nome1);
            $resizeObj->resizeImage(340, 480, 'crop');
            $resizeObj->saveImage($destino . $img_nome1, 100);
        }

           // Exibir alerta de alteração bem-sucedida
    echo '<script>alert("Produto alterado com sucesso!");</script>';
    // Redirecionar após o alerta
    echo '<script>window.location.href = "adm.php";</script>';
    exit();

       
       
    } catch (PDOException $e) {
        // Se houver um erro, exiba a mensagem de erro.
        echo "Erro: " . $e->getMessage();
    }
} else {
    // Lógica para lidar com o caso em que os campos do formulário não estão definidos.
    // Você deve adicionar o tratamento apropriado aqui.
    die("Campos do formulário não estão definidos.");
}
