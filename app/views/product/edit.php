<h2>Editar Producto</h2>

<form action="/products/update/<?php echo htmlspecialchars($product['id']); ?>" method="POST">
  <label for="name">Nombre:</label>
  <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>

  <label for="price">Precio:</label>
  <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

  <label for="description">Descripción:</label>
  <textarea id="description" name="description"><?php echo htmlspecialchars($product['description']); ?></textarea>

  <label for="stock">Stock:</label>
  <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>

  <label for="category_id">Categoría:</label>
  <select id="category_id" name="category_id">
    <option value="<?php echo htmlspecialchars($product['category_id']); ?>">Selecciona una categoría</option>
    <option value="1">Electronica</option>
  </select>

  <button type="submit">Actualizar</button>
  <a href="/products">Volver</a>
</form>