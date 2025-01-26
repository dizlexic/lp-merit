<script setup>

import Pagination from '@/components/Pagination.vue';
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  search: String,
  results: Object,
});
</script>

<template>
  <application-layout>
    <p>Search results: {{ results.from }} - {{ results.to }} Total: {{ results.total }}</p>
    <v-row v-if="results.data.length">
      <template v-for="result in results.data" :key="result.id">
        <v-col cols="12" md="3">
          <v-card
            @click="router.visit(route('candidate', {
                year: '2025',
                slug: result.slug,
              }),
              {
                method: 'get',
                data: {
                  search,
                }
              }
            )"
          >
            <v-card-title>{{ result.name }}</v-card-title>
            <v-card-subtitle>{{ result.state }}</v-card-subtitle>
            <v-card-item>
              <v-img
                :width="300"
                aspect-ratio="16/9"
                cover
                :src="result.picture" />
            </v-card-item>
          </v-card>
        </v-col>
      </template>
      <v-col cols="12">
        <pagination :pagination="results" :params="{ search, page: results.current_page}"/>
      </v-col>
    </v-row>
    <v-row v-else>
      <v-col cols="12">
        <v-alert>No results found</v-alert>
      </v-col>
    </v-row>
  </application-layout>
</template>

<style scoped>

</style>
