<template>
<transition name="fade" mode="out-in">
    <div class="container">
        <div v-if="!num" class="jumbotron shadow-ligth">
            <p class="lead">This is a simple hero unit, a simple jumbotron-style.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the container.</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
            Modal
            </button>
        </div>
        <div v-else class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example</div>

                    <div class="card-body">
                        Numero por get en componente vue : {{ num }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <TabsComponent :posts="posts"></TabsComponent>
        <CardComponent></CardComponent>
        <ModalComponent></ModalComponent>
        </div>
    </div>
</transition>
</template>

<script>
import ModalComponent from "./ModalComponent";
import TabsComponent from "./TabsComponent";
import CardComponent from "./CardComponent";
    export default {
        props: {
            num: {
                type: Number,
                required: false
            }
        },
        data() {
            return {
                posts: []
            }
        },
        components: {
            ModalComponent,
            TabsComponent,
            CardComponent
        },
        mounted() {
            console.log('Component mounted.')
        },
        beforeCreate() {
                    axios
                    .get('http://laravel.test/api/posts', {crossDomain: true})
                    .then (response => (this.posts = response.data))
                    .catch(error => console.log('Authorization failed : ' + error.message));
        }
    }
</script>

<style>
html {
    scroll-behavior: smooth;
}

.row {
    margin-right: 0;
    margin-left: 0;
    justify-content: space-between;
}

@media (min-width: 576px){
.jumbotron {
    padding: 4rem 3rem;
}
}

.jumbotron{
    background: url('http://laravel.test/storage/images/download.png') center !important;
}
.my-4 {
    margin-left: 0px;
    width: 65%;
}
.lead {
    margin-top: 5em;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}

::-webkit-scrollbar {
    width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 20%;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>
