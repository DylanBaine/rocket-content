<template>
<v-toolbar dense fixed scroll-off-screen dark style="z-index: 999;">
	<h4>{{topLeft}}</h4>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down" style="height: 100%;">
	    <v-toolbar-items>
	        <template v-for="item in items">
	        	<v-btn :href="item.name ? '/browse/'+item.slug : '/' + item.slug" flat>{{item.name}}{{item.title}}</v-btn>
	        </template>
	    </v-toolbar-items>
	</div>
	<div class="hidden-md-and-up" style="height: 100%;">
	    <v-toolbar-items>
	    	<v-btn @click="showNav" icon flat><v-icon>{{showingNav ? 'cancel' : 'menu'}}</v-icon></v-btn>
	    </v-toolbar-items>
	</div>
	<transition name="slide-x-transition">
		<div style="top: 0; width: 100%; height: 100vh; background: #212121; overflow: auto;" class="pos-fixed dark display-flex align-center" v-show="showingNav">
			<div style="width: 100%">
				<v-btn class="pos-absolute top right" @click="showNav" icon flat><v-icon>{{showingNav ? 'cancel' : 'menu'}}</v-icon></v-btn>
		        <template v-for="item in items">
		        	<v-btn block :ripple="false" :href="item.name ? '/browse/'+item.slug : '/' + item.slug" flat>{{item.name}}{{item.title}}</v-btn>
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
			'topLeft'
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
