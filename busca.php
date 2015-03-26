<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, user-scalable=no">
<title>SINTRAPAV</title>

<style type="text/css">
<!--
/* body { 
color:#003399;
background:#eee;
margin:0; padding:0;
font: 12px Arial, Helvetica, sans-serif;
text-align:center;
}
*/
    html, body {
      margin: 0;
      padding: 0;
      vertical-align: top;
	  font: 12px Arial, Helvetica, sans-serif;

    }

    h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,cite,code,del,dfn,em,img,q,s,samp,small,strike,strong,sub,sup,tt,var,dd,dl,dt,li,ol,ul,fieldset,form,label,legend,button,table,caption,tbody,tfoot,thead,tr,th,td 
    {
      margin: 0;
      padding: 0;
      border: 0;
      font-weight: normal;
      font-style: normal;
      font-size: 100%;
      line-height: 1;
      font-family: inherit;
      vertical-align: middle;
    }  
input {
height: 60px;
}
.busca {
border:1px solid #000000;
height: 60px;
width: 300px;
padding-left:5px;
font-family:verdana;
font-size:30px;
font-weight:bold;
color:#315595;
}
.botao_busca {
height: 60px;
padding-left:5px;
font-family:verdana;
font-size:30px;
font-weight:bold;
color:#315595;
}
.table1 {
height:40px;
width:100%;
border: 1px solid #000000;
vertical-align:center;
padding-top:2px;
}
a {
color:#315595;
text-decoration:none;
}

-->
</style>
</head>

<body onload="window.scrollTo(0, 1);">
<h1 align='left' style="padding:10px;">SINTRAPAV<h1>

<?php


$_BS['PorPagina'] = 50; // Número de registros por página


$_BS['MySQL']['servidor'] = 'localhost';
$_BS['MySQL']['usuario'] = 'root';
$_BS['MySQL']['senha'] = '';
$_BS['MySQL']['banco'] = 'base';
mysql_connect($_BS['MySQL']['servidor'], $_BS['MySQL']['usuario'], $_BS['MySQL']['senha']);
mysql_select_db($_BS['MySQL']['banco']);

if (@$_GET['q'] == "") {
?>
<p align="left">
<form action="busca.php" method="get">
<label id="busca"><input type="text" name="q" class="busca" value="<?php echo @$busca ?>" /><input type="submit" class="botao_busca" value="Buscar" /></label>
</form>
</p>
<?php
exit;
}

$busca = $_GET['q'];

$busca = mysql_real_escape_string($busca);


$sql = "SELECT COUNT(*) AS total FROM `base` WHERE ((`chapa` LIKE '%".$busca."%') OR (`nome` LIKE '%".$busca."%'))";
$query = mysql_query($sql);
$total = mysql_result($query, 0, 'total');
$paginas =  (($total % $_BS['PorPagina']) > 0) ? (int)($total / $_BS['PorPagina']) + 1 : ($total / $_BS['PorPagina']);


if (isset($_GET['pagina'])) {
$pagina = (int)$_GET['pagina'];
} else {
$pagina = 1;
}
$pagina = max(min($paginas, $pagina), 1);
$inicio = ($pagina - 1) * $_BS['PorPagina'];


$sql = "SELECT * FROM `base` WHERE  ((`chapa` LIKE '%".$busca."%') OR (`nome` LIKE '%".$busca."%')) ORDER BY `nome` ASC LIMIT ".$inicio.", ".$_BS['PorPagina'];

$query = mysql_query($sql);


echo "<form action='busca.php' method='get'>";
echo "<label id='busca'><p align='left'>&nbsp;&nbsp;<input type='text' class='busca' name='q' value='$busca' autocomplete='off' /><input type='submit' class='botao_busca' value='Buscar'  /></p></label>";
echo "</form>";


echo "<table width='100%'>";
while ($resultado = mysql_fetch_assoc($query)) {

echo "<td class='table1'>".$resultado['chapa']." - " . $resultado['nome']."</td><td class='table1'><a href='editar.php?id=",$resultado['chapa']."'>Editar</a><tr>\n";
 print mysql_error(); 
}
echo "</table>";


if ($total > $_BS['PorPagina']) {
if ($total > 0) {
	echo "<p align='left' style='padding-left:4px;'>";
for($n = 1; $n <= $paginas; $n++) {
echo '<a style="font-size:large;" href="?q='.@$_GET['q'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
}
echo "</p>";
}
}
echo "<br>";

?>