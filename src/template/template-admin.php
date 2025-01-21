<!-- CONTENUTO PRINCIPALE -->
  <main class="container my-5">
    <h2 class="fw-bold mb-4">Gestione Prodotti</h2>

    <div class="d-flex justify-content-end">
        <a <?php isActive("admin-addproduct.php")?> href="admin-addproduct.php">
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
            <th>Stock</th>
            <th class="d-none d-md-table-cell">Immagine</th>
            <th class="d-none d-md-table-cell">Descrizione</th>
            <th>Aggiungi/Rimuovi</th>
          </tr>
        </thead>
      <tbody>
      <?php foreach ($templateParams["products"] as $product): ?>
      <tr>
        <td><?php echo $product["name"]; ?></td>
        <td>€<?php echo $product["price"]; ?></td>
        <td><?php echo $product["stock"]; ?></td>
        <td class="d-none d-md-table-cell"><img class="img-fluid" style="max-width: 70px;" src="<?php echo UPLOAD_DIR . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>"></td>
        <td class="d-none d-md-table-cell"><?php echo $product["description"]; ?></td>
        <td>
            <a <?php isActive("admin-modifica.php")?> href="admin-modifica.php?id=<?php echo $product["id_product"]; ?>" class="d-inline-block">
              <button class="btn btn-warning btn-sm m-1">
              <i class="bi bi-pencil-square">Modifica</i>
              </button>
            </a>
            <a href="admin-manage-product.php?action=del&id=<?php echo $product["id_product"]; ?>" class="d-inline-block">
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
          <button class="btn btn-danger btn-md fw-bold logoutButton">
            Logout
          </button>
    </div>
  </main>