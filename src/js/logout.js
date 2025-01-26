const logoutButton = document.querySelector(".logoutButton");

logoutButton.addEventListener("click", function () {
    const modalHTML = `
    <div class="modal fade logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sei sicuro di voler uscire?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary w-25" data-bs-dismiss="modal">No</button>
                    <a href="login.php?logout=true" class="btn btn-danger w-25">Sì</a>
                </div>
            </div>
        </div>
    </div>
`;
    const body = document.querySelector("body");
    body.insertAdjacentHTML("beforeend", modalHTML);

    const modalElement = document.querySelector(".logoutModal");

    const logoutModal = new bootstrap.Modal(modalElement);
    logoutModal.show();

    modalElement.addEventListener("hidden.bs.modal", function () {
        modalElement.remove();
    });
});
