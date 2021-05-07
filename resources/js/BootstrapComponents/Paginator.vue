<template>
    <div v-if="links.length > 3" class="d-flex justify-content-center">
        <nav>
            <ul class="pagination">
                <li v-for="(link, index) in links" v-bind:key="index" class="page-item" :class="{'active' : link.active, 'disabled' : !link.url}">
                    <a class="page-link" :href="link.url" v-html="link.label"></a>
                </li>
            </ul>
        </nav>
    </div>
    
</template>

<script>
export default {
    props: {
        links: Array
    }
}
</script>
