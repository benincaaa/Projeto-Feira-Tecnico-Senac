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

// Busca e renderiza as últimas reclamações
function escapeHtml(str) {
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
}

async function loadLatestComplaints() {
    const listEl = document.getElementById('complaints-list');
    if (!listEl) return;

    try {
        const res = await fetch('php/lista_reclamacoes.php');
        if (!res.ok) throw new Error('Erro na requisição');
        const data = await res.json();

        if (!Array.isArray(data) || data.length === 0) {
            listEl.innerHTML = '<li>Nenhuma reclamação encontrada.</li>';
            return;
        }

        listEl.innerHTML = '';
        data.forEach(item => {
            const li = document.createElement('li');
            li.className = 'complaint-item';
            const date = item.criado_em ? (' em ' + escapeHtml(item.criado_em)) : '';
            li.innerHTML = `<div class="complaint-text">${escapeHtml(item.texto)}</div><div class="complaint-meta">${item.usuario_id ? 'Usuário: ' + escapeHtml(item.usuario_id) : 'Anônimo'}${date}</div>`;
            listEl.appendChild(li);
        });

    } catch (err) {
        listEl.innerHTML = '<li>Erro ao carregar reclamações.</li>';
        console.error(err);
    }
}

document.addEventListener('DOMContentLoaded', loadLatestComplaints);
