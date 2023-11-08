<div id="reload-container">
  <div class="spinner-border" role="status">
</div>
</div>

<script>
  var timeoutId;

  // Quando a página for carregada
  window.addEventListener("load", function () {
    // Defina um atraso de 3 segundos (3000 milissegundos) antes de esconder o contêiner
    timeoutId = setTimeout(function () {
      // Esconda o contêiner de recarregamento
      document.getElementById("reload-container").style.display = "none";
      // Mostre o conteúdo da página
      document.getElementById("page-content").style.display = "block";
    }, 1000); // 3000 milissegundos = 3 segundos
  });

  // Se você deseja cancelar o temporizador antes dos 3 segundos
  document.getElementById("cancel-button").addEventListener("click", function () {
    clearTimeout(timeoutId);
  });
</script>