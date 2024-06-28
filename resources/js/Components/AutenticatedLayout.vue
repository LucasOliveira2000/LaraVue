<template>
    <div class="layout-container">
        <header class="header">
            <div class="div_imagem">
                <img class="imagem" src="../Assets/voxlabs.png" width="50px">VoxLabs
            </div>
            <nav class="navbar">
                <ul class="ul_header">
                    <a href="/home">Home</a>
                    <a href="/produto/home">Produtos</a>
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

* {
  margin: 0px;
  padding: 0px;
  overflow-x: hidden;
  box-sizing: border-box;
}

.layout-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: #022B42;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  color: white;
}

.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background-color: #003554;
  padding: 20px;
  text-align: center;
  border-bottom: 1px solid white;
  border-radius: 10px 10px 600px 20px;
}

.div_imagem {
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 25px;
  gap: 10px;
}

.imagem {
  width: 50px;
  margin-left: 60px;
}


.navbar ul {
  display: flex;
  gap: 30px;
  list-style: none;
  margin-right: 60px;
}

.navbar a {
  text-decoration: none;
  color: white;
  transition: color 0.1s ease-in-out;
  padding: 10px;
  font-size: 20px;
  position: relative;
}

.navbar a:after {
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

.navbar a:hover:after, .navbar a.active:after {
  visibility: visible;
  transform: scaleX(1);
}

.main-content {
  flex: 1;
  padding: 20px;
  background-color: #022B42;
}

.footer {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  background-color: #003554;
  padding: 20px;
  border-top: 1px solid white;
  font-size: 20px;
  border-radius: 600px 10px 10px 20px;
}

</style>
