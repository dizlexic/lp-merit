<script setup>
import { Link } from '@inertiajs/vue3'

const url = (link, params) => {
  console.log(JSON.stringify(link, null, 2))
  if (!link.url) return
  let url = new URL(link.url)
  const keys = Object.keys(params)
  keys.forEach(key => {
    url.searchParams.append(key, params[key])
  })
  return url.href
}
defineProps({
  pagination: Object,
  params: Object
})
</script>

<template>
  <nav class="relative flex justify-center">
    <template v-for="link in pagination.links" :key="link.label">
      <Link
        :active="route().current(link.url)"
        preserve-scroll
        :href="url(link, params)"
        v-html="link.label"
        class="flex items-center justify-center px-3 py-2 text-sm rounded-lg text-gray-600"
        :class="{ 'bg-gray-200': route().current(link.url), '!text-gray-300': !link.url }"
      />
    </template>
  </nav>
</template>
