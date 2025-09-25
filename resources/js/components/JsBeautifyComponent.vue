<template>
    <div>
        <div class="row">
            <div class="col-12 pt-4 pb-4">
                <div>
                    <div>
                        <h2 class="text-left pb-2 b-color-primary result-title">Simply enter your data : <i class="fas pl-1 fa-arrow-alt-circle-down"></i></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                        <!-- Two-way Data-Binding -->
                        <codemirror class="editablediv" v-model="content"
                                    :options="cmOptions1"
                        />
                    </div>
                    <div class="text-center col-xl-2 col-lg-6 col-md-12 col-sm-12 mx-lg-auto pt-3 ">

                        <div class="buttonWrappers text-center mb-3 mt-2 ">
                            <button title="Run"  class="mb-0 ml-0 btn btn-primary minifyButton mx-auto  w-75 mb-2" @click="jsbeautify()">JS Beautifier</button>
                        </div>

                        <div class="buttonWrappers text-center mb-3 mt-2 ">
                            <button data-toggle="modal" data-target="#exampleModal" v-if="contentResult" v-clipboard="contentResult" @click="copyToClipboard" id="copytoClipboard" class="btn btn-success w-75 mb-2" type="button" title="copy">Copy Output<i class="pl-3 fas fa-copy"></i></button>
                            </div>
                        <div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title text-success" id="exampleModalLabel"></h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-success">Copied</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                        <codemirror v-if="d_visible" class="editablediv" v-model="contentResult"
                                    ref="cmEditor"
                                    :options="cmOptions"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { codemirror } from 'vue-codemirror'
    import VueAlertify from 'vue-alertify';
    import sqlFormatter from "sql-formatter";
    // import base style
    import 'codemirror/lib/codemirror.css'
    import 'codemirror/theme/mbo.css';
    import 'codemirror/theme/rubyblue.css';
    Vue.use(VueAlertify);
    import'codemirror/addon/selection/active-line.js'
    export default {
        components: {
            codemirror
        },
        data()
        {
            return {
                clickMsg: '',
                content: '',
                contentResult: '',
                d_visible:true,
                sha1_text:'',
                cmOptions1: {
                    tabSize: 4,
                    mode: 'js',
                    theme: 'mbo',
                    styleActiveLine: true,
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
              //  this.callBeautify();
             //   return this.$refs.cmEditor.codemirror
                }
            },
        mounted() {
            mixpanel.track("loaded: Js Beautify");

        },
        methods: {

            jsbeautify() {
                mixpanel.track("trigger: Js Beautify");
                this.contentResult = Beautify(this.content);
            },

            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },


        } //methods end-bracket
    } //export default end-bracket
</script>
