<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';

defineProps({
    candidate: Object,
    questions: Array,
});
</script>

<template>
    <application-layout>
        <v-card v-for="question in questions">
            <v-card-title>
                {{ question.text }}
            </v-card-title>
            <v-card-text>
                <v-text-field
                    v-model="question.answer"
                    label="Answer"
                    type="text"
                />
            </v-card-text>
        </v-card>
    </application-layout>
</template>

<style scoped></style>
