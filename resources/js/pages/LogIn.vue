<template>
    <div class="logIn">
        <div>
            <h1><pre> _                   _____       
 | |                 |_   _|      
 | |     ___   __ _    | |  _ __  
 | |    / _ \ / _` |   | | | '_ \ 
 | |___| (_) | (_| |  _| |_| | | |
 |______\___/ \__, | |_____|_| |_|
               __/ |              
              |___/               </pre></h1>
            <form
                @submit.prevent="logIn"
            >
                <p v-if="error" class="error">{{ error }}</p>
                <text-input-with-label
                    :label="'Email Address'"
                    :name="'email'"
                    :required="true"
                    v-model="email"
                />
                <password-input-with-label
                    :label="'Password'"
                    :name="'password'"
                    :required="true"
                    v-model="password"
                />
                <div>
                    <btn
                        :label="'Log In'"
                        :type="'submit'"
                    />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Btn from '../components/Btn';
    import PasswordInputWithLabel from '../components/inputs/PasswordInputWithLabel';
    import TextInputWithLabel from '../components/inputs/TextInputWithLabel';

    import axios from '../lib/axios';

    export default {
        components: {
            Btn,
            PasswordInputWithLabel,
            TextInputWithLabel
        },
        data() {
            return {
                email: null,
                password: null,
                error: null
            };
        },
        methods: {
            async logIn() {
                this.error = null;

                const data = await axios.postData('/log-in', {
                    email: this.email,
                    password: this.password
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