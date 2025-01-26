<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { computed } from 'vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: {
        type: String,
    },
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(
    () => props.status === 'verification-link-sent',
);
</script>

<template>
  <application-layout>
    <v-container>
      <v-row>
        <v-col cols="12">
          <v-card>
            <v-card-title>
              <h3>Verify Email</h3>
            </v-card-title>
            <v-card-text>
              <div v-if="verificationLinkSent">
                <p>A new verification link has been sent to the email address you provided during registration.</p>
              </div>
              <div v-else>
                <p>Before proceeding, please check your email for a verification link.</p>
                <p>If you did not receive the email, <a @click="submit">click here to request another</a>.</p>
              </div>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </application-layout>
</template>
