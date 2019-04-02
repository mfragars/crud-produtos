  
<?php
    include_once('Produto.php');
     $connection="mysql:host=127.0.0.1:3306;dbname=db_prod";
     $db_user="root";
     $db_pass="";
    
    

    try { 
        $pdo = new PDO($connection, $db_user, $db_pass); 
        echo "Connected successfully";
      } catch (PDOException $error) {
        echo 'Connection error: ' . $error->getMessage();
      }

      $nome="Teste";
      $preco="3.15";

        $ins = "INSERT INTO produto (nome,  preco) VALUES ('$nome', '$preco')";

    $exec = $pdo->exec($ins);

    $produtos = [];

    function inserir(Produto $produto){
        $GLOBALS['produtos'][] = $produto;
    }

    function buscarPorId($id){
        foreach($GLOBALS['produtos'] as $prod){
            if($prod->id == $id)
                return $prod;        
        }
        return null;
    }

    function listar(){
        return $GLOBALS['produtos'];        
    }

    function deletar($id)
    {
        foreach($GLOBALS['produtos'] as $i => $produto) 
        {
            if($produto->id === $id)
                array_splice($GLOBALS['produtos'],$i,1);    
        }
    }

    function atualizar($id,Produto $produtoAlterado)
    {
        foreach($GLOBALS['produtos'] as $i => $produto) 
        {
            if($produto->id === $id)
            {
                $produto->nome = $produtoAlterado->nome;    
                $produto->preco = $produtoAlterado->preco;
            }
        }
        
    }

    inserir(new Produto(1,"mesa",539.20));
    inserir(new Produto(2,"cadeira",135.30));
    inserir(new Produto(3,"TV",3000));
    inserir(new Produto(4,"radio",230));

    print_r(buscarPorId(1));
    deletar(1);
    
    $produto = buscarPorId(4);
    $produto->nome="dock";
    atualizar(4,$produto);
    
    print_r(listar());
?>
