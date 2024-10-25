<?php

declare(strict_types=1);

class Product
{
  private $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  public function getAllProducts()
  {
    $query = "SELECT * FROM products";
    $stmt = $this->db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getProductById($id)
  {
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function createProduct($name, $description, $price, $stock, $category_id)
  {
    $query = "INSERT INTO products (name, description, price, stock, category_id, created_at, updated_at) VALUES (:name, :description, :price, :stock, :category_id, NOW(), NOW())";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':category_id', $category_id);
    return $stmt->execute();
  }

  public function updateProduct($id, $name, $description, $price, $stock, $category_id)
  {
    $query = "UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, category_id = :category_id, updated_at = NOW() WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':category_id', $category_id);
    return $stmt->execute();
  }

  public function deleteProduct($id)
  {
    $query = "DELETE FROM products WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
}
