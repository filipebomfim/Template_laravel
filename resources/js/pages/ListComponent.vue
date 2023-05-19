<template>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuários</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-around" v-for="user in users" :key="user.id">
                            <li>{{ user.name }}</li>
                            <li>{{user.email}}</li>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted(){
        this.listUsers()
    },
    data(){
        return{
            users:[]
        }
    },
    methods:{
        listUsers(){
            axios({
                method: 'GET',
                url:'/api/v1/users'
            }).then(response =>{
                this.users = response.data.users
            })
        }
    }
}
</script>

<style>

</style>