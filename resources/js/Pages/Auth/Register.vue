<script setup>
import TextInput from '@/components/TextInput.vue';
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
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
                            <h3>Register</h3>
                        </v-card-title>
                        <v-card-text>
                            <form @submit.prevent="submit">
                                <v-text-field
                                    v-model="form.name"
                                    label="Name"
                                    type="text"
                                    :error-messages="form.errors.name"
                                />
                                <v-text-field
                                    v-model="form.email"
                                    label="Email"
                                    type="email"
                                    :error-messages="form.errors.email"
                                />
                                <v-text-field
                                    v-model="form.password"
                                    label="Password"
                                    type="password"
                                    :rules="[
                                        () => form.password.length >= 8 || 'Password must be at least 8 characters',
                                    ]"
                                    :error-messages="form.errors.password"
                                />
                                <v-text-field
                                    v-model="form.password_confirmation"
                                    label="Confirm Password"
                                    type="password"
                                    :error-messages="form.errors.password_confirmation"
                                    :rules="[
                                        () => form.password === form.password_confirmation || 'Passwords do not match',
                                    ]"
                                />
                                <v-btn type="submit">
                                    Register
                                </v-btn>
                            </form>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </application-layout>
</template>
