<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
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
                    <v-card-title>Reset Password</v-card-title>

                    <v-card-text>
                        <form @submit.prevent="submit">
                            <input
                                v-model="form.token"
                                type="hidden"
                            >

                            <v-label
                                for="password"
                                label="Password"
                            />
                            <v-text-field
                                id="password"
                                v-model="form.password"
                                type="password"
                                variant="outlined"
                                density="compact"
                                required
                            />

                            <v-label
                                for="password_confirmation"
                                label="Confirm Password"
                            />
                            <v-text-field
                                id="password_confirmation"
                                v-model="form.password_confirmation"
                                type="password"
                                variant="outlined"
                                density="compact"
                                required
                            />

                            <v-btn
                                type="submit"
                                color="primary"
                            >
                                Reset Password
                            </v-btn>
                        </form>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </application-layout>
</template>
