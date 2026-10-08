const msg = document.getElementById("mensagem");

function mostrarMensagem(texto, tipo) {
    msg.textContent = texto;
    msg.className = tipo;
}

async function botaoCadastrarPeca() {
    const formulario = document.getElementById("form-peca");
    const dados = new FormData(formulario);

    try {
        const resposta = await fetch("php/peca.php", {
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