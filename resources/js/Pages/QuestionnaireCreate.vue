<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
</script>

<template>
    <application-layout>
        <v-card v-for="question in $page.props.questions" :key="question.id">
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
