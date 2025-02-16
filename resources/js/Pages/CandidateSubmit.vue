<script setup lang="js">
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { VFileUpload, VFileUploadItem } from 'vuetify/labs/VFileUpload';


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
                            :error="$page.props.errors.first_name"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.last_name"
                            label="Last Name"
                            :error="$page.props.errors.last_name"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.email"
                            label="Email"
                            :error="$page.props.errors.email"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.phone"
                            label="Phone"
                            :error="$page.props.errors.phone"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="12">
                        <v-text-field
                            v-model="form.address"
                            label="Address"
                            :error="$page.props.errors.address"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.city"
                            label="City"
                            :error="$page.props.errors.city"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.state"
                            label="State"
                            :error="$page.props.errors.state"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.zip"
                            label="Zip"
                            :error="$page.props.errors.zip"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.elected_position"
                            label="Elected Position"
                            :error="$page.props.errors.elected_position"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.election_district"
                            label="Election District"
                            :error="$page.props.errors.election_district"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="6">
                        <v-text-field
                            v-model="form.election_cycle"
                            label="Election Cycle"
                            :error="$page.props.errors.election_cycle"
                            density="compact"
                            variant="outlined"
                        />
                    </v-col>
                    <v-col cols="12">
                        <v-label>Candidate Photo</v-label>
                        <v-file-upload
                            v-model="form.picture"
                            clearable
                            show-size
                            density="compact"
                            variant="outlined"
                            :error="$page.props.errors.picture"
                        >
                            <template #item="{ props: itemProps }">
                                <v-file-upload-item
                                    v-bind="itemProps"
                                    lines="one"
                                    nav
                                >
                                    <template #prepend>
                                        <v-avatar
                                            size="32"
                                            rounded
                                        />
                                    </template>

                                    <template #clear="{ props: clearProps }">
                                        <v-btn
                                            color="primary"
                                            v-bind="clearProps"
                                        />
                                    </template>
                                </v-file-upload-item>
                            </template>
                        </v-file-upload>
                    </v-col>
                </v-row>
            </v-form>
            <template #actions>
                <v-btn
                    color="primary"
                    @click="submit"
                >
                    Submit
                </v-btn>
            </template>
        </v-card>
    </application-layout>
</template>

<style scoped></style>
