<template>
    <div class="alert" :class="`alert-${status.type}`" role="alert">
        {{ status.message }}
    </div>
</template>

<script>
export default {
    props: {
        status: Object
    }
}
</script>