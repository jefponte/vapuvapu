<?php


/*

*/

?>
<!DOCTYPE html>
<html>
<body>

<?php

$conexao = new PDO('mysql:host=localhost;dbname=vapuvapu', 'root', '');

if(isset($_POST['form-enviar'])){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpfCnpj = $_POST['cpf_cnpj'];
    $razaoSocial = $_POST['razao_social'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sql = "
    INSERT into usuario 
    (nome, sobrenome, cpf_cnpj, razao_social, email, senha)
    VALUES
    (:nome, :sobrenome, :cpfCnpj, :razaoSocial, :email, :senha)
    ";
    try{
        $stmt = $conexao->prepare($sql);
        $stmt->binParam(":nome", $nome, PDO::PARAM_STR);
        $stmt->binParam(":sobrenome", $sobrenome, PDO::PARAM_STR);
        $stmt->binParam(":cpfCnpj", $cpfCnpj, PDO::PARAM_STR);
        $stmt->binParam(":razaoSocial",$razaoSocial, PDO::PARAM_STR);
        $stmt->binParam(":email", $email, PDO::PARAM_STR);
        $stmt->binParam(":senha", $senha, PDO::PARAM_STR);
        $resultado = $conexao->execute();    
        if($resultado){
            echo "Inserido com sucesso";
        }else{
            echo "Falha ao tentar inserir";
        }

    }catch(PDOException $e)
    {
        echo "Erro".$e->getMessage();
    }
    

}

?>
    <form method="post">
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="text" name="sobrenome" placeholder="Sobrenome"><br>
        <input type="text" name="cpf_cnpj" placeholder="Cpf\Cnpj"><br>
        <input type="text" name="razao_social" placeholder="Razão Social"><br>
        <input type="text" name="email" placeholder="E-mail"><br>
        <input type="password" name="senha" placeholder="Senha"><br>
        <input type="submit" name="form-enviar" value="Cadastrar"><br>
    </form>
    <?php

    $resultado = $conexao->query("SELECT * FROM usuario;");
    echo '<table border="1">';
    echo '<tr><th>Nome</th><th>E-mail</th></tr>';
    foreach($resultado as $linha){
        echo '<tr><td>'.$linha['nome'].'</td><td>'.$linha['email'].'</td></tr>';

    }
    echo '</table>';

    ?>
</body>
</html>


