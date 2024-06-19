<template>
   <div class="layout-container">
    <header class="header">
      <div class="div_imagem">
        <img class="imagem" src="../Assets/voxlabs.png" width="50px">VoxLabs
      </div>
      <nav class="navbar">
        <ul class="ul_header">
          <a href="">Home</a>
          <a href="">Produtos</a>
          <a href="">Contatos</a>
        </ul>
      </nav>
    </header>
    <main class="main-content">
      <slot></slot>
    </main>
    <footer class="footer">
      <p>© 2024 Lucas Oliveira - Todos os direitos reservados.</p>
    </footer>
  </div>


</template>

<script setup>


</script>

<style scoped>

*{
  margin: 0px;
  padding: 0px;
  overflow-x: hidden;
}

.layout-container {
  display: flex;
  flex-direction: column;
  background-color: #022B42;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  color: white; /* Para que o texto fique legível sobre o fundo escuro */
  font-family: Arial, sans-serif;
}

.header {
  display: flex;
  align-items: center;
  justify-content:space-between;
  background-color: #003554; /* Um tom ligeiramente diferente para o header e o footer */
  padding: 20px;
  text-align: center;
  border-bottom: 1px solid white;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  border-radius: 10px 10px 600px 20px;
}

.div_imagem{
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 25px;
  gap: 10px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.imagem{
  width: 50px;
  margin-left: 60px;
}

a{
  text-decoration: none;
  color: white;
  transition: color 0.1s ease-in-out;
  padding: 10px;
  position: relative;
  font-size: 20px;
 
}

a:after{
  content: '';
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: #ffffff;
  visibility: hidden;
  transform: scaleX(0);
  transition: all 0.3s ease-in-out;
}

a:hover:after, a.active:after{
  visibility: visible;
  transform: scaleX(1);
}

.ul_header{
  display: flex;
  justify-content: space-between;
  margin-right: 150px;
  gap: 30px;
}

.footer {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #003554; /* Um tom ligeiramente diferente para o header e o footer */
  padding: 20px;
  text-align: center;
  bottom: 0;
  position: relative;
  border-top: 1px solid white;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size: 20px;
  border-radius: 600px  10px 10px 20px;
}

.main-content {
  flex: 1;
  padding: 20px;
}

</style>