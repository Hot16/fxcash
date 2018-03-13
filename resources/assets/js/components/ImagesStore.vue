<template>
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

                <div class="row">
                    <div class="col-xs-12 form-group">
                        <button class="btn btn-success" @click="upload">Загрузить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</template>

<script>
    export default {
        data(){
            return {
                images:new FormData()
            }
        },
        methods:{
            uploadFiles(e){
                var files = e.target.files || e.dataTransfer.files;
console.log(files);
                for (var i = files.length - 1; i >= 0; i--) {
                    this.images.append('images[]', files[i]);
                }

            },
            upload(){
                axios.post('/api/img', this.images)
                    .then(function (resp) {
                        console.log(resp);
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert('Не срослось');
                    })
            }
        }
    }
</script>
