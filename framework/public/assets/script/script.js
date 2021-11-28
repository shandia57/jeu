console.log("it's like a bird, but, it's not a bird");

function setInfoUser(target) {
    document.getElementById("id_user").value = target.children[0].innerText;
    document.getElementById("username").innerText = target.children[1].innerText;
    document.getElementById("firstName").value = target.children[2].innerText;
    document.getElementById("lastName").value = target.children[3].innerText;
    document.getElementById("mail").value = target.children[4].innerText;

    let roles = document.getElementById("roles");
    if (target.children[5].innerText === "ROLES_ADMIN") {
        roles.options[roles.selectedIndex] = roles.options[0]
    } else if (target.children[5].innerText === "USER") {
        roles.options[roles.selectedIndex] = roles.options[1];
    }
}


