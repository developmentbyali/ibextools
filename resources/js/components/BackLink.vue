<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input v-if="!contentResult" v-model="content" type="url"  class="form-control" placeholder="Enter or Paste URL here" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input v-if="contentResult" readonly v-model="contentResult.link.full_url" type="url"  class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button v-if="!contentResult" @click="backLink" class="btn btn-primary" type="button">Make BackLink URL</button>
                            <button v-if="contentResult" v-clipboard="contentResult.link.full_url" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success position-relative" type="button">Cope Short Link</button>
                            <span class="position-absolute text-success font-weight-bold" style="top: -26px;right: 46px;" v-if="clickMsg">{{clickMsg}}</span>
                        </div>
                    </div>
                    <div v-if="errors.url" class="text-danger">{{ errors.url[0] }}</div>
                </div>
            </div>
        </div>

    </div>


</template>
<script>

    import { codemirror } from 'vue-codemirror'
    import VueAlertify from 'vue-alertify';
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
    Vue.use(VueAlertify);
    // import base style
    import 'codemirror/lib/codemirror.css'
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                clickMsg: '',
                content: '',
                contentResult: '',
                errors:{}
            };
        },
        methods: {
            actionMore() {
                this.clickMsg = this.content = this.contentResult =  '';
                this.errors = {}
            },
            backLink(){
                this.errors = {};
                if (!this.content || this.content.trim() === '') {
                    this.errors = { url: ['Please enter a URL.'] };
                    return;
                }
                // follow pattern used in ShortUrl.vue: POST to a backend endpoint
                axios.post('backlink', { url: this.content }).then(response => {
                    // expected response shape: { link: { full_url: '...' , url: 'original' } }
                    this.contentResult = response.data;
                }).catch(error => {
                    if (error.response && error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    } else {
                        // generic user-friendly message
                        this.$alertify.error('Could not create backlink.');
                    }
                });
            },
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },
        }
    }
</script>
