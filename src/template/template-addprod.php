<div class="container mt-5">
    <h1 class="m-4">Aggiungi un nuovo prodotto</h1>
    <form class="m-4" action="manage-product.php?action=add" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="name">Nome del prodotto:</label>
            <input type="text" class="form-control" id="name" name="name" required/>
        </div>

        <div class="form-group mb-3">
            <label for="price">Prezzo:</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required/>
        </div>

        <div class="form-group mb-3">
            <label for="description">Descrizione:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Immagine del prodotto:</label>
            <input type="file" class="form-control-file" id="img" name="img" accept="img/*" required/>
        </div>

        <div class="form-group mb-3">
            <label for="stock">Numero in stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" required/>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Aggiungi Prodotto</button>
        </div>      
    </form>
</div>
