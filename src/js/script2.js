document.addEventListener('DOMContentLoaded', function() {
  // Seleciona os formulários
  const dadosPessoaisForm = document.getElementById('dadosPessoaisForm');
  const senhaForm = document.getElementById('senhaForm');

  // Função para validar os campos
  function validateForm(event) {
      const inputs = event.target.querySelectorAll('input');
      let valid = true;

      // Verifica se algum campo está vazio
      inputs.forEach(input => {
          if (!input.value) {
              valid = false;
          }
      });

      // Se algum campo estiver vazio, impede o envio e exibe um alerta
      if (!valid) {
          event.preventDefault();
          alert('Por favor, preencha todos os campos obrigatórios.');
      } else {
          // Exibe a mensagem de sucesso
          event.preventDefault(); // Impede o envio real do formulário para fins de demonstração
          if (event.target.id === 'dadosPessoaisForm') {
              alert('Dados atualizados com sucesso!');
          } else if (event.target.id === 'senhaForm') {
              alert('Senha atualizada com sucesso!');
          }
          // Aqui você pode adicionar lógica para enviar o formulário via AJAX ou similar, se necessário.
      }
  }

  // Adiciona o evento de submit nos formulários
  dadosPessoaisForm.addEventListener('submit', validateForm);
  senhaForm.addEventListener('submit', validateForm);
});

const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});