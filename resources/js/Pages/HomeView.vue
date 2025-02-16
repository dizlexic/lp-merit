<script setup>
import ApplicationLayout from '@/layouts/ApplicationLayout.vue';
import { router, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';
const selected = ref(0);

let interval;
const slide = ref(null);
const autoSlide = () => {
    if (usePage().props.recent) {
        selected.value = (selected.value + 1) % usePage().props.recent.length;
    }
};

const pauseSlide = () => {
    clearInterval(interval);
};

const resumeSlide = () => {
    interval = setInterval(autoSlide, 5000);
};

onMounted(() => {
    resumeSlide();
});
</script>

<template>
    <application-layout>
        <v-sheet v-if="$page.props.recent">
            <v-row>
                <v-col cols="12">
                    <v-slide-group
                        v-model="selected"
                        show-arrows
                        @mouseenter="pauseSlide"
                        @mouseleave="resumeSlide"
                    >
                        <v-slide-group-item
                            v-for="candidate in $page.props.recent"
                            ref="slide"
                            :key="candidate.id"
                            v-slot="{ isSelected, toggle }"
                        >
                            <v-hover v-slot="{ isHovering, props }">
                                <v-card
                                    :class="{
                                        'elevation-10 bg-primary': isSelected,
                                    }"
                                    :color="isHovering ? 'primary' : 'transparent'"
                                    :elevation="isHovering ? 10 : 0"
                                    class="ma-4"
                                    width="300"
                                    v-bind="props"
                                    @click="
                                        toggle();
                                        router.visit(route('candidates.show', {
                                            slug: candidate.slug,
                                            year: candidate.election_year ?? new Date().getFullYear(),
                                        }));
                                    "
                                >
                                    <v-card-title
                                        class="d-sm-flex d-none justify-space-between ga-2"
                                    >
                                        <v-btn
                                            variant="text"
                                            prepend-icon="mdi-account"
                                        >
                                            <span>{{ candidate.name }}</span>
                                        </v-btn>
                                    </v-card-title>
                                    <v-card-subtitle
                                        class="d-sm-flex d-none justify-space-between ga-2"
                                    >
                                        <v-btn
                                            icon
                                            size="xs"
                                            variant="text"
                                        >
                                            <v-icon>mdi-map</v-icon>
                                            <v-tooltip activator="parent">
                                                <span>{{ candidate.state }}</span>
                                            </v-tooltip>
                                        </v-btn>
                                        <div
                                            class="d-none d-md-inline flex-shrink-0 text-right"
                                        >
                                            {{ candidate.elected_position }}
                                        </div>
                                    </v-card-subtitle>
                                    <v-card-text>
                                        <v-img :src="candidate.picture" />
                                    </v-card-text>
                                </v-card>
                            </v-hover>
                        </v-slide-group-item>
                    </v-slide-group>
                </v-col>
            </v-row>
            <v-row>
                <v-col
                    v-for="candidate in $page.props.recent"
                    :key="candidate.id"
                    cols="12"
                    sm="6"
                    md="4"
                >
                    <v-hover v-slot="{ isHovering, props}">
                        <v-card
                            :color="isHovering ? 'primary' : 'transparent'"
                            v-bind="props"
                            @click="
                                router.visit(route('candidates.show', {
                                    slug: candidate.slug,
                                    year: candidate.election_year ?? new Date().getFullYear(),
                                }));
                            "
                        >
                            <v-card-title>
                                <v-img :src="candidate.picture" />
                                {{ candidate.name }}
                            </v-card-title>
                            <v-card-subtitle>{{ candidate.state }}</v-card-subtitle>
                            <v-card-subtitle class="text-right">
                                {{ candidate.election_district }}
                            </v-card-subtitle>
                        </v-card>
                    </v-hover>
                </v-col>
                <v-btn
                    color="primary"
                    text="View All"
                    @click="router.visit(route('search'))"
                >
                    View All
                </v-btn>
            </v-row>
        </v-sheet>
    </application-layout>
</template>

<style scoped></style>
