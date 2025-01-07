<!-- Contenuto principale -->
<main>
            <!-- Sezione benvenuto + button registrazione -->
            <section class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-6 text-center p-4 mb-4" style="background-color: #fce948; border-radius: 8px;">
                            <h2 class="fw-bold">Benvenuto!</h2>
                            <p class="mb-3">Se non hai un account:</p>
                            <a href="signup.php" class="btn btn-warning fw-bold" style="color: #000000;">Registrati</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Sezione Login -->
            <section class="pb-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-6">
                            <h3 class="fw-bold mb-3">Login:</h3>
                            <form action="login.php" method="POST">
                                <!-- Campo Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" style="background-color: #fcefa1;" placeholder="Inserisci la tua email">
                                </div>
                                <!-- Campo Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" style="background-color: #fcefa1;" placeholder="Inserisci la tua password">
                                </div>
                                <?php if(isset($templateParams["erroreLogin"])): ?>
                                <p><?php echo $templateParams["erroreLogin"]; ?></p>
                                <?php endif; ?>
                                <!-- Bottone Login -->
                                <button type="submit" class="btn btn-warning fw-bold" style="color: #000000;">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>