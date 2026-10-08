const ano = document.getElementById("ano");
ano.max = new Date().getFullYear() + 1;

document.getElementById("placa").addEventListener("input", (e) => {
    e.target.value = e.target.value.replace(/[^a-zA-Z0-9]/g, "").toUpperCase().slice(0, 7);
});