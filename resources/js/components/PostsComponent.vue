<template>
    <div class="posts-tab">
        <ul class="posts-sidebar" v-if="showPost">
            <li
                v-for="post in posts"
                v-bind:key="post.post_id"
                v-bind:class="{ selected: post === selectedPost }"
                v-on:click="selectedPost = post"
            >
                {{ post.post_title }}
            </li>
        </ul>
        <ul class="posts-sidebar" v-else>
            <li>Loading...</li>
        </ul>
        <div class="selected-post-container">
            <div v-if="selectedPost" class="selected-post">
                <h3>{{ selectedPost.post_title }}</h3>
                <div v-html="selectedPost.post_body"></div>
            </div>
            <strong v-else>
                Click on a blog title to the left to view it.
            </strong>
        </div>
    </div>
</template>

<script>
export default {
    name: "TabPosts",
    props: {
        posts: Array
    },
    data() {
        return {
            //posts: [],
            selectedPost: null
            //show: false
        };
    },
    // mounted() {
    //     // When the user scrolls the page, execute myFunction
    //     document.querySelector('.posts-sidebar').onscroll = () => this.scrollBar();
    //     //window.onscroll = () => this.scrollBar();
    // },
    methods: {

    },
    computed: {
        showPost() {
            if (this.posts[0] == null) {
                return false;
            } else {
                return true;
            }
        }

    },
    filters: {
        reduce(value) {
            return value.substring(0, 8);
        }
    }
};
</script>

<style>

</style>
