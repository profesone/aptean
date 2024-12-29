<script setup>
    import { Link } from '@inertiajs/vue3';

    defineProps({
        tweets: {
            type: Object,
            required: true
        }
    });
</script>

<template>
    <li v-for="tweet in tweets.data" :key="tweet.id" class="tweet">
        <img :src="tweet.user.avatar" :alt="tweet.user.name" class="tweet-profile-thumbnail" />
        <div class="tweet-content-wrap">
            <div class="tweet-header">
                <a href="#" class="tweet-display-name">{{ tweet.user.name }}</a>
                <a href="#" class="tweet-username">@{{ tweet.user.username }}</a>
                <a href="#" class="tweet-time">20m</a>
            </div>
            <p class="tweet-text">
                {{ tweet.message }}
            </p>
            <ul class="tweet-action-buttons">
                <li>
                    <a href="#">
                        <i class="fa fa-reply"></i>
                        <span></span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-retweet"></i>
                        <span>6</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-star"></i>
                        <span>9</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </li>
    <div class="pagination">
        <Link 
            v-for="link in tweets.links" 
            :key="link.url"
            :href="link.url"
            v-html="link.label"
            :class="{ 'active': link.active }"
        />
    </div>
</template>