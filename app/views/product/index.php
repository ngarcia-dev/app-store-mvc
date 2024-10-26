<h2>Lista de Productos</h2>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Categoría</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product): ?>
      <tr>
        <td><?php echo htmlspecialchars($product['name']); ?></td>
        <td><?php echo htmlspecialchars($product['price']); ?></td>
        <td><?php echo htmlspecialchars($product['stock']); ?></td>
        <td><?php echo htmlspecialchars($product['category_id']); ?></td>
        <td>
          <a href="/products/edit/<?php echo htmlspecialchars($product['id']); ?>">Editar</a>
          <form action="/products/delete/<?php echo htmlspecialchars($product['id']); ?>" method="POST" style="display:inline;">
            <button type="submit">Eliminar</button>
          </form>
          <a href="/products/show/<?php echo htmlspecialchars($product['id']); ?>">Ver Detalles</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>