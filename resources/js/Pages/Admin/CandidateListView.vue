<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';

const headers = [
    { text: 'Name', value: 'name' },
    { text: 'Email', value: 'email' },
    { text: 'Phone', value: 'phone' },
    { text: 'Actions', value: 'actions', sortable: false },
];

const save = () => {
    if (editedIndex > -1) {
        Object.assign(cadidates[editedIndex], editedItem);
    } else {
        cadidates.push(editedItem);
    }
    close();
};
</script>

<template>
    <application-layout>
        <v-sheet>
            <v-row>
                <v-col cols="12">
                    <v-card>
                        <v-card-title>
                            <h3>Candidates</h3>
                        </v-card-title>
                        <v-card-text>
                            <v-data-table
                                :headers="headers"
                                :items="$page.props.cadidates"
                                :items-per-page="5"
                                class="elevation-1"
                            >
                                <template #top>
                                    <v-toolbar flat>
                                        <v-toolbar-title>
                                            Candidates
                                        </v-toolbar-title>
                                        <v-divider
                                            class="mx-4"
                                            inset
                                            vertical
                                        />
                                        <v-spacer />
                                        <v-dialog
                                            v-model="dialog"
                                            max-width="500px"
                                        >
                                            <template #activator="{ on }">
                                                <v-btn
                                                    color="primary"
                                                    dark
                                                    class="mb-2"
                                                    v-on="on"
                                                >
                                                    Add Candidate
                                                </v-btn>
                                            </template>
                                            <v-card>
                                                <v-card-title>
                                                    <span class="headline">
                                                        Add Candidate
                                                    </span>
                                                </v-card-title>
                                                <v-card-text>
                                                    <v-container>
                                                        <v-row>
                                                            <v-col cols="12">
                                                                <v-text-field
                                                                    v-model="editedItem.name"
                                                                    label="Name"
                                                                />
                                                            </v-col>
                                                            <v-col cols="12">
                                                                <v-text-field
                                                                    v-model="editedItem.email"
                                                                    label="Email"
                                                                />
                                                            </v-col>
                                                            <v-col cols="12">
                                                                <v-text-field
                                                                    v-model="editedItem.phone"
                                                                    label="Phone"
                                                                />
                                                            </v-col>
                                                        </v-row>
                                                    </v-container>
                                                </v-card-text>
                                                <v-card-actions>
                                                    <v-spacer />
                                                    <v-btn
                                                        color="blue darken-1"
                                                        variant="text"
                                                        @click="close"
                                                    >
                                                        Cancel
                                                    </v-btn>
                                                    <v-btn
                                                        color="blue darken-1"
                                                        variant="text"
                                                        @click="save"
                                                    >
                                                        Save
                                                    </v-btn>
                                                </v-card-actions>
                                            </v-card>
                                        </v-dialog>
                                    </v-toolbar>
                                </template>
                                <template #[`item.actions`]="{ item }">
                                    <v-icon
                                        small
                                        class="mr-2"
                                        @click="editItem(item)"
                                    >
                                        mdi-pencil
                                    </v-icon>
                                    <v-icon
                                        small
                                        @click="deleteItem(item)"
                                    >
                                        mdi-delete
                                    </v-icon>
                                </template>
                            </v-data-table>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-sheet>
    </application-layout>
</template>

<style scoped></style>
