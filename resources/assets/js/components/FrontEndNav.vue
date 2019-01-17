<template>
<v-toolbar dense fixed scroll-off-screen dark :style="'z-index: 999; background-color:'+backgroundColor+';' ">
	<img style="max-height: 100%; max-width: 50%;" v-if="icon" :src="icon" alt=""><h4 class="hidden-sm-and-down">{{topLeft}}</h4>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down" style="height: 100%;">
	    <v-toolbar-items>
	        <template v-for="item in items">
	        	<v-btn :href="item.name ? '/'+item.slug : '/' + item.slug" flat>{{item.name}}{{item.title}}</v-btn>
	        </template>
	    </v-toolbar-items>
	</div>
	<div class="hidden-md-and-up" style="height: 100%;">
	    <v-toolbar-items>
        <v-icon @click="showNav">{{showingNav ? 'close' : 'menu'}}</v-icon>
	    </v-toolbar-items>
	</div>
	<transition name="slide-x-transition">
		<div :style="'top: 48px; width: 100%; height: 100vh; left: 0; background-color:'+backgroundColor+'; overflow: auto;'" class="pos-fixed dark display-flex align-center" v-show="showingNav">
			<div style="width: 100%; position: relative; top: -50px;">
        <template v-for="(item, i) in items">
          <hr v-if="!i">
          <v-btn block flat :ripple="false" :href="item.name ? '/'+item.slug : '/' + item.slug" flat>{{item.name}}{{item.title}}</v-btn>
          <hr>
        </template>
		  </div>		
		</div>
	</transition>
</v-toolbar>
</template>

<script>
	export default{
		data(){
			return{
				items: '',
				showingNav: false
			}
		},
		props: [
			'topLeft',
			'backgroundColor',
			'icon',
		],
		mounted(){
			axios.get('/component-api/menu').then(res=>{
				this.items = res.data;
			});
		},
		methods: {
			showNav: function(){
				this.showingNav ? this.showingNav = false : this.showingNav = true;
			}
		}
	}
	
</script>
