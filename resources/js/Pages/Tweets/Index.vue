<script setup>
    import TwitterLayout from '@/Layouts/TwitterLayout.vue';
    import { Head, Link } from '@inertiajs/vue3';

    defineProps({
        user: Object,
        tweets: Object,
        suggested_users: Array,
    });
</script>

<template>
    <Head title="Home" />
Hello from index
    <TwitterLayout
        :user="user"
        :tweets="tweets"
        :suggested-users="suggestedUsers"
    >
        <TweetUser :tweets="tweets" />
        <TweetList :tweets="tweets" />
        <TweetFollow :tweets="followers" />
        <WhoToFollow :tweets="suggested_users" />
        <Following :tweets="tweets" />
    </TwitterLayout>
</template>


Explanation:

Structure:

The component is divided into three main sections:
User Profile: Displays user information, stats, and suggested users.
Timeline: Shows a list of tweets fetched from the controller.
Pagination: Handles navigation between pages of tweets.
Data Binding:

The component receives user, tweets, and suggestedUsers props from the controller.
These props are used to dynamically populate the UI with user data, tweets, and suggested users.
UI Components:

Uses Tailwind CSS for basic styling (you can customize this further).
Includes basic UI elements like images, lists, and a pagination navigation.
Functionality:

Tweet Button: Currently a placeholder, it should trigger a modal or form for creating a new tweet.
Pagination: Currently a placeholder, it should handle navigation between pages of tweets.
To complete this component:

Implement the "Tweet" button:
Create a modal or form for composing a new tweet.
Handle form submission to call the store() method in the TweetController.
Implement pagination:
Add event listeners to the pagination links.
Make API requests to fetch the appropriate page of tweets.
Add styling and interactivity:
Customize the UI with your preferred styles.
Add features like liking, retweeting, and replying to tweets.
This provides a basic structure for your Index.vue component. Remember to adapt it to your specific needs and design preferences.
-->