<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Modal title
                    </h5>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/post/store">
                    <input type="hidden" name="_token" :value="token">
                    <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="exampleInputtext1">text address</label>
                            <input
                                name="post_title"
                                type="text"
                                class="form-control"
                            />
                            <small id="textHelp" class="form-text text-muted"
                                >We'll never share your text with anyone
                                else.</small
                            >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputtext1">text address</label>
                            <input
                                name="post_body"
                                type="text"
                                class="form-control"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                name="user"
                                type="hidden"
                                class="form-control"
                                :value="user"
                            />
                        </div>

                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Submit"
                        />
                    </form>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalNewComponent",
    props: {
        token: {
            required: true
        },
        user: {
            required: true
        }
    },
    data: {
        return: {
            load: false
        }
    },
    methods: {
        loading() {
            this.load = true
        }
    }
};
</script>

<style></style>
