<template>
    <div class="textInputWithLabel">
        <input-label
            :label="label"
            :name="name"
            :required="required"
        />
        <text-input
            :name="name"
            v-model="inputValue"
            :placeholder="placeholder"
        />
    </div>
</template>

<script>
    import InputLabel from './InputLabel';
    import TextInput from './TextInput';

    export default {
        components: {
            InputLabel,
            TextInput
        },
        props: [
            'label',
            'name',
            'required',
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