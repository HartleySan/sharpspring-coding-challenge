<template>
    <div class="passwordInput">
        <input
            type="password"
            :name="name"
            v-model="inputValue"
        >
    </div>
</template>

<script>
    export default {
        props: [
            'name',
            'value'
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