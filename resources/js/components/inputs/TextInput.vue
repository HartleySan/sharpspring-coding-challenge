<template>
    <div class="textInput">
        <input
            type="text"
            :name="name"
            v-model="inputValue"
            :placeholder="placeholder"
        >
    </div>
</template>

<script>
    export default {
        props: [
            'name',
            'value',
            'placeholder'
        ],
        computed: {
            inputValue: {
                get() {
                    return this.value;
                },
                set(value) {
                    this.$emit('input', value);
                }
            }
        }
    };
</script>