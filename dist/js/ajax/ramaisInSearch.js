document.getElementById('ajax').addEventListener('input', function () {
    var search = document.getElementById('ajax').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                var resposta = JSON.parse(xhr.responseText);
                mostrarResultados(resposta); // Chama a função para mostrar os resultados
            } catch (error) {
                console.error("Error parsing JSON response:", error); // Handle JSON parsing errors
            }
        }
    };

    if (search.trim() === '') { // Verifica se o campo de pesquisa está vazio
        xhr.open('GET', 'App/Controler/RamaisInSearch/Search.php', true); // Requisição para buscar todos os resultados
    } else {
        xhr.open('GET', 'App/Controler/RamaisInSearch/Search.php?ajax=' + search, true); // Requisição para buscar os resultados da pesquisa
    }
    xhr.send();
});

var search = document.getElementById('ajax').value;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
        try {
            var resposta = JSON.parse(xhr.responseText);
            mostrarResultados(resposta); // Chama a função para mostrar os resultados
        } catch (error) {
            console.error("Error parsing JSON response:", error); // Handle JSON parsing errors
        }
    }
};
if (search.trim() === '') { // Verifica se o campo de pesquisa está vazio
    xhr.open('GET', 'App/Controler/RamaisInSearch/Search.php', true); // Requisição para buscar todos os resultados
    xhr.send();
}


// Função para mostrar os resultados na página
function mostrarResultados(resultados) {
    var contentDiv = document.getElementById('Content');
    contentDiv.innerHTML = ''; // Limpa o conteúdo atual dos cards

    resultados.forEach(function (resultado) {
        var cardHtml = `
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column item">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="lead"><b>${resultado.setor} - ${resultado.nome}</b></h2>
                                <p class="text-muted text-sm"><b>Responsaveis:</b>${resultado.responsavel}</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="great"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefone/Ramal: <b>${resultado.numero}</b></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
        contentDiv.insertAdjacentHTML('beforeend', cardHtml); // Adiciona o card ao final do conteúdo
    });
}
