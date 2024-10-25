<?php

require_once __DIR__ . '/../model/Product.php';

class ProductController
{
  private $productModel;

  public function __construct($db)
  {
    $this->productModel = new Product($db);
  }

  public function index()
  {
    $products = $this->productModel->getAllProducts();
    require 'view/product/index.php';
  }

  public function create()
  {
    require 'view/product/create.php';
  }

  public function store()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $stock = $_POST['stock'];
      $category_id = $_POST['category_id'];

      $this->productModel->createProduct($name, $description, $price, $stock, $category_id);
      header('Location: /products');
      exit;
    }
  }

  public function edit($id)
  {
    $product = $this->productModel->getProductById($id);
    require 'view/product/edit.php';
  }

  public function update($id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $stock = $_POST['stock'];
      $category_id = $_POST['category_id'];

      $this->productModel->updateProduct($id, $name, $description, $price, $stock, $category_id);
      header('Location: /products');
      exit;
    }
  }

  public function delete($id)
  {
    $this->productModel->deleteProduct($id);
    header('Location: /products');
    exit;
  }
}
