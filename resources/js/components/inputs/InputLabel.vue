<template>
    <div class="label">
        <label :for="name">{{ label }}<span v-if="required" class="required">*</span></label>
    </div>
</template>

<script>
    export default {
        props: [
            'label',
            'name',
            'required'
        ]
    };
</script>