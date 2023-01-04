import Cropper from 'cropperjs'

document.addEventListener("alpine:init", () => {
    Alpine.data('curation', (config) => ({
        statePath: config.statePath,
        filename: config.filename,
        filetype: config.filetype,
        cropper: null,
        init() {
            this.destroy();
            this.initCropper();
        },
        destroy() {
            if (this.cropper == null) return;
            this.cropper.destroy();
            this.cropper = null;
        },
        async initCropper() {
            this.cropper = new Cropper(this.$refs.cropper, {});
        },
        saveCuration() {
            let data = this.cropper.getData(true);
            this.$wire.saveCuration(data);
        }
    }));
})
