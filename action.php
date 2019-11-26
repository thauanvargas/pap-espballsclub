<?php
session_start();
include('bd.php');

if(isset($_REQUEST['registar'])){
	$nome = mysqli_real_escape_string($bd,$_REQUEST['nome'] );
	$email = mysqli_real_escape_string($bd,$_REQUEST['email'] );
	$pass = mysqli_real_escape_string($bd,$_REQUEST['password'] );
	if($nome == "" || $email == "" || $pass == "")
	{
	echo "<script>alert( 'Os campos têm de estar todos preenchidos!');</script>";
	$url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	}
	else
	{
	    $sql=("INSERT INTO contas (nome, email, password) values('".$nome."','".$email."','".$pass."')");
		$result= mysqli_query($bd,$sql) or die("Sql Error".mysqli_error($bd));
		echo "<script>alert( 'Conta criada com sucesso.');</script>";
		$url = 'index.php';
		echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	}
}

if (isset($_REQUEST['updatemorada']))
{
	$morada = mysqli_real_escape_string($bd,$_REQUEST['morada']);
	if($morada == "")
	{
	echo "<script>alert( 'Os campos têm de estar todos preenchidos!');</script>";
	$url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	}
	else
	{
	    $sql=("UPDATE contas SET morada = '".$morada."' WHERE email = '".$_SESSION['email']."'");
		$result= mysqli_query($bd,$sql) or die("Sql Error".mysqli_error($bd));
		echo "<script>alert( 'Morada atualizada com sucesso.');</script>";
		$_SESSION['morada'] = $morada;
		$url = 'index.php';
		echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
	}
}

if (isset($_REQUEST['login']))
{
	$email= mysqli_real_escape_string($bd,$_REQUEST['email'] );
	$pass= mysqli_real_escape_string($bd,$_REQUEST['password'] );
	if($email=="" || $pass=="")
	{
	
	echo "<script>alert( 'Os campos devem estar prenchidos');</script>";
    $url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';  
	}
	else
	{
	    $sql= "SELECT * FROM contas where email= '".$email."' &&  password ='".$pass."'";
		$result= mysqli_query($bd,$sql) or die("Erro SQL".mysql_error());
	    $num_rows= mysqli_num_rows($result);
	   if($num_rows>0)
		{	
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $pass;
		   while($dados = mysqli_fetch_array($result)){
			   $_SESSION['nome'] = $dados['nome'];
			   if($dados['morada'] != null){
			   $_SESSION['morada'] = $dados['morada'];
			   }
		$url = 'index.php';
		echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
		
        }
		}
	    else
		{
            session_destroy();
			echo "<script>alert('Email ou password incorretos.')</script>";
            $url = 'index.php';
			echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';  
            
		}
	}
}	
?>