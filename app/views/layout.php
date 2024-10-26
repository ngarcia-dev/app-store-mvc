<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Productos</title>
  <link rel="stylesheet" href="css/styles.css"> <!-- Incluye tu CSS -->
</head>

<body>
  <header>
    <h1>Tienda de Productos</h1>
    <nav>
      <ul>
        <li><a href="/products">Productos</a></li>
        <li><a href="/products/create">Agregar Producto</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <?php include(__DIR__ . $view); ?> <!-- Aquí se incluirá la vista específica -->
  </main>

  <footer>
    <p>&copy; 2024 Tu Tienda</p>
  </footer>
</body>

</html>