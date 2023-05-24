<template>
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Usuários</div>

                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center" v-if ="loading" style="min-height: 200px;">
                            <looping-rhombuses-spinner
                            :animation-duration="2500"
                            :rhombus-size="15"
                            color="#ff1d5e"
                        />
                        </div>                        
                        <div class="d-flex justify-content-around" v-for="user in users" :key="user.id" style="min-height: 200px;">
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
        }
    }
}
</script>

<style>

</style>