<script setup>
import { useForm, Head } from '@inertiajs/vue3'

const form = useForm({
    message: '',
});
</script>

<template>
<img src="assets/avatars/1.png" alt="" class="profile-picture-small" />
<form @submit.prevent="form.post(route('tweets.store'), { onSuccess: () => form.reset() })">
<div class="tweet-input-wrap">
    <input 
        type="text"
        name="tweet"
        id="tweet"
        v-model="form.message"
        placeholder="What's happening?"
    />
    <button class="compose-tweet-short">
        <i class="fa fa-paper-plane"></i>
    </button> 
</div>
</form>

</template>