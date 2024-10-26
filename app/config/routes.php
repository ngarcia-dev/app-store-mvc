<?php

require_once __DIR__ . '/../controllers/Product.php';

// Crear la conexión a la base de datos (suponiendo que tienes un archivo de configuración de DB)
require_once __DIR__ . '/database.php';
$db = new Database(); // Conectar a la base de datos
$db = $db->connect(); // Método que devuelve la conexión

// Crear una instancia del controlador
$productController = new ProductController($db);

// Definir rutas
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Ruta para listar todos los productos
if ($requestUri === '/products' && $requestMethod === 'GET') {
  $productController->index();
}

// Ruta para mostrar el formulario de creación de un nuevo producto
elseif ($requestUri === '/products/create' && $requestMethod === 'GET') {
  $productController->create();
}

// Ruta para almacenar un nuevo producto
elseif ($requestUri === '/products/store' && $requestMethod === 'POST') {
  $productController->store();
}

// Ruta para mostrar los detalles de un producto
elseif (preg_match('/^\/products\/show\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'GET') {
  $productController->show($matches[1]);
}

// Ruta para mostrar el formulario de edición de un producto
elseif (preg_match('/^\/products\/edit\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'GET') {
  $productController->edit($matches[1]);
}

// Ruta para actualizar un producto
elseif (preg_match('/^\/products\/update\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'POST') {
  $productController->update($matches[1]);
}

// Ruta para eliminar un producto
elseif (preg_match('/^\/products\/delete\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'POST') {
  $productController->delete($matches[1]);
}

// Si no se encuentra la ruta
else {
  header("HTTP/1.0 404 Not Found");
  echo "404 Not Found";
}
