<template>
    <AutenticatedLayout>
        <section>
            <div class="container">
                <div class="title">
                    <h1>Cadastro de Produtos</h1>
                </div>
                <form @submit.prevent="submit" class="form" enctype="multipart/form-data">
                    <div class="div_conteudo" style="max-width: 400px">
                        <q-input color="indigo-10" v-model="form.nome" label="Nome" placeholder="Nome do Produto" bg-color="white"  rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="person" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px">
                        <q-input color="indigo-10" v-model="form.marca" label="Marca" placeholder="Marca do Produto" bg-color="white"  rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="checkroom" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px">
                        <q-input color="indigo-10" v-model="form.valor_compra" label="Valor Comprado" placeholder="Valor Comprado do Produto" bg-color="white"  rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="paid" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px">
                        <q-input color="indigo-10" v-model="form.valor_venda" label="Valor Venda" placeholder="Valor Venda do Produto" bg-color="white"  rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="paid" />
                        </template>
                        </q-input>
                    </div>
                    <div class="button-group">
                        <PrimaryButton  class="submit">Enviar</PrimaryButton>
                    </div>
                </form>
            </div>
        </section>
    </AutenticatedLayout>
</template>


<script setup>
    import AutenticatedLayout from '../../Components/AutenticatedLayout.vue';
    import PrimaryButton from '../../Components/PrimaryButton.vue';
    import { reactive } from 'vue';
    import { defineProps } from 'vue';

    const props = defineProps({
        produto: Object,
        erros: Object
    });

    const form = reactive({
        nome: props.produto.nome ,
        marca: props.produto.marca ,
        quantidade: props.produto.quantidade ,
        valor_compra: props.produto.valor_compra,
        valor_venda: props.produto.valor_venda,
        imagem: props.produto.imagem
    });

</script>
