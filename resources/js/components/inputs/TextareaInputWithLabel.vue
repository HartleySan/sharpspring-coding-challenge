<template>
    <div class="textareaInputWithLabel">
        <input-label
            :label="label"
            :name="name"
            :required="required"
        />
        <textarea-input
            :name="name"
            v-model="inputValue"
            :placeholder="placeholder"
        />
    </div>
</template>

<script>
    import InputLabel from './InputLabel';
    import TextareaInput from './TextareaInput';

    export default {
        components: {
            InputLabel,
            TextareaInput
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