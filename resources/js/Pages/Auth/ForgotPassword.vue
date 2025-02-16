<script setup>
import PrimaryButton from '@/components/PrimaryButton.vue';
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <application-layout>
        <v-row>
            <v-col
                cols="12"
                md="6"
                offset-md="3"
            >
                <v-card>
                    <v-card-title>Forgot Password</v-card-title>
                    <v-card-text>
                        <v-expand-transition>
                            <v-alert
                                v-if="$page.props.errors.email"
                                :type="$page.props.status === 'success' ? 'success' : 'error'"
                                dense
                                dismissible
                                border="left"
                                elevation="1"
                                icon="mdi-alert"
                                variant="tonal"
                            >
                                {{ $page.props.errors.email }}
                            </v-alert>
                        </v-expand-transition>
                        <form @submit.prevent="submit">
                            <v-label
                                for="email"
                                label="Email"
                            />
                            <v-text-field
                                id="email"
                                v-model="form.email"
                                type="email"
                                variant="outlined"
                                density="compact"
                                autofocus
                                required
                            />
                            <primary-button type="submit">
                                Send Password Reset Link
                            </primary-button>
                        </form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </application-layout>
</template>
