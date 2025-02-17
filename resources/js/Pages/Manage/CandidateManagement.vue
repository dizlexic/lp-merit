<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { router, usePage } from '@inertiajs/vue3';

const updateStatus = (status) => {
    router.visit(route('manage.candidate', {
        candidate: usePage().props.candidate.id
    }), {
        method: 'PUT',
        data: {
            status,
        }
    });
};
</script>

<template>
    <application-layout>
        <v-card>
            <v-card-text>
                <v-btn
                    v-if="$page.props.previoius"
                    variant="text"
                    @click="router.visit($page.props.previoius)"
                >
                    Previous
                </v-btn>
                <v-btn
                    v-else
                    variant="text"
                    @click="router.visit(route('manage.candidates'))"
                >
                    Back to Candidates
                </v-btn>
            </v-card-text>
        </v-card>
        <v-card>
            <template #title>
                <div
                    class="px-4"
                    :class="`bg-${$page.props.candidate.status}`"
                >
                    <h3>Candidate {{ $page.props.candidate.id }}</h3>
                </div>
            </template>
            <v-card-text>
                <v-img
                    :src="$page.props.candidate.picture"
                    width="100"
                    height="100"
                />
                <template
                    v-for="key in Object.keys($page.props.candidate)"
                    :key="key"
                >
                    <div>
                        <strong>{{ key }}</strong>: {{ $page.props.candidate[key] }}
                    </div>
                </template>
            </v-card-text>
            <v-card-actions>
                <v-btn
                    color="success"
                    variant="tonal"
                    prepend-icon="mdi-check"
                    @click="updateStatus('verified')"
                >
                    Verify
                </v-btn>
                <v-spacer />
                <v-btn
                    color="error"
                    variant="tonal"
                    prepend-icon="mdi-delete"
                    @click="updateStatus('rejected')"
                >
                    Reject
                </v-btn>
            </v-card-actions>
        </v-card>
    </application-layout>
</template>

<style></style>
