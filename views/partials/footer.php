</div>
<footer class="bg-white p-6 text-center">
    <p class="text-gray-800">&copy; 2023 Liga-Padel. Tutti i diritti riservati.</p>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let notificationButton = document.querySelector("#notification-button");
        let notificationDropdown = document.querySelector("#notification-dropdown");
        let userMenuButton = document.querySelector("#user-menu-button");
        let userMenu = document.querySelector("#user-menu");

        notificationButton.addEventListener('click', function () {
            let displayState = notificationDropdown.style.display;
            notificationDropdown.style.display = displayState === "none" ? "block" : "none";
        });

        userMenuButton.addEventListener('click', function () {
            let displayState = userMenu.style.display;
            userMenu.style.display = displayState === "none" ? "block" : "none";
        });
    });

    document.addEventListener('click', function (event) {
        let isClickInsideNotification = document.getElementById('notification-dropdown').contains(event.target);
        let isNotificationButton = document.getElementById('notification-button').contains(event.target);

        let isClickInsideUserMenu = document.getElementById('user-menu').contains(event.target);
        let isUserMenuButton = document.getElementById('user-menu-button').contains(event.target);

        if (!isClickInsideNotification && !isNotificationButton) {
            let dropdown = document.getElementById('notification-dropdown');
            dropdown.style.display = 'none';
        }

        if (!isClickInsideUserMenu && !isUserMenuButton) {
            let userMenu = document.getElementById('user-menu');
            userMenu.style.display = 'none';
        }


    });

    function setScore(inputId, score) {
        document.getElementById(inputId).value = score;
    }

    function updateScore(scoreId, value, buttonClass) {
        // Aggiorna il valore del punteggio
        document.getElementById(scoreId).value = value;

        // Ottiene tutti i bottoni della squadra
        var buttons = document.getElementsByClassName(buttonClass);

        // Percorre tutti i bottoni della squadra
        for (var i = 0; i < buttons.length; i++) {
            // Se il bottone è quello cliccato, aggiunge la classe 'bg-indigo-600' per marcarlo
            // Altrimenti, rimuove la classe per desmarcare gli altri
            if (buttons[i].innerHTML == value) {
                buttons[i].classList.add('bg-indigo-600');
            } else {
                buttons[i].classList.remove('bg-indigo-600');
            }
        }
    }


</script>

</body>

</html>