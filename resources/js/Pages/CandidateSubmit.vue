<script setup lang="js">

import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { VFileUpload, VFileUploadItem } from 'vuetify/labs/VFileUpload'

defineProps({
  errors: Object,
});
const form = useForm({
  first_name: '',
  last_name: '',
  email: '',
  phone: '',
  address: '',
  city: '',
  state: '',
  zip: '',
  picture: null,
  elected_position: '',
  election_district: '',
  election_cycle: '',
});

const submit = () => {
  form.post(route('candidates.store'));
};

</script>

<template>
  <application-layout>
      <v-card class="pa-4">
        <template #title>
          <h3 class="subtitle">
            Submit a candidate
          </h3>
        </template>
          <v-form>
            <v-row>
              <v-col cols="6">
                <v-text-field
                  v-model="form.first_name"
                  label="First Name"
                  :error="errors.first_name"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.last_name"
                  label="Last Name"
                  :error="errors.last_name"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.email"
                  label="Email"
                  :error="errors.email"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.phone"
                  label="Phone"
                  :error="errors.phone"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="12">
                <v-text-field
                  v-model="form.address"
                  label="Address"
                  :error="errors.address"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.city"
                  label="City"
                  :error="errors.city"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.state"
                  label="State"
                  :error="errors.state"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.zip"
                  label="Zip"
                  :error="errors.zip"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.elected_position"
                  label="Elected Position"
                  :error="errors.elected_position"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.election_district"
                  label="Election District"
                  :error="errors.election_district"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="6">
                <v-text-field
                  v-model="form.election_cycle"
                  label="Election Cycle"
                  :error="errors.election_cycle"
                  density="compact"
                  variant="outlined"
                />
              </v-col>
              <v-col cols="12">
                <v-label>
                  Candidate Photo
                </v-label>
                <v-file-upload
                  v-model="form.picture"
                  clearable
                  show-size
                  density="compact"
                  variant="outlined"
                >
                  <template v-slot:item="{ props: itemProps }">
                    <v-file-upload-item v-bind="itemProps" lines="one" nav>
                      <template v-slot:prepend>
                        <v-avatar size="32" rounded></v-avatar>
                      </template>

                      <template v-slot:clear="{ props: clearProps }">
                        <v-btn color="primary" v-bind="clearProps"></v-btn>
                      </template>
                    </v-file-upload-item>
                  </template>
                </v-file-upload>
              </v-col>
            </v-row>
          </v-form>
        <template #actions>
          <v-btn color="primary" @click="submit">Submit</v-btn>
        </template>
      </v-card>
  </application-layout>
</template>

<style scoped>

</style>
