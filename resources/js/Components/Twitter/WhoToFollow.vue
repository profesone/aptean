<script setup>
const suggestions = [
    {
        id: 1,
        name: 'Webroot',
        username: '@webroot',
        avatar: '/assets/avatars/2.png'
    },
    {
        id: 2,
        name: 'Carter',
        username: '@carter3',
        avatar: '/assets/avatars/3.png'
    }
];
</script>

<template>
    <div class="who-to-follow top-level-panel">
        <ul class="who-to-follow-header">
            <li>
                <h1>Who to follow</h1>
            </li>
        </ul>

        <ul class="who-to-follow-list">
            <li v-for="user in suggestions" :key="user.id">
                <img :src="user.avatar" :alt="user.name" class="tweet-profile-thumbnail" />

                <div class="who-to-follow-right-wrap">
                    <p class="who-to-follow-line-wrap">
                        <Link :href="`/user/${user.username}`" class="who-to-follow-display-name">
                            {{ user.name }}
                        </Link>
                        <Link :href="`/user/${user.username}`" class="tweet-username">
                            {{ user.username }}
                        </Link>
                    </p>

                    <div class="clear"></div>

                    <button @click="followUser(user.id)" class="follow">
                        <i class="fa fa-user-plus"></i>
                        Follow
                    </button>
                </div>

                <div class="clear"></div>
            </li>
        </ul>
    </div>
</template>