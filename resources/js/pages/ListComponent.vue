<template>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuários</div>
                    <div class="card-body" v-if ="loading">
                        <div class="d-flex justify-content-center align-items-center"  style="min-height: 200px;">
                            <looping-rhombuses-spinner
                            :animation-duration="2500"
                            :rhombus-size="15"
                            color="#ff1d5e"
                        />
                        </div> 
                    </div>
                    <div class="card-body" v-else>                        
                        <div v-if="can('view users')">
                            <div class="d-flex justify-content-around" v-for="user in users" :key="user.id" >
                                <li>{{ user.name }}</li>
                                <li>{{user.email}}</li>
                            </div>  
                        </div>   
                        <div v-else> VOCE NAO TEM PERMISSAO PARA VER OS USUÀRIOS </div>                                                                 
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Permissões</div>
                    <div class="card-body" v-if ="loading">
                        <div class="d-flex justify-content-center align-items-center"  style="min-height: 200px;">
                            <looping-rhombuses-spinner
                            :animation-duration="2500"
                            :rhombus-size="15"
                            color="#ff1d5e"
                        />
                        </div> 
                    </div>
                    <div class="card-body" v-else>                            
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Permitir Ver Usuários</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{user.name}}</td>
                                    <td>{{ user.email }}</td>
                                    <td><button class="btn btn-success btn-rounded" @click="atribuirPermissao(user.id)">Permitir</button></td>
                                </tr>
                            </tbody>
                        </table>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {LoopingRhombusesSpinner} from 'epic-spinners' 
export default {
    components: {
        LoopingRhombusesSpinner
    },
    mounted(){                
        this.listUsers()         
    },
    data(){
        return{
            users:[],
            loading:false
        }
    },
    methods:{
        listUsers(){
            this.loading = true
            setTimeout(()=>{
                axios({
                    method: 'GET',
                    url:'/api/v1/users'
                }).then(response =>{
                    this.users = response.data.users
                    this.loading = false
                })
            },1000)                        
        },
        atribuirPermissao(id){
            axios({
                    method: 'post',
                    url:'/api/v1/users/givePermission',
                    data:{
                        user_id: id
                    }
                }).then(response =>{
                    this.$swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        titleText: 'Sucesso!',
                        text:'Permissão concedida ao usuário',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar:true,
                        toast:true,
                        showCloseButton:true,
                    });
                }).catch(error=>{
                    console.log(error.response.data)
                })
        },
    }
}
</script>

<style>

</style>