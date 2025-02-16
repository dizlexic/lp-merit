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
                                <text-input
                                    v-model="form.name"
                                    label="Name"
                                    type="text"
                                    :error="form.errors.name"
                                />
                                <text-input
                                    v-model="form.email"
                                    label="Email"
                                    type="email"
                                    :error="form.errors.email"
                                />
                                <text-input
                                    v-model="form.password"
                                    label="Password"
                                    type="password"
                                    :error="form.errors.password"
                                />
                                <text-input
                                    v-model="form.password_confirmation"
                                    label="Confirm Password"
                                    type="password"
                                    :error="
                                        form.errors.password_confirmation
                                    "
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
