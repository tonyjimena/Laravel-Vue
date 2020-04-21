<template>
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</template>

<script>
export default {
    name: "ScrollLoadComponent",
    created() {
        window.onscroll = () => this.scrollLoad();
    },
    methods: {
        scrollLoad() {
            var winScroll =
                document.body.scrollTop || document.documentElement.scrollTop;
            var height =
                document.documentElement.scrollHeight -
                document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }
    }
};
</script>

<style lang="scss" scoped>
@import '../../sass/variables';
/* The progress container (grey background) */
.progress-container {
        z-index: 99;
    width: 100%;
    height: 8px;
    background: #ccc;
    position: fixed;
    top: 50px;
}

/* The progress bar (scroll indicator) */
.progress-bar {
    height: 8px;
    background: $blue;
    width: 0%;
}
</style>
