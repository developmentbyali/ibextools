<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="input-group mb-3">
                        <vue-dropzone  v-on:vdropzone-success="uploadSuccess" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                    </div>
                    <div v-if="errors.url" class="text-danger">{{ errors.url[0] }}</div>
                    <h1>I am here {{content}}</h1>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    import { codemirror } from 'vue-codemirror'
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    import VueAlertify from 'vue-alertify';
    import 'codemirror/theme/cobalt.css';
    Vue.use(VueAlertify);
    // import base style
    import 'codemirror/lib/codemirror.css'
    export default {
        components: {
            codemirror, vueDropzone: vue2Dropzone
        },
        data() {
            return {
                clickMsg: '',
                content: '',
                contentResult: '',
                errors:{},
                dropzoneOptions: {
                    url: '/file-upload',
                    thumbnailWidth: 150,
                    maxFilesize: 5,
                    hacceptedFiles: ".jpeg,.jpg,.png,.gif",
                    autoDiscover : true,
                    clickable : true,
                    uploadMultiple :false,
                    addRemoveLinks:true,
                    context: this,
                    headers: {
                        "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                    },
                }
            };
        },
        methods: {
            uploadSuccess: function(file, response) {
                this.content = response
            },
            actionMore() {
                this.clickMsg = this.content = this.contentResult =  '';
                this.errors = {}
            },
            backLink(){
              let links=this.content;
                console.log(links)
                let pageTags=document.getElementsByTagName("*").length;
                console.log('pageTags',pageTags)
		       },
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },
        }
    }
</script>
