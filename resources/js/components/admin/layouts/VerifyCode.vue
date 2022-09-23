<template>
    <div>
        <h1>
            Enter 5 didit code
        </h1>
        <input type="tel" id="code">
        <button @click="sendCode()">Submit</button>
    </div>
</template>


<script>
    export default {
        methods: {
            sendCode() {
             let code = parseInt(document.getElementById('code').value);
                axios({
                    method: 'get',
                    url: '/api/verify-code?code='+code,

                }).
                    then(res => {

                        if(res.data === 200) {

                            this.$router.push({name: 'change.password'});

                        }
                });



            },
        }
    }




</script>



