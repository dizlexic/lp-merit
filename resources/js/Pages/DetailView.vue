<script setup>

import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { defineProps } from 'vue';

const props = defineProps({
  candidate: Object,
});
</script>

<template>
  <application-layout>
    <v-row>
      <v-col cols="12">
        <v-card>
          <v-card-title>{{ candidate.name }}</v-card-title>
          <v-card-subtitle>{{ candidate.state }}</v-card-subtitle>
          <v-card-item>
            <v-img
              :width="300"
              aspect-ratio="16/9"
              cover
              :src="candidate.picture" />
          </v-card-item>
        </v-card>
      </v-col>
    </v-row>
  </application-layout>
</template>

<style scoped>

</style>
