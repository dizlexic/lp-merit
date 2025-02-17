<script setup>
import { router } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
</script>

<template>
    <application-layout>
        <Head title="Dashboard" />
        <h1>Dashboard</h1>
        <v-btn
            color="primary"
            @click="router.visit(route('logout'), { method: 'post' })"
        >
            Logout
        </v-btn>
    </application-layout>
</template>

<style scoped>

</style>
