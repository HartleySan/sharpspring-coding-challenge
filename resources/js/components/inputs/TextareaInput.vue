<template>
    <div class="textareaInput">
        <textarea
            :name="name"
            v-model="inputValue"
            :placeholder="placeholder"
        ></textarea>
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