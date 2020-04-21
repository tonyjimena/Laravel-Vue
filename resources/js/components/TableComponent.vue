<template>
    <div class="positionFirst">
         <table class="table table-condensed table-striped table-bordered theader">
            <thead>
                <tr>
                <th>title</th>
                <th>body</th>
                <th>user</th>
                <th>updated</th>
                <th>created</th>
                <th>Action</th>
                </tr>
            </thead>
        </table>
        <div class="tabler" v-if="showPost">
		<table  class="table table-condensed table-striped table-bordered">
            <tbody>
                <!-- @foreach($posts as $post) -->
                <tr v-for="(post, index) in postsApi" :key="index">
                    <td>{{ post.post_title }}</td>
                    <td>{{ post.post_body }}</td>
                    <td>{{ post.user }}</td>
                    <td>{{ post.updated_at }}</td>
                    <td>{{ post.created_at }}</td>
                    <td>
                        <a id="btn-table" class="btn btn-primary btn-xs" :href="'post/edit?id=' + post.post_id" >Edit</a>
                        <a id="btn-table" class="btn btn-danger btn-xs" :href="'post/destroy?id=' + post.post_id" >Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        <div v-else class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
export default {
    name:"TableHeaderComponent",
    // props: {
    //     posts: {
    //         required: false
    //     }
    // },
    data(){
        return {
            postsApi: []
        }
    },
    beforeCreate() {
         axios
            .get('http://laravel.test/api/posts', {crossDomain: true})
            .then (response => (this.postsApi = response.data))
            .catch(error => console.log('Authorization failed : ' + error.message));
    },
    updated() {
        const trHeaders = document.querySelector("table > thead > tr").childElementCount

        for (let i = 1; i <= trHeaders ; i++) {
            document.querySelector(`table > thead > tr > th:nth-child(${i})`).style.width = document.querySelector(`tbody > tr:nth-child(1) > td:nth-child(${i})`).offsetWidth + 'px'
        }
    },
    computed: {
        showPost() {
            if (this.postsApi[0] == null) {
                return false;
            } else {
                return true;
            }
        }
    }
    // mounted() {
    //     let columns = document.querySelector("#app > main > div > div.row > div > table > tbody > tr:nth-child(1)").childElementCount


    //     for (let i = 0; i < columns; i++ ) {
    //     document.querySelector(`#app > main > div > div.row > table > thead > tr > th:nth-child(${i})`).style.width =
    //         document.querySelector(`#app > main > div > div.row > div > table > tbody > tr:nth-child(1) > td:nth-child(${i})`).offsetWidth + 'px'
    //     }
    // }
}
</script>

<style>
#btn-table {
        margin: 10px;

}
.theader {
    margin-bottom: 0;
}

.positionFirst {
    display: contents;
}

.spinner-border {
    top: 40%;
    left: 45%;
    position: absolute;
}
</style>
