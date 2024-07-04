<template>
    <AutenticatedLayout>
        <section>
            <div class="div_titulo">
                <h1 class="h1_titulo">Produtos</h1>
            </div>

            <div class="div_botoes_principais">
                <PrimaryButton @click="cadastrar">Cadastrar</PrimaryButton>
                <PrimaryButton>Relatorio</PrimaryButton>
            </div>

            <table class="table">
                <thead class="thead_card">
                    <tr class="tr">
                        <th>ID</th>
                        <th>IMAGEM</th>
                        <th>NOME</th>
                        <th>MARCA</th>
                        <th>QUANTIDADE</th>
                        <th>VALOR COMPRADO</th>
                        <th>VALOR VENDA</th>
                        <th>AÇÕES</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="produto in produtos" :key="produto.id" class="tbody_card">
                        <td>{{ produto.id }}</td>
                        <td>
                            <img v-if="produto.imagem" :src="'/storage/produtos/' + produto.imagem" class="imagemProduto"/>
                        </td>
                        <td>{{ produto.nome }}</td>
                        <td>{{ produto.marca }}</td>
                        <td>{{ produto.quantidade }}</td>
                        <td>R$ {{ produto.valor_compra }}</td>
                        <td>R$ {{ produto.valor_venda }}</td>
                        <td>
                            <q-btn round color="indigo-10" icon="search" size="10px">
                                <q-tooltip>
                                    Visualizar
                                </q-tooltip>
                            </q-btn>
                            <q-btn round color="primary" icon="edit" size="10px">
                                <q-tooltip>
                                    Editar
                                </q-tooltip>
                            </q-btn>
                            <q-btn round color="red" icon="delete" size="10px">
                                <q-tooltip>
                                    Excluir
                                </q-tooltip>
                            </q-btn>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="div_pagination">
                    <q-pagination
                        v-model="current"
                        max="5"
                        direction-links
                        push
                        color="primary"
                        active-design="push"
                        active-color="indigo-10"
                    />
                </div>
        </section>
    </AutenticatedLayout>
</template>


<script setup>
    import { router } from '@inertiajs/vue3';
    import AutenticatedLayout from '../../Components/AutenticatedLayout.vue'
    import PrimaryButton from "../../Components/PrimaryButton.vue";
    import { reactive } from 'vue';
    import { defineProps } from 'vue';

    const props = defineProps({
        produtos: Object
    });

    const form = reactive({
        nome: props.produtos.nome ,
        marca: props.produtos.marca ,
        quantidade: props.produtos.quantidade ,
        valor_compra: props.produtos.valor_compra,
        valor_venda: props.produtos.valor_venda
    });


    function cadastrar(){
        router.get("/produto/create");
    }

</script>

<style>
.div_titulo .h1_titulo {
  display: flex;
  justify-content: center;
  font-size: 35px;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.div_botoes_principais {
  display: flex;
  justify-content: center;
  gap: 20px;
}

.table {
  margin: 0 auto;
  color: black;
  background-color: white;
  border: 2px solid rgb(7, 6, 6);
  margin-top: 100px;
  width: 80%;
  box-shadow: 2px 2px 25px 2px #006DA4;
}

.thead_card {
    border: 2px solid black;
}

.thead_card tr th{
    padding: 5px;
    border: 2px solid black;
}

.th_card {
  padding: 10px;
  text-align: left;
}

.tbody_card {
  text-align: center;
}

.tbody_card td {
  border: 2px solid #030202;
  padding: 10px;
}

.div_pagination{
    display: flex;
    justify-content: center;
    margin-top: 50px;
    margin-bottom: 100px;
}

.imagemProduto {
    width: 180px;
    height: 120px;
}

</style>
