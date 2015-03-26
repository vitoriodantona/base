<?php
use Symfony\Component\HttpFoundation\Response;
require_once __DIR__.'../../vendor/autoload.php';
$app = new Silex\Application();
$app->error(function (\Exception $e, $code) { return new Response($e->getMessage()); });
$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});

$app->get('/uf/{format}', function ($format = null) use ($app) {
require_once '../src/model/Ufmodel.php';

	if ($format == "html") {
		require_once '../src/view/Ufview.html.php';
	} elseif ($format == "json") {
		require_once '../src/view/Ufview.json.php';
	} else {
		throw new Exception('Formato Inválido, valores esperados: html e json');
	}	

return $retorno;	
});

$app->run();