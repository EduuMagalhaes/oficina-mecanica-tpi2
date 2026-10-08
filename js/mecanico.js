const admissao = document.getElementById("admissao");
const hoje = new Date().toISOString().split("T")[0];
admissao.max = hoje;
const msg = document.getElementById("mensagem");

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

async function botaoCadastrarMecanico() {
    const formulario = document.getElementById("form-mecanico");
    const dados = new FormData(formulario);

    try {
        const resposta = await fetch("php/mecanico.php", {
            method: "POST",
            body: dados
        });

        const resultado = await resposta.json();

        if (resultado.sucesso) {
            mostrarMensagem(resultado.mensagem, "ok");
            formulario.reset();
        } else {
            mostrarMensagem(resultado.mensagem, "erro");
        }
    } catch (erro) {
        mostrarMensagem("Erro ao enviar os dados ao servidor.", "erro");
        console.error(erro);
    }
}