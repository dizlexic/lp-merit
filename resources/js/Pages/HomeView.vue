<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
</script>

<template>
  <application-layout>
    <v-sheet v-if="$page.props.recent">
      Recent
    <v-row>
      <v-col cols="2" v-for="candidate in $page.props.recent">
          <v-card>
            <v-card-title>
              {{ candidate.name }}
            </v-card-title>
          </v-card>
      </v-col>
    </v-row>
    </v-sheet>

  </application-layout>
</template>

<style scoped>

</style>
