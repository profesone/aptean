<script setup>
    import { Link } from '@inertiajs/vue3';

    const navigationItems = [
        { label: 'Home', icon: 'fa-home', route: '/' },
        { label: 'Notifications', icon: 'fa-bell', route: '/notifications' },
        { label: 'Messages', icon: 'fa-comment', route: '/messages' }
    ];

    const userAvatar = '/assets/avatars/1.png';
</script>

<template>
    <div class="header">
        <div class="header-content">
            <ul class="global-actions">
                <li v-for="(item, index) in navigationItems" :key="index">
                    <Link :href="item.route" class="global-actions-button-content">
                        <i :class="['fa', item.icon]" aria-hidden="true"></i>
                        {{ item.label }}
                    </Link>
                </li>
            </ul>

            <img :src="userAvatar" alt="Profile" class="profile-picture-small">

            <div class="search">
                <input
                    type="text"
                    placeholder="Search Twitter"
                    name="search"
                    id="search"
                />
                <span class="fa fa-search"></span>
            </div>

            <i class="logo fa fa-twitter" aria-hidden="true"></i>
        </div>
    </div>
</template>