<template>
    <button
        :type="type || 'button'"
        class="siteBtn"
    >{{ label }}</button>
</template>

<script>
    export default {
        props: [
            'label',
            'type'
        ]
    };
</script>