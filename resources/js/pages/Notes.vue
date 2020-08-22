<template>
    <div class="notes">
        <h2>Welcome, {{ user.name }}!</h2>
        <ul class="btns">
            <li>
                <a
                    href="/notes/create"
                    class="siteBtn"
                >New Note</a>
            </li>
            <li>
                <a
                    href="/log-out"
                    class="siteBtn gray"
                >Log Out</a>
            </li>
        </ul>
        <ul
            v-if="notes.length"
            class="noteCards"
        >
            <li
                v-for="(note, idx) in notes"
                :key="note.id"
            >
                <div
                    v-if="note.id !== confirmDeleteId"
                    :class="{
                        recentlyAddedEdited: note.time_diff <= 10
                    }"
                >
                    <div class="links">
                        <a :href="`/notes/${note.id}/edit`">Edit</a>
                        <a
                            href=""
                            @click.prevent="confirmDelete(note.id)"
                        >Delete</a>
                    </div>
                    <h3>{{ note.title }}</h3>
                    <p class="meta">(created by {{ user.name }}, {{ note.created_at_formatted }})</p>
                    <p
                        v-html="note.body.replace(/\n/g, '<br>')"
                        class="body"
                        :class="{
                            clamp: !note.isShowingMore
                        }"
                    ></p>
                    <p
                        v-if="note.canShowMore"
                        class="toggleMoreText"
                    >
                        <a
                            href=""
                            @click.prevent="toggleMoreText(idx)"
                        >Show {{ note.isShowingMore ? 'Less' : 'More' }}</a>
                    </p>
                </div>
                <div
                    v-else
                    class="confirmingDeletion"
                >
                    <p>Are you serious?! Why would you want to delete me? Well, if you insist, you have but only to click the green button.</p>
                    <ul>
                        <li>
                            <Btn
                                :label="'Yes!'"
                                @click.native="deleteNote"
                            />
                        </li>
                        <li>
                            <Btn
                                :label="'No!'"
                                class="gray"
                                @click.native="confirmDeleteId = null"
                            />
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <p v-else>(No notes. Please add some notes to see them here.)</p>
    </div>
</template>

<script>
    import Btn from '../components/Btn';

    import axios from '../lib/axios';

    export default {
        components: {
            Btn
        },
        props: [
            'user',
            'data'
        ],
        data() {
            return {
                notes: this.data.notes,
                confirmDeleteId: null
            };
        },
        mounted() {
            this.setShowMores();
        },
        methods: {
            setShowMores() {
                let showMores = [];

                [].slice.call(this.$el.querySelectorAll('.noteCards .body')).forEach((elem) => {
                    showMores.push(elem.offsetHeight < elem.scrollHeight);
                });

                this.notes = this.notes.map((note, i) => {
                    note.canShowMore = showMores[i];
                    note.isShowingMore = false;

                    return note;
                });
            },
            confirmDelete(id) {
                this.confirmDeleteId = id;
            },
            async deleteNote() {
                await axios.deleteData(`/notes/${this.confirmDeleteId}`);

                this.notes = this.notes.filter((note) => note.id !== this.confirmDeleteId);

                this.confirmDeleteId = null;
            },
            toggleMoreText(idx) {
                this.notes = this.notes.map((note, i) => {
                    if (i === idx) {
                        note.isShowingMore = !note.isShowingMore;
                    }

                    return note;
                });
            }
        }
    };
</script>