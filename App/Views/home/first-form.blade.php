@extends('page')

@section('content')
    <div class="container" id="form1">
        <div class="row">
            <h4>Form 1</h4>
            <p>The form below contains two input elements; one of type text and one of type password:</p>
            <form v-on:submit.prevent="submitFormOne">
                <div class="form-group">
                    <label for="user">Name:</label>
                    <input type="text" class="form-control" id="user" v-model="user.name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" v-model="user.mail">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" v-model="user.password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <script>
       new Vue({
           el: '#form1',
           data:{
           	    user: {
           	    	name:'',
                    mail:'',
                    password:''
                }
           },
           methods:{
           	    submitFormOne(){
                    alert('submit');
	                axios.post('/projects',{
		                name:this.name,
		                description:this.description
	                }).then((response)=>{
		                this.success = response.data;
		                this.name = ''; //очистит форму в случае успеха
		                this.description = ''; //очистит форму в случае успеха
	                }).catch((error)=>{
		                //error.response.data - доступ к ошибкам со стороны сервера
		                this.errors = error.response.data.errors;
	                });
                }
           }
       })
    </script>
@endsection