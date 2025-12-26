<!-- open games -->
<div class="bg-white shadow-md rounded-lg overflow-hidden p-4 grid-cols-1 md:grid-cols-4 gap-4 md:col-span-2">
    <h2 class="text-2xl font-bold mb-2">Partite Aperte</h2>
    <div class="overflow-y-auto max-h-[300px]">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Data
                    </th>
                    <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ora
                    </th>
                    <th class="px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Luogo
                    </th>
                    <th class="hidden md:block px-4 py-2 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Iscritti
                    </th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Azioni
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($openLeagueGames as $game) { ?>
                    <tr class="text-center">
                        <!-- Encurtando a exibição da data para "dd/mm" -->
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars((new DateTime($game['data_hora']))->format("d/m")) ?></td>
                        <td class="px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars((new DateTime($game['data_hora']))->format("H:i")) ?></td>
                        <td
                            class="px-2 py-4 whitespace-nowrap text-sm text-gray-500 truncate whitespace-normal break-words w-[150px]">
                            <?= htmlspecialchars($game['local']) ?></td>
                        <td class="hidden md:block px-2 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= count(GameController::getPlayersInGame($game['id'])) ?>/4</td>
                        <td class="px-4 py-2">
                            <div class="flex items-center justify-center">
                                <!-- Redução no tamanho do botão -->
                                <a class="inline-flex items-center justify-center px-3 py-1 text-xs font-medium text-white uppercase transition bg-indigo-600 rounded shadow ripple hover:shadow-lg hover:bg-indigo-800 focus:outline-none"
                                    href="/game?id=<?= htmlspecialchars($game['id']) ?>">
                                    Vedi
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>