<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out',
);
</script>

<template>
    <div class="header">
        <div class="header-content">
            <ul class="global-actions">
                <li>
                    <a class="global-actions-button-content">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </a>
                </li>

                <li>
                    <a class="global-actions-button-content">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        Notifications
                    </a>
                </li>

                <li>
                    <a class="global-actions-button-content">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                        Messages
                    </a>
                </li>
            </ul>

            <button class="compose-tweet">
                <span class="wrap">
                    <i class="fa fa-paper-plane"></i>
                    Tweet
                </span>
            </button>

            <img src="assets/avatars/1.png" alt="" class="profile-picture-small">

            <div class="search">
                <input type="text" placeholder="Search Twitter" />
                <span class="fa fa-search"></span>
            </div>

            <i class="logo fa fa-twitter" aria-hidden="true"></i>
        </div>
    </div>
<Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
