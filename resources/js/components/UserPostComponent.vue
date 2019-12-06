
<template >

     <div class="container ">
    
        <div class="form-group .form-check-inline" >
            
            <textarea style="width:700px; height:90px" class=".card"
                ref="title" placeholder="Digite ..." input-class="form-control" v-model="title" results-property="data" >
            </textarea>
            <br>
            <button class="button" v-on:click="sendUserPosts()">Enviar
            </button>
        </div>
        <div class="card card-small mb-4">
        <div class="card-body p-0 pb-3 text-center"   >
            <table class="table mb-0">
                <thead class="bg-light" >
                    <tr>
                        <th scope="col" class="border-0">ID</th>
                        <th scope="col" class="border-0">Post</th>
                    </tr>
                </thead>
                <tbody ref="options_table" v-for="row in rows" v-bind:key="row.id">
                    
                    <tr>
                        <td>{{row.id}}</td>
                        <td>{{row.title}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: [
                'id_cliente',
                'title'
        ],
        data(){
                return{
                  
                        graphQL: "http://localhost:90/graphql",
                        rows:[

                        ],
                        
                }
        },
        
        computed:{


        },
        mounted() {
            this.getUserPosts(this.id_cliente)
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
                alert(id);
                window.axios.post(this.graphQL, {
                    query: "{post_query(user_id:"+id+") {   id, title  }}",
                  
                }).then(({data}) => { 
                     console.log(data.data.post_query) ;
                        
                        this.rows = data.data.post_query;   
                        
                });
            },

            sendUserPosts( ){
                window.axios.post(this.graphQL, {
                    query: " {  post_mutation(title: \""+this.title+"\", active: true, user_id: "+this.id_cliente+") {    id, title  }}",
                  
                }).then(({data}) => { 
                     console.log(data.data.post_mutation) ;
                        
                        this.rows.push(data.data.post_mutation);   
                        this.title = "";
                });
                
            }
           
        }
    }
</script>
<style>
 .card-small {
  box-shadow: 0 2px 0 rgba(90,97,105,.11), 0 4px 8px rgba(90,97,105,.12), 0 10px 10px rgba(90,97,105,.06), 0 7px 70px rgba(90,97,105,.1);
}
.card {
  margin-top: 50px;
  background-color: #fff;
  border: none;
  border-radius: .625rem;
  box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,.1), 0 0.9375rem 1.40625rem rgba(90,97,105,.1), 0 0.25rem 0.53125rem rgba(90,97,105,.12), 0 0.125rem 0.1875rem rgba(90,97,105,.1);
}
.mb-4, .my-4 {
  margin-bottom: 1.5rem!important;
}

</style>
