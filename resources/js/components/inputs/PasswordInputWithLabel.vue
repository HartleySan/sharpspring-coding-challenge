<template>
    <div class="passwordInputWithLabel">
        <input-label
            :label="label"
            :name="name"
            :required="required"
        />
        <password-input
            :name="name"
            v-model="inputValue"
        />
    </div>
</template>

<script>
    import InputLabel from './InputLabel';
    import PasswordInput from './PasswordInput';

    export default {
        components: {
            InputLabel,
            PasswordInput
        },
        props: [
            'label',
            'name',
            'required',
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