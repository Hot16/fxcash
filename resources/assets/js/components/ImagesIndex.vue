<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Загрузить изображения</div>
            <div class="panel-body">
                <form>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Выберете файлы</label>
                            <input type="file" @change="uploadFiles" class="form-control" multiple>
                        </div>
                    </div>

                    <div class="row" v-if="error.length>0">
                        <div class="col-xs-12 form-group">
                            <strong>{{error}}</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success" @click="upload">Загрузить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel panel-default">
             <button @click="clearStorage" class="btn btn-danger" :disabled="images.length<1">Очистить хранилище</button>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Загруженные изображения
            </div>
            <div class="panel-body" v-if="images.length>0">
                <div v-for="image, index in images">
                    <img :src="'/files/'+image.name" />
                </div>
            </div>
            <div class="panel-body" v-else>
                Нет загруженных изображений
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                images: [],
                newImages: new FormData(),
                error: ''
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/img')
                .then(function (resp) {
                    app.images = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);

                });
        },
        methods:{
            clearStorage(){
                var app = this;
                axios.get('/api/img/clear')
                    .then(function (resp) {
                        console.log(resp);
                        app.images = resp.data;
                    })
                    .catch(function (resp) {
                        console.log(resp);
                    });
            },

            uploadFiles(e){
                e.preventDefault();
                var files = e.target.files || e.dataTransfer.files;
                var app = this;
                console.log('files', files);
                for (var i = files.length - 1; i >= 0; i--) {
                    app.newImages.append('newimages[]', files[i]);
                }


            },
            upload(){
                console.log('post', this.newImages);
                var app = this;
                axios.post('/api/img', this.newImages)
                    .then(function (resp) {

                        if (resp.data.error){
                            app.error = resp.data.error;
                        } else {
                            app.images = resp.data;
                        }
                    })
                    .catch(function (resp) {
                        console.log('error', resp);
                        alert('Не срослось');
                    })
            }
        }
    }
</script>
