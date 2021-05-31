<template>
    <footer class="text-center text-white fixed-bottom" style="background-color: rgba(0, 0, 0, 0.2);">
        <!-- Grid container -->
        <div class="container p-4 border-bottom">
            <a @click="$emit('impressum','impressum')" style="cursor: pointer"> Impressum </a>
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
</template>

<script>
export default {
    name: "SiteFooter"
}
</script>

<style scoped>

</style>
