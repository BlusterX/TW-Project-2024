<div class="container mt-5">
    <h1 class="m-4">Modifica Prodotto</h1>
    <?php $product = $templateParams["product"]; ?>
    <form class="m-4" action="admin-manage-product.php?action=mod&id=<?php echo $product["id_product"]; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="name">Nome del prodotto:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product["name"]; ?>" required/>
        </div>

        <div class="form-group mb-3">
            <label for="price">Prezzo:</label>
            €<input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $product["price"] ;  ?>" required/>
        </div>

        <div class="form-group mb-3">
            <label for="discount">Sconto (%):</label>
            <input type="number" class="form-control" id="discount" name="discount" step="1" value="<?php echo (int)$product["discount"]; ?>" min="0" max="99" required/>
        </div>

        <div class="form-group mb-3">
            <label for="final_price">Prezzo finale (con sconto):</label>
            <input type="text" class="form-control" id="final_price" readonly/>
        </div>

        <div class="form-group mb-3">
            <label for="description">Descrizione:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $product["description"];  ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="stock">Numero in stock:</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $product["stock"];  ?>" required/>
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary">Modifica Prodotto</button>
        </div>      
    </form>
</div>
