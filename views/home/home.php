<!DOCTYPE html>
<!DOCTYPE html>
<html lang="it">

<head>
    <link rel="icon" sizes="32x32" href="<?= '/favicon.png' ?>" ">
    <meta charset=" UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lega Padel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <nav class="bg-white p-6">
        <div class="container mx-auto flex items-center justify-between">
            <div>
                <a href="/" class="text-lg font-semibold text-gray-800">Lega Padel</a>
            </div>
            <div class="flex items-center">
                <a href="/login" class="text-gray-800 hover:text-gray-500 mx-2">Accedi</a>
                <a href="/register" class="bg-blue-700 hover:bg-blue-800 text-white px-3 py-2 rounded">Registrati</a>
            </div>
        </div>
    </nav>

    <header class="bg-gray-600 text-white text-center py-16">
        <h1 class="text-4xl font-bold">Benvenuto su Liga-Padel.pt</h1>
        <p class="text-xl mt-2">La piattaforma che ti permette di professionalizzare le tue partite amichevoli di Padel.
        </p>
        <button onclick="location.href='/register'" type="button"
            class="mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-semibold rounded-lg text-lg px-14 py-4 mr-2 mb-2">
            Unisciti a noi!
        </button>

    </header>
    <main class="container flex-grow mx-auto px-6 py-8">
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded shadow space-y-6">
                <h3 class="text-xl font-bold mb-4">Alcuni numeri:</h3>

                <div class="flex space-x-6">
                    <!-- Card para Jogos -->
                    <div class="flex-1 bg-gray-100 p-4 rounded shadow-md">
                        <h4 class="text-lg font-bold mb-2">Totale Partite:</h4>
                        <p class="text-2xl text-gray-700"><?= $totalGames ?></p>
                    </div>

                    <!-- Card para Ligas -->
                    <div class="flex-1 bg-gray-100 p-4 rounded shadow-md">
                        <h4 class="text-lg font-bold mb-2">Totale Leghe:</h4>
                        <p class="text-2xl text-gray-700"><?= $totalLeagues ?></p>
                    </div>
                </div>
            </div>



            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-bold">Si sono uniti a noi recentemente:</h3>
                <?php foreach ($latestMembers as $user): ?>
                    <div class="flex items-center mt-4">
                        <img class="w-8 h-8 rounded-full mr-2" src="<?= $user['avatar'] ?>"
                            alt="<?= $user['nome_utilizador'] ?>'s avatar">
                        <p class="text-gray-600"><?= $user['nome_utilizador'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </main>
    <?php require BASE_PATH . "/views/partials/footer.php"; ?>
</body>

</html>