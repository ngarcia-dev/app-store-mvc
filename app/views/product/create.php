<h2>Agregar Nuevo Producto</h2>

<form action="/products/store" method="POST">
  <label for="name">Nombre:</label>
  <input type="text" id="name" name="name" required>

  <label for="price">Precio:</label>
  <input type="text" id="price" name="price" required>

  <label for="description">Descripción:</label>
  <textarea id="description" name="description" required></textarea>

  <label for="stock">Stock:</label>
  <input type="number" id="stock" name="stock" required>

  <label for="category_id">Categoría:</label>
  <select id="category_id" name="category_id">
    <option value="">Selecciona una categoría</option>
    <option value="1">Electronica</option>
  </select>

  <button type="submit">Guardar</button>
</form>