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
                },
               success:'',
               errors:''
           },
	       http: {
		       emulateJSON: true,
		       emulateHTTP: true
	       },
           methods:{
                submitFormOne(){
	                this.$http.post('/form-one/submit',
                        {
                        	name:this.user.name,
		                    mail:this.user.mail,
		                    password:this.user.password
                        }
                    ).then(
		                //1st call back is returning response data
		                (response)=>{
			                console.log('ok');
			                console.log(response);
		                },
		                //2nd call back is returning errors if occurred
		                (errors)=>{
			                console.log('problems');
			                console.log(errors)
		                }
	                )
                }
           }
       })
    </script>
@endsection