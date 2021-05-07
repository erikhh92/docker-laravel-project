<template>
    <table class="table mb-0">
        <thead>
            <tr>
                <th v-if="numbered" scope="col">#</th>
                <th scope="col" class="text-capitalize" v-for="(field, index) in fields" v-bind:key="index">{{ field }}</th>
                <th v-if="actions" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in filteredItems" v-bind:key="item.id">
                <th v-if="numbered" scope="row">{{ index + 1 }}</th>
                <td v-for="(field, fieldIndex) in fields" v-bind:key="fieldIndex">{{ item[field] }}</td>
                <td v-if="actions">
                    <slot :item="item" name="action-cell">
                        {{ item[field] }}
                    </slot>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>

export default {
    props: {
        filterValue: {
            type: String,
            default: ''
        },
        numbered: {
            type: Boolean,
            default: false
        },
        actions: {
            type: Boolean,
            default: false
        },
        items: Array,
        fields: Array,
        title: {
            type: String,
            default: 'Titulo por defecto'
        }
    },
    computed: {
        filteredItems() {
            if(this.filterValue.length > 0) {
                return this.items.filter(item => {
                    return this.filterValue.toLowerCase().split(' ').every(v => item.title.toLowerCase().includes(v) || item.author.toLowerCase().includes(v))
                })
            }

            return this.items
        }
    }
}
</script>