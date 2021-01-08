<template>
    <div>
    <sw-card class="my-4">

        <template v-slot:header>
            <span class="sw-section-title">Add Product</span>
        </template>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-5">
            <div class="col-span-4">

                <sw-input-group variant="horizontal" label="Brand" class="my-10">
                    <sw-input />
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Name" class="my-10">
                    <sw-input />
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Description" class="my-10">
                    <sw-textarea />
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Category" class="my-10">
                    <sw-select
                    v-model="database_connection1"
                    :options="option"
                    :searchable="true"
                    :show-labels="false"
                    :allow-empty="true"
                    :multiple="false"
                    placeholder="select a category"
                    />
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Price" class="my-10">
                    <sw-input type="text" name="Price">
                        <template v-slot:leftIcon>
                            <i class="fas fa-rupee-sign ml-3 mr-2"></i>
                            <!-- <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd"></path></svg> -->
                        </template>
                    </sw-input>
                </sw-input-group>

                <sw-input type="file" class="d-flex justify-content-end sw-section-title" variant="primary">Upload Image
                </sw-input>

            </div>
        </div>

        <template v-slot:footer>
            <div class="flex justify-end">
                <sw-button variant="primary-outline" class="mr-2" tag-name="router-link" to="/admin/product">Cancel</sw-button>
                <sw-button variant="primary">
                    <svg class="h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.707 10.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V6h5a2 2 0 012 2v7a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h5v5.586l-1.293-1.293zM9 4a1 1 0 012 0v2H9V4z"></path>
                    </svg>
                    Save
                </sw-button>
            </div>
        </template>

    </sw-card>
    </div>
</template>

// <script>
// export default {
//     data() {
//         return {
//             option: ['Watches', 'Mobiles', 'Laptops', 'Tablets']
//         }
//     }
// }
// </script>
<script>

export default {
    data() {
        return {
            option: ['Watches', 'Mobiles', 'Laptops', 'Tablets'],
            dropzoneOptions: {
            autoProcessQueue: false,
            url: `https://httpbin.org/post`,
            thumbnailWidth: 150,
            thumbnailHeight: 150,
            maxFilesize: 1,
            maxFiles: 10,
            parallelUploads: 5,
            uploadMultiple: true,
            dictDefaultMessage: 'drag and drop',
            dictCancelUpload: 'cancel',
            dictRemoveFile: 'remove',
            dictInvalidFileType: 'This file type is not supported.',
            dictFileTooBig: 'File size too Big',
            addRemoveLinks: false,
            method: 'post'
            },
            previewAvatar: '',
            cropperOutputMime: '',
            fileSizeInKb: null,
            fileObject: null,
        }
    },
    methods: {
        onChange(file) {
            this.fileSizeInKb = parseFloat(file.size / 1024).toFixed(2)
            this.cropperOutputMime = file.type
            this.fileObject = file
        },
        onUploadHandler(cropper) {
            this.previewAvatar = cropper
            .getCroppedCanvas()
            .toDataURL(this.cropperOutputMime)
        },
        onHandleUploadError() {
            console.log('Oops! Something went wrong...')
        }
    }
}
</script>



<style scoped>

i {
    font-size: 13px;
}

</style>


<!-- <sw-input-group variant="horizontal" label="Surname" class="my-10">
                    <sw-input />
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Email" class="my-10">
                    <sw-input type="email" class="w-64"/>
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Phone Number" class="my-10">
                    <sw-input>
                        <template v-slot:leftIcon>
                            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                            </svg>
                        </template>
                    </sw-input>
                </sw-input-group>

                <sw-input-group variant="horizontal" label="Register No." class="my-10">
                    <sw-input prefix="REG" />
                </sw-input-group> -->