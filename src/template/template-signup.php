<main>
            <section class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10 col-md-6">
                            <!-- Titolo -->
                            <h2 class="fw-bold mb-3">Registrazione</h2>
                            <!-- Form di registrazione -->
                            <form action="signup.php" method="POST">
                                <!-- Nome -->
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-semibold">Nome</label>
                                    <input type="text" class="form-control input-custom" id="name" name="name" placeholder="Inserisci il tuo nome" required/>
                                </div>
                                <!-- Cognome -->
                                <div class="mb-3">
                                    <label for="surname" class="form-label fw-semibold">Cognome</label>
                                    <input type="text" class="form-control input-custom" id="surname" name="surname" placeholder="Inserisci il tuo cognome" required/>
                                </div>
                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="username" class="form-label fw-semibold">Username</label>
                                    <input type="text" class="form-control input-custom" id="username" name="username" placeholder="Crea un username unico" required/>
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control input-custom" id="email" name="email" placeholder="Inserisci la tua email" required/>
                                </div>
                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-semibold">Password</label>
                                    <input type="password" class="form-control input-custom" id="password" name="password" placeholder="Crea una password" required/>
                                </div>
                                <?php if(isset($templateParams["erroreSignup"])): ?>
                                <p><?php echo $templateParams["erroreSignup"]; ?></p>
                                <?php endif; ?>
                                <!-- Bottone Registrati -->
                                <button type="submit" class="btn fw-bold mt-2 bg-warning">Registrati</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>