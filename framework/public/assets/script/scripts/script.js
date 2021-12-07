console.log("wsh bien ou quoi ?");
logout = document.getElementById("logout");

if (logout) {
    logout.addEventListener("click", () => {
        if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?  ")) {
            logout.value = "true";
        }

    })
}