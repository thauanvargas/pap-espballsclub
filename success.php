 <?php 
session_start();
include('bd.php');
echo "<script>
var date = new Date();
date.setDate(date.getDate() + 30);
var data = date.getDate() + '-' + (\"0\" + (date.getMonth() + 1)).slice(-2) + '-' + (\"0\" + date.getFullYear()).slice(-2); 
alert('Itens serão enviados para a morada: ' + '".$_SESSION['morada']."' + '\\nCusto da entrega: ".$_SESSION['custo_total']." \\nEntrega chegará dia: ' + data);</script>";
$url = 'index.php';
echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>