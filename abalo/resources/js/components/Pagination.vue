<template>
    <nav class="Page">
        <ul class="pagination">
            <li class="page-item">
                <a v-if="pagination.prevPageUrl" class="page-link" aria-label="Previous" @click="$emit('prev');">
                    Prev
                </a>


                <a class="page-link" aria-label="Previous" v-else :disabled="true">
                    Prev
                </a>
            </li>
            <li class="page-item">
                <a v-if="pagination.nextPageUrl" class="page-link" aria-label="Next" @click="$emit('next');">
                    Next
                </a>

                <a class="page-link" aria-label="Next" v-else :disabled="true">
                    Next
                </a>
            </li>
            <li class="page-item disabled">
                <a class="page-link">{{pagination.from}} - {{pagination.to}} of {{pagination.total}}</a>
            </li>
        </ul>


    </nav>

</template>

<script>
export default {
    props: ['pagination', 'client', 'filtered']
}
</script>
