<?php require BASE_PATH . "/views/partials/head.php"; ?>
<?php require BASE_PATH . "/views/partials/nav.php"; ?>
<?php $header = 'Elimina Lega'; ?>
<?php require BASE_PATH . "/views/partials/banner.php"; ?>

<main class="flex-grow">

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <div class="w-full max-w-sm mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form class="space-y-6" method="post">
                <h1 class="mb-4">Conferma Eliminazione Lega</h1>
                <p>Sei sicuro di voler eliminare questa lega? Questa azione non può essere annullata.</p>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Inserisci la tua password
                        per confermare</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>

                <?php if ($errorMessage = SessionController::getFlash('error')): ?>
                    <div class="text-red-500 mt-2 text-sm">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php endif; ?>

                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                <input type="hidden" name="league_id" value="<?= $league_id ?>">
                <button type="submit"
                    class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Elimina Lega
                </button>
            </form>
        </div>


    </div>



























</main>

<?php require BASE_PATH . "/views/partials/footer.php"; ?>