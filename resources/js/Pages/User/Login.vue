<template>
    <AutenticatedLayout>
      <header>
        <title>{{ props.titulo }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gelasio:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
      </header>
      <section class="section">
        <form @submit.prevent="submit" class="form" enctype="multipart/form-data">
          <div class="div_formulario">
              <div class="div_titulo">
                <h4 class="h_tituloForm">Login</h4>
              </div>
              <div class="div_conteudo" style="max-width: 400px">
                <q-input color="indigo-10" v-model="form.email" label="Email" placeholder="Digite o seu Email">
                  <template v-slot:prepend>
                    <q-icon name="email" />
                  </template>
                </q-input>
              </div>
              <div class="div_conteudo" style="max-width: 400px" >
                <q-input color="indigo-10" v-model="form.password" label="Senha" placeholder="Digite a sua Senha">
                  <template v-slot:prepend>
                    <q-icon name="password" />
                  </template>
                </q-input>
                <a href="/user/create" class="login">Se cadastre aqui!</a>
              </div>
              <div class="div_submit">
                <PrimaryButton class="submit">Salvar</PrimaryButton>
              </div>
          </div>
        </form>
      </section>
    </AutenticatedLayout>
</template>


<script setup>
    import { router } from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    import { reactive } from 'vue';
    import AutenticatedLayout from '../../Components/AutenticatedLayout.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';


    const props = defineProps({
        titulo: String,
        users: Object
    })

  const form = reactive({
      email: props.users.email,
      password: props.users.password
  });

  function submit() {
    router.post("/user/login", form);
  }

</script>

<style>

  .section{
    display: flex;
    justify-content: center;
    margin: 300px;
    background-color: #022B42;
  }

  .div_titulo{
    display: flex;
    justify-content: center;
  }

  .h_tituloForm{
    font-size: 25px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: #032030
  }

  .div_formulario{
    display: block;
    padding: 50px;
    padding-top: 10px;
    padding-bottom: 30px;
    background-color: white;
    border-radius: 5px 60px;
    box-shadow: 2px 2px 25px 2px #006DA4;
  }

  .div_conteudo{
    width: 300px;
  }

  .div_submit{
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }

  .login{
    display: flex;
    justify-content: center;
    margin-top: 15px;
    color: #032030;
    font-size: 20px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }
</style>
