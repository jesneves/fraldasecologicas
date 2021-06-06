<?

 //aqui é só um exemplo para não rodar o script abaixo sem necessidade
if ((isset($_POST['email']))&&(!empty($_POST['email']))){

   //porta, usuário, senha, nome data base
   //caso não consiga conectar mostra a mensagem de erro mostrada na conexão
   $conexao = mysqli_connect('mysql669.umbler.com:PORTA', 'USUARIO', 'SENHA', 'sql1') or die("Erro na conexão com banco de dados " . mysqli_error($conexao));

    mysqli_set_charset($conexao, 'utf8');

    if($conexao->connect_error) {
        die("Falha ao realiza a conexão: " . $conexao->connect_error);
    }

  //Abaixo atribuímos os valores provenientes do formulário pelo método POST
  $nome = $_POST['nome']; 
  $email = $_POST['email'];
  $celular = $_POST['phoneNumber'];

  $sql = "INSERT INTO contact_bd VALUES";
  $sql .= "('$email','$nome','$celular')";

    if($conexao->query($sql) === TRUE) {
        echo "Dados enviados com sucesso!";
    } else {
        echo "Erro :" .$sql . "<br>" . $conexao->error;
    }

    $conexao->close();

//    $string_sql = "INSERT INTO contact_bd (id,name,email,phone) VALUES (none,'{$nome}','{$email}','{$celular}')";
//    $insert_member_res = mysqli_query($conexao, $string_sql);
//    if(mysqli_affected_rows($conexao)>0){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
//        echo "<p>Contato Registrado</p>";
//        echo '<a href="./obrigago.html">Voltar para formulário de cadastro</a>'; //Apenas um link para retornar para o formulário de cadastro
//    } else {
//        echo "Erro, não foi possível inserir no banco de dados";
//    }
//    mysqli_close($conexao); //fecha conexão com banco de dados
// }else{
//     echo "Por favor, preencha os dados";
}

include('envia_fale.php');

?>