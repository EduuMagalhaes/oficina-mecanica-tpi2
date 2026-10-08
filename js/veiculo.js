const ano = document.getElementById("ano");
ano.max = new Date().getFullYear() + 1;

const msg = document.getElementById("mensagem");

document.getElementById("placa").addEventListener("input", (e) => {
    e.target.value = e.target.value.replace(/[^a-zA-Z0-9]/g, "").toUpperCase().slice(0, 7);
});

function mostrarMensagem(texto, tipo) {
    msg.textContent = texto;
    msg.className = tipo;
}

async function botaoCadastrarVeiculo() {
    const formulario = document.getElementById("form-veiculo");
    const dados = new FormData(formulario);

    try {
        const resposta = await fetch("php/veiculo.php", {
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