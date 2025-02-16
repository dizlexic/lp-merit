<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="relative flex justify-center">
        <template
            v-for="link in $page.props.results.links"
            :key="link.label"
        >
            <template v-if="link.label.includes('Previous')">
                <Link
                    v-if="link.url"
                    preserve-scroll
                    :href="link.url"
                    class="flex items-center justify-center rounded-lg px-3 py-2 text-sm text-gray-600"
                    :class="{ 'bg-gray-200': link.active }"
                    :only="['results']"
                >
                    <v-icon v-if="link.label.includes('Previous')">
                        mdi-chevron-left
                    </v-icon>
                </Link>
            </template>
            <template v-else-if="link.label.includes('Next')">
                <Link
                    v-if="link.url"
                    preserve-scroll
                    :href="link.url"
                    class="flex items-center justify-center rounded-lg px-3 py-2 text-sm text-gray-600"
                    :class="{ 'bg-gray-200': link.active }"
                    :only="['results']"
                >
                    <v-icon v-if="link.label.includes('Next')">
                        mdi-chevron-right
                    </v-icon>
                </Link>
            </template>
            <template v-else>
                <Link
                    v-if="link.url"
                    preserve-scroll
                    :href="link.url"
                    class="flex items-center justify-center rounded-lg px-3 py-2 text-sm text-gray-600"
                    :class="{ 'bg-gray-200': link.active }"
                >
                    {{ link.label }}
                </Link>
            </template>
        </template>
    </nav>
</template>
