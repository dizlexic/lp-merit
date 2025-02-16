<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
</script>

<template>
    <application-layout>
        <v-row>
            <v-col cols="12">
                <v-sheet>
                    <v-card>
                        <v-card-title>Dashboard</v-card-title>

                        <v-card-text>
                            <v-row>
                                <v-col
                                    cols="12"
                                    md="4"
                                >
                                    <v-card>
                                        <v-card-title>
                                            Total Records
                                        </v-card-title>
                                        <v-card-text>
                                            <v-row>
                                                <v-col cols="12">
                                                    <v-text-field
                                                        v-model="$page.props.total"
                                                        label="Total Users"
                                                        readonly
                                                    />
                                                </v-col>
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="4"
                                >
                                    <v-card>
                                        <v-card-title>Unverified</v-card-title>
                                        <v-card-text>
                                            <v-row>
                                                <v-col cols="12">
                                                    <v-text-field
                                                        v-model="$page.props.unverified"
                                                        label="Total Users"
                                                        readonly
                                                    />
                                                </v-col>
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </v-col>

                                <v-col
                                    cols="12"
                                    md="4"
                                >
                                    <v-card>
                                        <v-card-title>
                                            Recently Updated
                                        </v-card-title>
                                        <v-card-text>
                                            <v-row>
                                                <v-col
                                                    v-for="candidate in $page.props.recent"
                                                    :key="candidate.id"
                                                    cols="12"
                                                >
                                                    <v-card>
                                                        <v-card-title>
                                                            {{ candidate.name }}
                                                        </v-card-title>
                                                    </v-card>
                                                </v-col>
                                            </v-row>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-sheet>
            </v-col>
        </v-row>
    </application-layout>
</template>

<style scoped></style>
