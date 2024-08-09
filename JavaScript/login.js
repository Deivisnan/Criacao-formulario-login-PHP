function handleSubmit(event) {
    event.preventDefault(); // Impede o envio padrão do formulário

    var formData = new FormData(document.querySelector('form'));
    fetch('../php/login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            showMessage('Login bem-sucedido!', 'success');
            window.location.href = '../php/tela_inicial.php'; // Redireciona para a tela inicial html dentro do tela_incial.php
        } else {
            showMessage(data.message, 'error');
        }
    })
    .catch(error => {
        showMessage('Ocorreu um erro. Por favor, tente novamente.', 'error');
    });
}

// Função para exibir mensagens (pode ser personalizada)
function showMessage(message, type) {
    alert(message); // Exemplo simples, pode ser substituído por um pop-up mais sofisticado
}

// Adiciona um listener para o formulário
document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('form').addEventListener('submit', handleSubmit);
});
