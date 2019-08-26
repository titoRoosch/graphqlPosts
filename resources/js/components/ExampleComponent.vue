<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                       Teste Vue com GraphQL.
                    </div>
                </div>
            </div>
           
        </div>
        <div class="card-body p-0 pb-3 text-center"  style="max-height:200px; overflow: auto" >
            <table class="table mb-0">
                <thead class="bg-light" style="position: sticky; top: 0">
                    <tr>
                        <th scope="col" class="border-0">ID</th>
                        <th scope="col" class="border-0">Nome</th>
                    </tr>
                </thead>
                <tbody ref="options_table" v-for="row in rows">
                    
                    <tr>
                        <td>{{row.id}}</td>
                        <td>{{row.name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props: [

        ],
        data(){
                return{
                        graphQL: "http://localhost:90/graphql",
                        rows:[

                        ]
                }
        },
        
        computed:{


        },
        mounted() {
            this.getUsersGraphQl()
        },
        methods:{
            getUsersGraphQl(){
                window.axios.post(this.graphQL, {
                    query: "{user_query {   id, name posts{user_id, title}  }}",
                  
                }).then(({data}) => { 
                     //console.log(data) ;
                        
                        this.rows = data.data.user_query;   
                });
            },

            getUserPosts(id){
                window.axios.post(this.graphQL, {
                    query: "{user_query(id:"+id+") {   id, name posts{user_id, title}  }}",
                  
                }).then(({data}) => { 
                     //console.log(data) ;
                        
                        this.rows = data.data.user_query;   
                });
            }
           
        }
    }
</script>
