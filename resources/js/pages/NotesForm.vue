<template>
    <div class="notesForm">
        <h2>{{ edit ? 'Edit a Note' : 'Add a New Note' }}</h2>
        <form
            @submit.prevent="addEdit"
        >
            <p v-if="error" class="error">{{ error }}</p>
            <text-input-with-label
                :label="'Title'"
                :name="'title'"
                :required="true"
                v-model="title"
            />
            <textarea-input-with-label
                :label="'Body'"
                :name="'body'"
                :required="true"
                v-model="body"
            />
            <div>
                <btn
                    :label="edit ? 'Edit' : 'Add'"
                    :type="'submit'"
                />
            </div>
        </form>
    </div>
</template>

<script>
    import Btn from '../components/Btn';
    import TextareaInputWithLabel from '../components/inputs/TextareaInputWithLabel';
    import TextInputWithLabel from '../components/inputs/TextInputWithLabel';

    import axios from '../lib/axios';

    export default {
        components: {
            Btn,
            TextareaInputWithLabel,
            TextInputWithLabel
        },
        props: [
            'user',
            'data'
        ],
        data() {
            const data = this.data;

            return {
                title: data.title || null,
                body: data.body || null,
                error: null
            };
        },
        computed: {
            edit() {
                return !!this.data.edit;
            },
            id() {
                return this.data.id;
            }
        },
        methods: {
            async addEdit() {
                this.error = null;

                const method = this.edit ? 'patchData' : 'postData';
                const url = this.edit ? `/notes/${this.id}` : '/notes';

                const data = await axios[method](url, {
                    title: this.title,
                    body: this.body
                });

                if (data.success) {
                    location.assign('/notes');
                } else if (data.error) {
                    this.error = data.msg;
                }
            }
        }
    };
</script>