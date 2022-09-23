<template>
    <div>
    <input type="text" id="input" placeholder="Enter email">



    <button @click="hitSend()" type="button">Send</button>


    </div>
</template>


<script>
    export default {

        created() {




        },
        methods: {
            hitSend() {
                const input = document.getElementById('input');

                axios({
                    method: 'get',
                    url: '/api/send-mail?email='+input.value,

                }).
                then(res => {
                    if(res.data === 200) {




                        this.$router.push({name: 'verify.code'});

                    }

                });
            },
        },

    }
</script>