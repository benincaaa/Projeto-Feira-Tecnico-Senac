document.addEventListener("DOMContentLoaded", () => {

    const input = document.getElementById("campoReclamacao");
    const form = document.getElementById("formReclamacao");
    const loginTexto = document.getElementById("loginTexto");

    loginTexto.style.color = "gray";
    loginTexto.style.marginLeft = "260px";
    loginTexto.style.marginTop = "5px";
    loginTexto.style.fontSize = "13px";

    input.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            e.preventDefault(); 
            form.submit();
        }
    });

});
