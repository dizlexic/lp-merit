<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
</script>

<template>
    <application-layout>
        <v-row>
            <v-col cols="12">
                <v-card>
                    <v-card-title>{{
                        $page.props.candidate.name
                    }}</v-card-title>
                    <v-card-subtitle>{{
                        $page.props.candidate.state
                    }}</v-card-subtitle>
                    <v-card-item>
                        <v-img
                            :width="300"
                            aspect-ratio="16/9"
                            cover
                            :src="$page.props.candidate.picture"
                        />
                    </v-card-item>
                </v-card>
            </v-col>
        </v-row>
    </application-layout>
</template>
