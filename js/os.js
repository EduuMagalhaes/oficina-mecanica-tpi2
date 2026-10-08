document.getElementById("veiculo").addEventListener("input", (e) => {
    e.target.value = e.target.value.replace(/[^a-zA-Z0-9]/g, "").toUpperCase().slice(0, 7);
});