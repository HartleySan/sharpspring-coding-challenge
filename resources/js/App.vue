<template>
    <component
        :is="serverData.meta.page"
        :meta="serverData.meta"
        :user="serverData.user"
        :data="serverData.data"
    />
</template>

<script>
    export default {
        components: {
            LogIn: () => import('./pages/LogIn'),
            Notes: () => import('./pages/Notes'),
            NotesForm: () => import('./pages/NotesForm')
        },
        props: [
            'serverData'
        ],
        mounted() {
            console.log(this.serverData);
        }
    };
</script>