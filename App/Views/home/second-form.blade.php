@extends('page')

@section('content')
    <div class="container" id="form2">
        <div class="row">
            <h4>Form 2</h4>
            <p>Presentation of Post requests validation on backend:</p>
            @if($success !== false)
                @include('includes.success-block')
            @endif
            <form method="post" action="form-two/submit">
                <div class="form-group">
                    <label for="user">Name:</label>
                    <input
                            type="text"
                            class="form-control"
                            id="user"
                            name="name"
                            v-model="user.name">
                </div>
                @if($errors['name'])
                    <div  v-if="errors.name" class="alert alert-danger">
                        <p v-for="error in errors.name" v-text="error"></p>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="mail"
                            v-model="user.mail">
                </div>
                @if($errors['mail'])
                    <div  v-if="errors.mail" class="alert alert-danger">
                        <p v-for="error in errors.mail" v-text="error"></p>
                    </div>
                @endif
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input
                            type="password"
                            class="form-control"
                            id="pwd"
                            name="password"
                            v-model="user.password">
                </div>
                @if($errors['password'])
                    <div  v-if="errors.password" class="alert alert-danger">
                        <p v-for="error in errors.password" v-text="error"></p>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <hr>
    <script>
		new Vue({
			el: '#form2',
            data:{
				user:{
					name:'',
                    mail:'',
                    password:''
                },
                errors:{}
            },
            created(){
				this.user = <?php echo json_encode($inputs); ?>;
				this.errors = <?php echo json_encode($errors); ?>
            }
		})
    </script>
@endsection