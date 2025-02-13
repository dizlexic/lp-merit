<script setup>
import Pagination from '@/components/Pagination.vue';
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
</script>

<template>
    <application-layout>
        <v-alert v-if="$page.props.errors.search" type="error">
            {{ $page.props.errors.search }}
        </v-alert>
        <v-alert>
            <template #icon>
                <v-icon>mdi-information</v-icon>
            </template>
            <template #message>
                <p>
                    Search results: {{ $page.props.results.from }} -
                    {{ $page.props.results.to }} Total:
                    {{ $page.props.results.total }}
                </p>
            </template>
        </v-alert>
        <v-row v-if="$page.props.results">
            <template
                v-for="result in $page.props.results.data"
                :key="result.id"
            >
                <v-col cols="12" md="4" sm="6">
                    <v-card>
                        <v-card-title>{{ result.name }}</v-card-title>
                        <v-card-subtitle>{{ result.state }}</v-card-subtitle>
                        <v-card-item>
                            <v-img
                                :width="300"
                                aspect-ratio="16/9"
                                height="200"
                                cover
                                :src="result.picture"
                            >
                                <template #placeholder>
                                    <v-skeleton-loader
                                        height="200"
                                        width="300"
                                        type="image"
                                    />
                                </template>
                            </v-img>
                        </v-card-item>
                    </v-card>
                </v-col>
            </template>
            <v-col cols="12">
                <pagination
                    :pagination="$page.props.results"
                    :params="{
                        search: $page.props.results.search || '',
                        page: $page.props.results.current_page,
                    }"
                />
            </v-col>
        </v-row>
        <v-row v-else>
            <v-col cols="12">
                <v-alert>No results found</v-alert>
            </v-col>
        </v-row>
    </application-layout>
</template>

<style scoped></style>
