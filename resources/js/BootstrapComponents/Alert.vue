<template>
    <div class="alert" :class="`alert-${variant}`" role="alert">
        <slot>{{ text }}</slot>
        <button v-if="closable" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>

<script>
export default {
    props: {
        text: String,
        variant: {
            type: String,
            default: 'primary'
        },
        closable: Boolean
    }
}
</script>