document.addEventListener("DOMContentLoaded", () => {
    const campo = document.querySelector("input[name='texto']");
    
    if (!campo) return;

    campo.addEventListener("keydown", function(e) {
        if (e.key === "Enter") {
            e.preventDefault();

            const texto = campo.value.trim();
            if (texto.length === 0) return;

            window.location.href = `login.html?texto=${encodeURIComponent(texto)}`;
        }
    });
});
