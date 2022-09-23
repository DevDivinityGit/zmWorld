<template>

    <div>




        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9">






                    <div class="form-group">

                    <input class="form-control" type="file" @change="showImage($event)">

                    <button @click="hitSubmit()" class="btn btn-secondary">Upload</button>

                    </div>




                    <div id="upload-box" class="row">

                    </div>








                </div>

            </div>





        </div>






    </div>


</template>


<script>
    export default {


        data() {
            return {

                  theFiles: [],
                  imageLength: 0,

            };

        },


        methods: {
            hitSubmit() {
                axios({
                    method: 'post',
                    url: '/api/promotion-images',

                    headers: {
                        // 'Content-Type': 'multipart/form-data',

                    },
                    data: {
                        imageFile: JSON.stringify(this.theFiles),
                        imageLength: this.imageLength,
                    },
                }).
                then(res => {


                    if(res.data === 200) {
                        this.$router.push({name: 'promotion.images.all'})

                    }



                });

            },





            showImage(e) {



                this.imageLength += 1;





                const image = new FileReader();











                // this.images.push(image[0]);
                image.readAsDataURL(e.target.files[0]);





                let that = this;

                image.onload = (e) => {

                    let imageBase = e.target.result;


                    let el = `<img src="${imageBase}" style="width: 100%; height: 300px;">`;

                    const div = document.createElement('div');
                    div.classList.add('col-sm-3');

                    div.innerHTML = el;
                    if(imageBase) {
                        this.theFiles.push(imageBase);
                        // that.images.push(imageBase);
                    }


                    document.getElementById('upload-box').append(div);












                }








            }



        },




    }
</script>