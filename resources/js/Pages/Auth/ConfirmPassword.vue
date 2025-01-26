<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import TextInput from '@/components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
  <application-layout>
    <v-container>
      <v-row>
        <v-col cols="12">
          <v-card>
            <v-card-title>
              <h3>Confirm Password</h3>
            </v-card-title>
            <v-card-text>
              <form @submit.prevent="submit">
                <v-text-field
                  v-model="form.password"
                  label="Password"
                  type="password"
                  :error="form.errors.password"
                />
                <v-btn type="submit">Confirm</v-btn>
              </form>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </application-layout>
</template>
