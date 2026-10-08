const form = document.getElementById("form-cliente");
const msg = document.getElementById("mensagem");

document.getElementById("cpf").addEventListener("input", (e) => {
    let v = e.target.value.replace(/\D/g, "").slice(0, 11);
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    e.target.value = v;
});

document.getElementById("telefone").addEventListener("input", (e) => {
    let v = e.target.value.replace(/\D/g, "").slice(0, 11);
    v = v.replace(/^(\d{2})(\d)/, "($1) $2");
    v = v.replace(/(\d{5})(\d{1,4})$/, "$1-$2");
    e.target.value = v;
});

function mostrarMensagem(texto, tipo) {
    msg.textContent = texto;
    msg.className = tipo;
}

async function botaoCadastrar() {
    const form = document.getElementById("form-cliente");

    const dados = new FormData(form);

    try {
        const resposta = await fetch("php/cliente.php", {
            method: "POST",
            body: dados
        });

        const resultado = await resposta.json();

        if (resultado.sucesso) {
            mostrarMensagem(resultado.mensagem, "ok");
            form.reset();
        } else {
            mostrarMensagem(resultado.mensagem, "erro");
        }
    } catch (erro) {
        mostrarMensagem("Erro ao enviar os dados ao servidor.", "erro");
        console.error(erro);
    }
}