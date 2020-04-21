<template>
<div>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
            NEW
            </button>


    <ModalNewComponent :token="token" :user="user"/>
</div>
</template>

<script>
import ModalNewComponent from "./ModalNewComponent";
export default {
    name: 'PostsIndexComponent',
    props: {
        token: {
            required: true
        },
        user: {
            required: true
        }
    },
    components: {
        ModalNewComponent
    }
}
</script>

<style>

</style>
