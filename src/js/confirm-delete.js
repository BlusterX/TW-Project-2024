document.querySelectorAll('.confirmDelete').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.getAttribute('data-id');
        const modalHTML = `
        <div class="modal fade confirmModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sei sicuro di voler procedere all'eliminazione?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
                        <a href="api/admin-manage-product.php?action=del&id=${productId}" class="btn btn-danger w-25">Sì</a>
                    </div>
                </div>
            </div>
        </div>
        `;

        const body = document.querySelector('body');
        body.insertAdjacentHTML('beforeend', modalHTML);

        const modalElement = document.querySelector('.confirmModal');

        const confirmDeleteModal = new bootstrap.Modal(modalElement);
        confirmDeleteModal.show();

        modalElement.addEventListener('hidden.bs.modal', function () {
            modalElement.remove();
        });
    });
});