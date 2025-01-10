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
        <tr>
          <td>PlayStation 5</td>
          <td>499,99€</td>
          <td><img src="<?php echo UPLOAD_DIR . "prova.png" ; ?>" alt="PS5" width="60"></td>
          <td>
            <button class="btn btn-warning btn-sm m-1">
              <i class="bi bi-pencil-square">Modifica</i>
            </button>
            <button class="btn btn-danger btn-sm m-1">
              <i class="bi bi-trash">Elimina</i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
      <button class="btn btn-danger btn-md fw-bold">
        Logout
      </button>
    </div>
  </main>