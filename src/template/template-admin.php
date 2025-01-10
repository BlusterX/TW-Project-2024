<!-- CONTENUTO PRINCIPALE -->
  <main class="container my-5">
    <h2 class="fw-bold mb-4">Gestione Prodotti</h2>

    <div class="d-flex justify-content-end">
        <a <?php isActive("addproduct.php")?> href="addproduct.php">
          <button type="button" class="btn btn-success mb-3">
            <i class="bi bi-plus-lg">Aggiungi Prodotto</i>
          </button>
        </a>
    </div>

    <table class="table table-bordered table-hover align-middle table-responsive-sm">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Prezzo</th>
          <th>Immagine</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($templateParams["products"] as $product): ?>
        <tr>
            <td><?php echo $product["name"]; ?></td>
            <td>€<?php echo $product["price"]; ?></td>
            <td><img src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>" width="60"></td>
            <td>
            <a href="manage-product.php?action=mod&id=<?php echo $product["id_product"]; ?>">
            <button class="btn btn-warning btn-sm m-1">
              <i class="bi bi-pencil-square">Modifica</i>
            </button>
            </a>
            <a href="manage-product.php?action=del&id=<?php echo $product["id_product"]; ?>">
            <button class="btn btn-danger btn-sm m-1">
              <i class="bi bi-trash">Elimina</i>
            </button>
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        <a href="login.php?logout=true">
      <button class="btn btn-danger btn-md fw-bold">
        Logout
      </button>
        </a>
    </div>
  </main>