const botao = document.querySelector("#btnCarregar");
const statusEl = document.querySelector("#status");
const lista = document.querySelector("#listaProdutos");

botao.addEventListener("click", carregarProdutos);

async function carregarProdutos() {
  try {
    statusEl.textContent = "Carregando...";
    lista.innerHTML = "";

    const resposta = await fetch("api/produtos.php");

    if (!resposta.ok) {
      throw new Error(`Erro HTTP: ${resposta.status}`);
    }

    const dados = await resposta.json();

    if (!dados.ok) {
      throw new Error(dados.mensagem || "Erro desconhecido");
    }

    renderizarProdutos(dados.produtos);
    statusEl.textContent = "Produtos carregados.";
  } catch (erro) {
    statusEl.textContent = "Falha ao carregar produtos.";
    console.error(erro);
  }
}

function renderizarProdutos(produtos) {
  lista.innerHTML = "";

  produtos.forEach(produto => {
    const item = document.createElement("li");
    item.textContent = `${produto.nome} - R$ ${produto.preco}`;
    lista.appendChild(item);
  });
}