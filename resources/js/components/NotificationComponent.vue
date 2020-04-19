<template>
	<li class="nav-item dropdown">
	    <a id="navbarNotify" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	        <i class="fas fa-bell"></i>&nbsp;<span class="badge badge-danger" id="count-notication"></span>
	    </a>

	    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarNotify">
	        <a class="dropdown-item" href="#" v-for="notification in notifications" :key="notification.id"><small>{{notification['data'].notification}}</small></a>
	        <div class="dropdown-divider" role="separator"></div>
	        <a class="dropdown-item" href="#" v-if="notifications.length===0">No hay notificaciones</a>
	        <a class="dropdown-item" href="#" v-else><small>marcar como leidos</small></a>
	    </div>
	</li>
</template>

<script>
	export default{
	 data(){
	 	return{
	 		notifications:[],
	 	}
	 },
	 mounted() {
	 		axios.get('/notification').then((response)=>{
                this.notifications = response.data;
                $('#count-notication').html(this.notifications.length);
                console.log(this.notifications)
            });
     },

	}
</script>