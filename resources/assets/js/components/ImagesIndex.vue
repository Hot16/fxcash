<template>
    <div>
        <router-link :to="{name:'ImagesStore'}" class="btn btn-success">Загрузить изображения</router-link>
        <router-link :to="{name:'ImagesDestroy'}" class="btn btn-danger">Очистить хранилище</router-link>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Загруженные изображения
        </div>
        <div class="panel-body">
            <div v-for="image, index in images">
                <img src="images/{{ image.name }}"/>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data:function () {
            return {
                images: []
            }
        },
        mounted(){
            var app = this;
            axios.get('')
        }
    }
</script>

<style scoped>

</style>