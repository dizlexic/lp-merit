<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
  <application-layout>
    <v-container>
      <v-row>
        <v-col cols="12">
          <v-card>
            <v-card-title>
              <h3>Edit Profile</h3>
            </v-card-title>
            <v-card-text>
              <v-alert
                v-if="status"
                :value="true"
                :type="status === 'saved' ? 'success' : 'error'"
                dismissible
              >
                {{ status === 'saved' ? 'Profile updated!' : 'There was an error updating your profile.' }}
              </v-alert>
              <v-alert
                v-if="mustVerifyEmail"
                :value="true"
                type="warning"
                dismissible
              >
                Please verify your email address before updating your profile.
              </v-alert>
              <update-profile-information-form />
              <update-password-form />
              <delete-user-form />
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </application-layout>
</template>
