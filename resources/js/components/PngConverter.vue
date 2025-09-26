<template>
    <div class="row">
        <div class="col-12 pt-4 pb-4">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="input-group mb-3">
                        <vue-dropzone  v-on:vdropzone-success="uploadSuccess" ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                    </div>
                    <div v-if="errors.url" class="text-danger">{{ errors.url[0] }}</div>

                    <!-- show download controls when upload returns a URL -->
                    <div v-if="content && (content.url || content.file_id)" class="mt-3">
                        <div class="d-flex align-items-center">
                            <button :disabled="isDownloading" @click="downloadPng" class="btn btn-primary mr-2" type="button">Download PNG</button>
                            <button @click="actionMore" class="btn btn-outline-secondary" type="button">Upload Another</button>
                            <div class="ml-3">
                                <span v-if="!isDownloading" class="text-success">Ready to download</span>
                                <span v-else class="text-primary"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> Downloading...</span>
                            </div>
                            <small class="text-muted ml-3" v-if="content.file_id">&nbsp;File id: {{ content.file_id }}</small>
                        </div>
                    </div>
                    <!-- debug output removed -->
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
                isDownloading: false,
                lastXhrResponse: null,
                dropzoneOptions: {
                    url: '/file-upload',
                    thumbnailWidth: 150,
                    maxFilesize: 5,
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
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
                // Normalize different possible response shapes from vue-dropzone / server
                let data = response;
                try {
                    // sometimes response is a JSON string
                    if (typeof response === 'string') {
                        data = JSON.parse(response);
                    }
                    // sometimes response is wrapped (response.response)
                    if (data && data.response) {
                        data = data.response;
                    }
                } catch (e) {
                    // ignore parse errors
                }

                // fallback: some dropzone builds put the raw xhr response on file.xhr
                if (( !data || !data.url ) && file && file.xhr && file.xhr.response) {
                    try {
                        const parsed = JSON.parse(file.xhr.response);
                        if (parsed) data = parsed;
                    } catch (e) {
                        // maybe it's already a URL string
                        if (file.xhr.response && file.xhr.response.indexOf('http') === 0) {
                            data = { url: file.xhr.response };
                        }
                    }
                }

                // If server returned a plain URL string, wrap it
                if (typeof data === 'string') {
                    this.content = { url: data };
                } else {
                    this.content = data || { url: '' };
                }
                // normalized content set for UI
            },
            actionMore() {
                this.clickMsg = this.content = this.contentResult =  '';
                this.errors = {}
                // clear dropzone files so user can upload again
                if (this.$refs.myVueDropzone && this.$refs.myVueDropzone.removeAllFiles) {
                    this.$refs.myVueDropzone.removeAllFiles(true);
                }
            },
                        backLink(){
                                // kept for legacy UI; no debug logging
                        },
            copyToClipboard() {
                this.clickMsg  = 'Copied!';
                setTimeout(function() { this.clickMsg = ''; }.bind(this), 5000);

            },
            async downloadPng() {
                if (!this.content) return;
                let url = this.content.url;
                // if we only have file_id, ask the backend for the URL
                if ((!url || url === '') && this.content.file_id) {
                    try {
                        const res = await axios.get('/file-download-url/' + this.content.file_id, { withCredentials: true });
                        url = (res && res.data && res.data.url) ? res.data.url : null;
                        // store it for future
                        if (url) this.content.url = url;
                    } catch (e) {
                        console.error(e);
                        this.$alertify.error('Could not resolve download URL');
                        return;
                    }
                }
                if (!url) return;
                this.isDownloading = true;
                try {
                    // fetch binary data as blob from server
                    const response = await axios.get(url, { responseType: 'blob', withCredentials: true });
                    const blob = response.data;

                    if (!blob || blob.size === 0) {
                        // fallback: navigate to download URL which uses browser's download flow
                        window.location.href = url;
                        return;
                    }

                    // derive filename from hash or fallback
                    let filename = 'converted.png';
                    if (this.content.url) {
                        // try to extract hash from URL (/download-png/{hash})
                        const m = this.content.url.match(/download-png\/(.+)$/);
                        if (m && m[1]) {
                            filename = 'converted-' + m[1] + '.png';
                        }
                    }
                    // create temporary link to trigger download
                    const objectUrl = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = objectUrl;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(objectUrl);
                    a.remove();
                } catch (err) {
                    console.error('PngConverter: download error', err);
                    // fallback: open the URL directly so the browser handles the download
                    try { window.location.href = url; } catch (e) {}
                    this.$alertify.error('Failed to download PNG via XHR; opened in new tab instead.');
                } finally {
                    this.isDownloading = false;
                }
            },
        }
    }
</script>
