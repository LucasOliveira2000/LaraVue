<template>
    <AutenticatedLayout>
        <section>
            <div>
                <h1>Produtos</h1>
            </div>
            <div>
                <PrimaryButton @click="cadastrar">Cadastrar</PrimaryButton>
                <PrimaryButton>Relatorio</PrimaryButton>
            </div>

        </section>
    </AutenticatedLayout>
    </template>


<script setup>
    import { router } from '@inertiajs/vue3';
    import AutenticatedLayout from '../../Components/AutenticatedLayout.vue'
    import PrimaryButton from "../../Components/PrimaryButton.vue";

    function cadastrar(){
        router.get("/produto/create");
    }

</script>
