<template>
                    <div class="row">
                        <div class="col-12 pt-4 pb-4">
                            <div class="row">
                                <div class="col ">
                                    <h4 class="text-left pb-2 b-color-primary result-title">Simply enter your data</h4>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                <button class="mb-0  btn btn-primary minifyButton" @click="callBeautify">Run Minify</button>
                                <label class="text-lg-center text-md-center mdLabel text-success font-weight-bold text-right wrpper-inner-text mx-auto pl-5 pr-5"  v-if="clickMsg">{{clickMsg}}</label>
                                <button v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success" type="button">Copy Output</button>
                            </div>
                            <div class="row">
                                    <!-- Two-way Data-Binding -->
                                     <div class="col-md-6">
                                         <codemirror class="editablediv" v-model="content" :options="cmOptions1" />
                                     </div>

                                    <div class="col-md-6">
                                        <codemirror class="editablediv" v-model="contentResult"
                                                    ref="cmEditor"
                                                    :options="cmOptions"
                                        />
                                    </div>
                            </div>
                        </div>
                    </div>


</template>

<script>

    import { codemirror } from 'vue-codemirror'
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
    // import base style
    import 'codemirror/lib/codemirror.css'
    export default {
        components: {
            codemirror
        },
        data() {
            return {
                content: '',
                contentResult: '',
                clickMsg: '',
                cmOptions1: {
                    tabSize: 4,
                    mode: 'js',
                    theme: 'mbo',
                    lineNumbers: true,
                    line: true,
                },
                cmOptions: {
                    tabSize: 4,
                    mode: 'js',
                    theme: 'rubyblue',
                    lineNumbers: true,
                    line: true,
                }
            };
        },
        computed: {
            codemirror() {
                this.callBeautify();
                return this.$refs.cmEditor.codemirror
            }
        },
        mounted() {
            mixpanel.track("loaded: JS Minify");
        },
        methods: {
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },

            callBeautify() {
                mixpanel.track("trigger: JS Minify");
                axios.post('minify', {content:this.content, content_type:'js'}).then(response => {
                    this.contentResult =  response.data.uglify
                }).catch(error => {
                    console.log(error)
                    this.loaded = true;
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors || {};
                    }
                });
                //this.contentResult =  this.content
            },
        }
    }
</script>
