<style>
  /* Estilo para o modo escuro */
  .dark-mode-toggle.dark-mode i.fa-sun {
    color: #fff;
  }

  /* Estilo para o modo claro */
  .dark-mode-toggle:not(.dark-mode) i.fa-moon {
    color: #000;
  }

  .dark-mode-toggle .toggle-label {
    color: #fff;
  }
</style>

<!-- dark-Mode -->
<li class="nav-item">
  <a class="nav-link" href="#" role="button" id="dark-mode-toggle">
    <i class="fa-solid fa-moon" style="color: black"></i>
  </a>
</li>

<script>
    // Recuperar a preferência do usuário do armazenamento local
    const savedDarkMode = localStorage.getItem('dark-mode');
    if (savedDarkMode === 'true') {
      document.body.classList.add('dark-mode');
      const icon = document.querySelector('#dark-mode-toggle i');
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
      const label = document.querySelector('#dark-mode-toggle .toggle-label');
      // label.textContent = 'Light';
    }

    // Adicionar um listener de evento para o botão
    document.getElementById('dark-mode-toggle').addEventListener('click', function () {
    // Alternar a classe dark-mode no elemento body
    document.body.classList.toggle('dark-mode');

    // Alterar o ícone de acordo com o modo
    const isDarkMode = document.body.classList.contains('dark-mode');
    const icon = document.querySelector('#dark-mode-toggle i');
    if (isDarkMode) {
      icon.classList.remove('fa-moon');
      icon.classList.add('fa-sun');
    } else {
      icon.classList.remove('fa-sun');
      icon.classList.add('fa-moon');
    }

    // Atualizar o rótulo do botão
    // const label = document.querySelector('#dark-mode-toggle .toggle-label');
    // if (isDarkMode) {
    //   label.textContent = "Light";
    // } else {
    //   label.textContent = 'Dark';
    // }

    // Salvar a preferência do usuário no armazenamento local
    localStorage.setItem('dark-mode', isDarkMode);
    console.log('dark-mode salvo no localStorage:', localStorage.getItem('dark-mode'));
  });
</script>
