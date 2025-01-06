<script setup>
    import TwitterUser from '@/Components/Twitter/TwitterUser.vue';
    import TweetForm from '@/Components/Twitter/TweetForm.vue';
    import TweetList from '@/Components/Twitter/TweetList.vue';
    import WhoToFollow from '@/Components/Twitter/WhoToFollow.vue';
    import Header from '@/Components/Twitter/Header.vue';
    import { Link } from '@inertiajs/vue3';

    defineProps({
        user: Object,
        tweets: Object,
        suggested_users: Array,
        followers: Array,
    });

    const footerLinks = [
        { label: 'About', route: '/about' },
        { label: 'Help', route: '/help' },
        { label: 'Terms', route: '/terms' },
        { label: 'Privacy', route: '/privacy' }
    ];
</script>

<template>
    <Header :user="user" />

<div class="page-wrap">
    <div class="left-sidebar">
        <TwitterUser :user="user" />
    </div>
    <div class="central-content top-level-panel">
        <ul class="tweet-feed">
            <li class="new-tweet">
                <TweetForm :user="user" />
            </li>
            <TweetList :tweets="tweets" />
        </ul>
    </div>

    <div class="right-sidebar">
        <WhoToFollow :suggested-users="suggested_users" />
            <div class="footer top-level-panel">
                <ul>
                    <li v-for="(link, index) in footerLinks" :key="index">
                        <Link :href="link.route">{{ link.label }}</Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>