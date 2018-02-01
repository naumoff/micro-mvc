@extends('page')

@section('content')
    <div class="container" id="form1">
        <div class="row">
            <h4>Form 1</h4>
            <p>Presentation of Ajax requests validation on backend:</p>
            <div v-if="success.message" v-bind:class="formSuccess">
                <p v-text="success.message"></p>
            </div>
            <form
                    v-on:submit.prevent="submitFormOne"
                    v-on:keydown="deleteErrorsForName($event.target.name)"
            >
                <div class="form-group">
                    <label for="user">Name:</label>
                    <input
                            type="text"
                            class="form-control"
                            id="user"
                            name="name"
                            v-model="user.name">
                </div>
                <div  v-if="errors.name" v-bind:class="inputFailure">
                    <p v-for="error in errors.name" v-text="error"></p>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="mail"
                            v-model="user.mail">
                </div>
                <div  v-if="errors.mail" v-bind:class="inputFailure">
                    <p v-for="error in errors.mail" v-text="error"></p>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input
                            type="password"
                            class="form-control"
                            id="pwd"
                            name="password"
                            v-model="user.password">
                </div>
                <div  v-if="errors.password" v-bind:class="inputFailure">
                    <p v-for="error in errors.password" v-text="error"></p>
                </div>
                <button
                        type="submit"
                        class="btn btn-primary"
                        v-bind:disabled="errorsExist()"
                >Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <script>
       var app = new Vue({
           el: '#form1',
           data:{
           	    user: {
           	    	name:'',
                    mail:'',
                    password:'',
                },
               success:{
           	    	message:false
               },
               errors: {},
               formSuccess:'alert alert-success',
               inputFailure:'alert alert-danger'
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
		                    password:this.user.password,
	                        csrf:'<?= $csrfToken ?>',
                        }
                    ).then(
		                //1st call back is returning response data
		                (response)=>{
			                this.success.message = 'Form submitted successfully';
			                this.cleanErrors();
			                this.cleanInput();
		                },
		                //2nd call back is returning errors if occurred
		                (errors)=>{
                            this.errors = errors.data;
                            this.cleanSuccess();
		                }
	                )
                },
               cleanErrors(){
                	this.errors = {};
               },
               deleteErrorsForName(nameInput){
                	console.log(nameInput);
                	if(this.errors[nameInput]){
		                delete this.errors[nameInput];
                    }
               },
               cleanSuccess(){
                	this.success = {
                		message: false
                    }
               },
               cleanInput(){
	               this.user = {
                       name:'',
			           mail:'',
			           password:''
	               }
               },
               errorsExist(){
                	if( this.errors.name ||
                        this.errors.mail ||
                        this.errors.password )
                	{
                		return true;
                    }else{
                		return false;
                    }
               }
           }
       })
    </script>
@endsection