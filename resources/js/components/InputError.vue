<script setup>
defineProps({
    message: {
        type: String,
        default: null,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red-600 dark:text-red-400">
            {{ message }}
        </p>
    </div>
</template>
