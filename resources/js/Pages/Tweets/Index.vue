<script setup>
  import TwitterLayout from '@/Layouts/TwitterLayout.vue';
  import { Head } from '@inertiajs/vue3';

  defineProps({
      user: Object,
      tweets: Object,
      suggestedUsers: Array,
  });
</script>

<template>
    <Head title="Home" />

    <TwitterLayout
        :user="user"
        :tweets="tweets"
        :suggested-users="suggestedUsers"
    >
    </TwitterLayout>
</template>