const admissao = document.getElementById("admissao");
const hoje = new Date().toISOString().split("T")[0];
admissao.max = hoje;

document.getElementById("telefone").addEventListener("input", (e) => {
    let v = e.target.value.replace(/\D/g, "").slice(0, 11);
    v = v.replace(/^(\d{2})(\d)/, "($1) $2");
    v = v.replace(/(\d{5})(\d{1,4})$/, "$1-$2");
    e.target.value = v;
});