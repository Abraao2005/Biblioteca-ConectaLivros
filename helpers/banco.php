<?php
require_once("/xampp/htdocs/php/AulasCurso/OOP/Biblioteca/classes/alunos.php");


class BD_Controller
{
    private BD_Config $banco;
    //inicializa banco de dados
    function __construct()
    {
        $this->banco = new BD_Config();
    }
    //Registra o usuario do aluno
    function registerUser(User $user)
    {

        $sql = "INSERT INTO aluno (username,senha) VALUES('$user->userName','$user->password')";
        $this->banco->executeBD($sql);
    }
    //Registra os livros 
    function registerBook($livro,$biblioteca_id,$aluno_id)
    {

        $sql = "INSERT INTO livro_aluno (livro,biblioteca_id,aluno_id) VALUES('$livro','$biblioteca_id','$aluno_id')";
        $this->banco->executeBD($sql);
    }
    //remove o usuario que desejar
    public function removeBook($id)
    {
            $sql = "DELETE FROM livro_aluno WHERE id = $id";
            $this->banco->executeBD($sql);
        
    }
    //Seleciona
    public function selectBD($table, $param, $condition, $colunas = "*")
    {

        $var = (empty($param) || empty($condition)) ? $this->banco->requestBD($table, null, null) : $this->banco->requestBD($table, $param, $condition);
        return $var;
    }
    //Muda os dados de uma coluna da tabela{}
    function updateBD($table, $coluna, $valor, $conditionBD, $condition)
    {
        $this->banco->updateBD($table, $coluna, $valor, $conditionBD, $condition);
    }
}
class BD_Config
{
    private $hostname = 'localhost';
    private $password = 'root';
    private $bd = 'teste';
    private $con;
    function closeBD()
    {
        try {
            $this->con->close();
        } catch (mysqli_sql_exception $exp) {
            // echo "Erro no fechamento do banco de dados";
        }
    }
    public function openBD()
    {
        try {
            $this->con = new mysqli($this->hostname, "root", $this->password, $this->bd);
        } catch (mysqli_sql_exception $exp) {
            echo "Erro na coneção com banco de dados";
        }
    }
    //Faz um select pra o banco de dados mandando o nome da tabela condição desejada da tabela, a comparação,e as colunas desejadas da tabela


    public function requestBD($table, $conditionBD, $condition, $colunas = "*")
    {

        $sql = (!empty($condition) && !empty($conditionBD)) ? "SELECT $colunas FROM $table WHERE $conditionBD = '$condition';" : "SELECT * FROM $table;";
        $this->openBD();
        $result = $this->con->query($sql);
        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($rows, $row);
            }
        }
        $this->con->close();
        return $rows;
    }
    public function executeBD($sql)
    {

        // echo $sql;
        $this->openBD();
        $prepare = $this->con->prepare($sql);
        if ($prepare->execute() == true) {
            $this->closeBD();
            // echo "foi";
            return true;
        } else {
            $this->closeBD();
            return false;
        }
    }
    public function updateBD($table, $coluna, $valor, $conditionBD, $condition)
    {
        $sql = "UPDATE $table SET $coluna = ? WHERE $conditionBD = ?";
        $this->openBD();
        $prepare = $this->con->prepare($sql);
        // Bind dos parâmetros
        $prepare->bind_param("ss", $valor, $condition);

        if ($prepare->execute() === true) {
            // echo 'Funcionou!';
        } else {
            // echo 'Erro: ' . $prepare->error;
        }

        $this->closeBD();
    }
}
