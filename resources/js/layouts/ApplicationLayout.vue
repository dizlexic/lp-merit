<script setup>
import NavLink from '@/components/NavLink.vue';
import { Link, Head, router } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const search = ref('');
const links = usePage().props.links;
const history = usePage().props.history;

const show_search = ref(false);
const is_privledged = computed(()=>{
  return usePage().props?.auth.roles.includes('admin')
})
</script>

<template>
  <v-app id="inspire">
    <Head :title="$page.props.title" />
    <v-system-bar
      v-if="($page.props.auth?.roles ?? []).length"
      color="black"
      height="50"
    >
      <v-spacer></v-spacer>
      <v-btn
        @click="router.visit(route('dashboard'))"
        icon
        variant="tonal"
        size="small"
      >
        <v-icon>mdi-view-dashboard</v-icon>
      </v-btn>
      <v-btn
        @click="router.visit(route('logout'), { method: 'post' })"
        variant="text"
        size="small"
        color="red"
      >
        <v-icon>mdi-location-exit</v-icon>
          <v-tooltip activator="parent">
            <span>Logout</span>
          </v-tooltip>
      </v-btn>

    </v-system-bar>
    <v-app-bar flat>
      <v-container class="mx-auto d-flex align-center justify-center">
        <nav-link :href="route('homepage')" :active="route().current('homepage')">
          <v-avatar
            class="me-4 "
            color="grey-darken-1"
            size="32"
          >
          </v-avatar>
        </nav-link>
        <v-btn
          v-for="link in history"
          :key="link.id"
          variant="text"
        >
          <Link :href="link.url" class="text-decoration-none">
            {{ link.text }}
          </Link>
        </v-btn>

        <v-spacer></v-spacer>


          <nav-link :href="route('candidates.submit')">
            <v-icon>mdi-account-plus-outline</v-icon>
          </nav-link>

        <v-responsive max-width="260">
          <v-text-field
            density="compact"
            v-model="search"
            label="Search"
            rounded="md"
            variant="outlined"
            flat
            hide-details
            single-line
            prepend-inner-icon="mdi-magnify"
            @keydown.enter="router.visit(route('search'), {
              method: 'post',
              data: {search},
            })"
          ></v-text-field>
        </v-responsive>
      </v-container>
    </v-app-bar>

    <v-main class="bg-grey-lighten-3">
      <v-container>
        <v-row>
          <v-col cols="2" v-if="history">
            <v-sheet rounded="lg">
              <v-list rounded="lg">
                <v-list-item
                  v-for="n in 5"
                  :key="n"
                  :title="`List Item ${n}`"
                  link
                ></v-list-item>

                <v-divider class="my-2"></v-divider>

                <v-list-item
                  color="grey-lighten-4"
                  title="Refresh"
                  link
                ></v-list-item>
              </v-list>
            </v-sheet>
          </v-col>

          <v-col>
            <v-sheet
              min-height="70vh"
              rounded="lg"
            >
              <slot />
              <!--  -->
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>
