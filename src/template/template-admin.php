<!-- CONTENUTO PRINCIPALE -->
  <main class="container my-5">
    <h2 class="fw-bold mb-4">Gestione Prodotti</h2>

    <!-- Bottone aggiungi prodotto -->
    <div class="d-flex justify-content-end">
      <button type="button" class="btn btn-success mb-3">
        <i class="bi bi-plus-lg"></i>
        Aggiungi Prodotto
      </button>
    </div>

    <!-- Tabella prodotti -->
    <table class="table table-bordered table-hover align-middle">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Prezzo</th>
          <th>Descrizione</th>
          <th>Immagine</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody>
        <!-- Riga d'esempio. In produzione, itererai i prodotti dal DB -->
        <tr>
          <td>PlayStation 5</td>
          <td>499,99€</td>
          <td>Nuova console Sony</td>
          <td><img src="ps5.png" alt="PS5" width="60"></td>
          <td>
            <button class="btn btn-warning btn-sm">
              <i class="bi bi-pencil-square"></i>
              Modifica
            </button>
            <button class="btn btn-danger btn-sm">
              <i class="bi bi-trash"></i>
              Elimina
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </main>