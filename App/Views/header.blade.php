<nav class="navbar navbar-inverse" id="top-menu">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">mvc.dev</a>
        </div>
        <ul class="nav navbar-nav">
            <li v-bind:class = " { active:home }" >
                <a href="/">Home</a>
            </li>
            <li v-bind:class="{ active:formOne }">
                <a href="form-one">Form 1</a>
            </li>
            <li v-bind:class="{ active:formTwo }">
                <a href="form-two">Form 2</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    new Vue({
        el:"#top-menu",
        data:{
        	path:'',
            home:false,
            formOne:false,
            formTwo:false,
        },
        created(){
        	this.path = window.location.pathname;
        	if(this.path === '/'){
        		this.home = true;
            }else if(this.path === '/form-one'){
        		this.formOne = true;
            }else if(this.path === '/form-two'){
        		this.formTwo = true;
            }
        }
    });
</script>