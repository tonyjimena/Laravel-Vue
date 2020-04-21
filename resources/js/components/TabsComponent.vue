<template>
    <div class="card text-center tabs-component shadow-ligth">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li
                    class="nav-item"
                    v-for="tab in tabs"
                    v-bind:key="tab"
                    v-on:click="currentTab = tab"
                >
                    <a v-bind:class="['nav-link', { active: currentTab === tab } ]">
                        {{ tab }}
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <keep-alive>
                <transition name="fade" mode="out-in">
                    <component
                        :posts="posts"
                        v-bind:is="currentTabComponent"
                        class="tab"
                    ></component>
                </transition>
            </keep-alive>
        </div>
    </div>
</template>

<script>
import LoadingComponent from "./LoadingComponent";
import ErrorComponent from "./ErrorComponent";
// import TabPosts from "./PostsComponent";
import TabArchive from "./ArchiveComponent";

const TabPosts = () => ({
    component: import("./PostsComponent"),
    loading: LoadingComponent,
    error: ErrorComponent,
    timeout: 3000
});
export default {
    name: "TabsComponent",
    props: {
        posts: {
            type: Array
        }
    },
    data() {
        return {
            currentTab: "Posts",
            tabs: ["Posts", "Archive"]
        };
    },
    components: {
        TabPosts,
        TabArchive
    },
    computed: {
        currentTabComponent: function() {
            return "tab-" + this.currentTab.toLowerCase();
        }
    }
};
</script>

<style>
.tab {
    padding: 10px;
    border-radius: 0px 0px 5px 5px;
    display: flex;
    border-right: 1px solid #dee2e6;
    border-left: 1px solid #dee2e6;
    border-bottom: 1px solid #dee2e6;
    background-color: white;
    height: 100%;
}
.posts-tab {
    display: flex;
}
.posts-sidebar {
    /* width: 40%; */
    overflow-y: scroll;
    max-height: 275px;
    max-width: 40%;
    min-width: 22%;
    margin: 0;
    padding: 0 10px 0 0;
    list-style-type: none;
    border-right: 1px solid #ccc;
}
.posts-sidebar li {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    cursor: pointer;
}
.posts-sidebar li:hover {
    background: #eee;
}
.posts-sidebar li.selected {
    background: lightblue;
}
.selected-post-container {
    padding-left: 10px;
}
.selected-post > :first-child {
    margin-top: 0;
    padding-top: 0;
}
.tabs-component {
    display: flex;
    flex-direction: column;
    width: 50vw;
}
.active {
    background-color: #ffffff !important;
}


</style>
