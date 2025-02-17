<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { router, usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { ref } from 'vue';

const headers = [
    { title: 'Name', value: 'name' },
    { title: 'Email', value: 'email' },
    { title: 'Phone', value: 'phone' },
    { title: 'Status', value: 'status' },
    { title: 'Actions', value: 'actions', sortable: false },
];
const options = ref(null)
const has_updated = ref(true);

const update = (e)=> {
    console.log(JSON.stringify(e, null, 2));
    if (has_updated.value) {
        return;
    }
    has_updated.value = true;
    router.get(route('manage.candidates'), e);
}

onMounted(() => {
    setTimeout(() => {
        has_updated.value = false;
    }, 1000);

    options.value = {
        sortBy: [],
        current_page: usePage().props.candidates.current_page,
        per_page: usePage().props.candidates.per_page,
    }

});

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
                    <v-card v-if="$page.props.candidates">
                        <v-card-title>
                            <h3>Candidates</h3>
                        </v-card-title>
                        <v-card-text>
                            <v-data-table-server
                                v-if="options"
                                :headers="headers"
                                :items="$page.props.candidates.data"
                                :items-length="$page.props.candidates.total"
                                :loading="has_updated"
                                :sort-by="options.sortBy"
                                :page="options.current_page"
                                :items-per-page="options.per_page"
                                :items-per-page-options="[10, 25, 50, 100]"
                                @update:options="update"
                            >
                                <template #[`item.status`]="{ item }">
                                    <v-chip
                                        :color="item.status"
                                        small
                                    >
                                        {{ item.status }}
                                    </v-chip>
                                </template>
                                <template #[`item.actions`]="{ item }">
                                    <v-icon
                                        small
                                        color="info"
                                        @click="router.visit(route('manage.candidate', { candidate: item.id }))"
                                    >
                                        mdi-eye
                                    </v-icon>
                                </template>
                            </v-data-table-server>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-sheet>
    </application-layout>
</template>

<style scoped></style>
