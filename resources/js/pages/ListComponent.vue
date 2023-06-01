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
                        <div class="table-responsive">
                            <DataTable class=" table-sm table-striped" >
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Criado em</th>
                                    <th scope="col">Permitir Ver Usuários</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr v-for="user in users" :key="user.id">
                                    <td>{{user.name}}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.created_at }}</td>
                                    <td><button class="btn btn-success btn-rounded" @click="atribuirPermissao(user.id)">Permitir</button></td>
                                </tr>
                            </tbody>
                        </DataTable>
                        </div>        
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Nova Tabela</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Purchased On</th>
                            <th>Customer</th>
                            <th>Ship to</th>
                            <th>Base Price</th>
                            <th>Purchased Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td>2012/08/03</td>
                            <td>Edinburgh</td>
                            <td>New York</td>
                            <td>$1500</td>
                            <td>$3200</td>
                            <td>
                              <label class="badge badge-info">On hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2015/04/01</td>
                            <td>Doe</td>
                            <td>Brazil</td>
                            <td>$4500</td>
                            <td>$7500</td>
                            <td>
                              <label class="badge badge-danger">Pending</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>2010/11/21</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>2016/01/12</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>2017/12/28</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>2000/10/30</td>
                            <td>Sam</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-info">On-hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>2011/03/11</td>
                            <td>Cris</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>2015/06/25</td>
                            <td>Tim</td>
                            <td>Italy</td>
                            <td>$6300</td>
                            <td>$2100</td>
                            <td>
                              <label class="badge badge-info">On-hold</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>2016/11/12</td>
                            <td>John</td>
                            <td>Tokyo</td>
                            <td>$2100</td>
                            <td>$6300</td>
                            <td>
                              <label class="badge badge-success">Closed</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>2003/12/26</td>
                            <td>Tom</td>
                            <td>Germany</td>
                            <td>$1100</td>
                            <td>$2300</td>
                            <td>
                              <label class="badge badge-danger">Pending</label>
                            </td>
                            <td>
                              <button class="btn btn-outline-primary">View</button>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {LoopingRhombusesSpinner} from 'epic-spinners'
import DataTable from 'datatables.net-vue3'
import DataTablesStyle from 'datatables.net-bs5'
import DataTableResponsive from 'datatables.net-responsive-bs5'
 
DataTable.use(DataTablesStyle)
DataTable.use(DataTableResponsive)

export default {
    components: {
        LoopingRhombusesSpinner, DataTable
    },
    mounted(){                
        this.listUsers()
    },
    data(){
        return{
            users:[],
            loading:false,
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
                    this.users = response.data.data
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
@import 'bootstrap';
@import 'datatables.net-bs5';
</style>