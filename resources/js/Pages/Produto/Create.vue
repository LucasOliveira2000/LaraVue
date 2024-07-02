<template>
    <AutenticatedLayout>
        <section>
            <div class="container">
                <form @submit.prevent="submit" class="form" enctype="multipart/form-data">
                    <div class="title">
                        <h1 class="h1_title">Cadastro de Produtos</h1>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px; width: 300px;">
                        <q-input color="indigo-10" v-model="form.nome" label="Nome" placeholder="Nome do Produto" bg-color="gray"  rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="person" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px; width: 300px;">
                        <q-input color="indigo-10" v-model="form.marca" label="Marca" placeholder="Marca do Produto" bg-color="gray"  rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="checkroom" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px; width: 300px;">
                        <q-input color="indigo-10" v-model="form.quantidade" label="quantidade" placeholder="Quantidade do Produto" bg-color="gray"  rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="pin" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px; width: 300px;">
                        <q-input color="indigo-10" v-model="form.valor_compra" label="Valor Comprado" placeholder="Valor Comprado do Produto" bg-color="gray" rounded filled>
                        <template v-slot:prepend>
                            <q-icon name="paid" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 400px; width: 300px;">
                        <q-input color="indigo-10" v-model="form.valor_venda" label="Valor Venda" placeholder="Valor Venda do Produto" bg-color="gray" rounded filled >
                        <template v-slot:prepend>
                            <q-icon name="paid" />
                        </template>
                        </q-input>
                    </div>
                    <div class="div_conteudo" style="max-width: 300px; width: 300px;">
                        <q-uploader
                            url="handleFileChange"
                            style="max-width: 300px"
                            v-model="form.imagePreview"
                            label="IMAGEM"
                            multiple
                            color="indigo-10"
                            max-file-size="5000"
                            @rejected="onRejected"
                            accept="imagem/jpeg, imagem/png"
                        />
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
    import { router } from '@inertiajs/vue3';
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

    function handleFileChange(event) {
        form.imagem = event.target.files[0];
        form.imagePreview = form.imagem ? URL.createObjectURL(form.imagem) : null;
    }

    function submit(){
        router.post("/produto/store", form)
    }

</script>


<style>

.title{
    display: flex;
    justify-content: center;
}

.h1_title{
    color: black;
    margin-top: 1px;
    margin-bottom: 5px;
    font-size: 30px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.form{
    display: flex;
    justify-items: center;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    width: 500px;
    margin: 0 auto;
    margin-top: 150px;
    gap: 10px;
    padding-top: 10px;
    padding-bottom: 30px;
    background-color: white;
    border-radius: 5px 60px;
    box-shadow: 2px 2px 25px 2px #006DA4;
}

.button-group{
    margin-top: 10px;
}

</style>
