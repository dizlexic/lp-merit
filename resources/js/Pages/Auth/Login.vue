<script setup>
import InputError from '@/components/InputError.vue';
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
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
                    <v-card-title>Login</v-card-title>

                    <v-card-text>
                        <form @submit.prevent="submit">
                            <v-text-field
                                v-model="form.email"
                                label="Email"
                                type="email"
                                autofocus
                                required
                                variant="outlined"
                                density="compact"
                            />

                            <v-text-field
                                v-model="form.password"
                                label="Password"
                                type="password"
                                required
                                variant="outlined"
                                density="compact"
                            />

                            <v-checkbox
                                v-model="form.remember"
                                label="Remember me"
                            />

                            <input-error :message="status" />

                            <v-row>
                                <v-col cols="12">
                                    <v-btn
                                        color="primary"
                                        type="submit"
                                    >
                                        Login
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </form>
                    </v-card-text>

                    <v-card-actions>
                        <v-btn
                            variant="text"
                            color="primary"
                            :href="route('password.request')"
                        >
                            Forgot your password?
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </application-layout>
</template>
