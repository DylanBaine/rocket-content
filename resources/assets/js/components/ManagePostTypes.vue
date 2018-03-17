<template>
	<v-container grid-list-xl>
		<v-card class="padded-lg flex offset-md1 md10 xs12">
				<header class="padded">
					<h3>Add Post Type</h3>
				</header>
			<v-layout row wrap>
					<v-flex md4>
						<v-text-field
							name="name"
							label="Name"
							v-model="name"
							requred
						></v-text-field>						
					</v-flex>					
					<v-flex md4>
						<v-text-field
							name="slug"
							label="Slug"
							v-model="slug"
							requred
						></v-text-field>
					</v-flex>
					<v-flex md4>
						<v-select
							label="Index Page Layout"
							:items="layouts"
							item-value="text"
							v-model="layout"
						></v-select>
					</v-flex>
					
					<v-flex md4>
						<v-checkbox
							label="Active"
							v-model="active"
						></v-checkbox>
					</v-flex>
					<!--<v-flex md4> 
						<v-checkbox
							label="In Navigation"
							v-model="inNav"
						></v-checkbox>
					</v-flex>
					<v-flex md4>
						<v-checkbox
							label="On Front Page"
							v-model="onFrontPage"
						></v-checkbox>
					</v-flex>
					 -->					<v-flex md12>
						<v-btn @click="save" block color="primary">Save</v-btn>
					</v-flex>
			</v-layout>
			<v-layout v-for="type in types" key="type.id" row wrap>
				<v-flex md4 class="text-xs-center">
					<label :for="type.name"><v-icon>edit</v-icon></label><input type="text" :id="type.name" v-model="type.name">
				</v-flex>
				<v-flex md3>
						<v-select
							prepend-icon="edit"
							label="Index Page"
							:items="layouts"
							item-value="text"
							v-model="type.layout_style"
						></v-select>
				</v-flex>
				<v-flex md2>
					<v-btn @click="edit(type.id)" color="primary" flat icon><v-icon>save</v-icon></v-btn>
				</v-flex>
				<v-flex md2>
					<v-btn @click="destroy(type.id)" color="error" flat icon><v-icon>delete_forever</v-icon></v-btn>
				</v-flex>
			</v-layout>
		</v-card>
	</v-container>
</template>

<script>
	export default{
		data(){
			return {
				name: '',
				inNav: false,
				active: true,
				onFrontPage: false,
				types: '',
				layouts: [
					{'text': 'None'},
					{'text': 'Basic Card'},
					{'text': 'Square with Preview'}
				],
				layout: 'None',
			}
		},
		computed: {
			slug: function() {
				return Slug(this.name);
			}
		},
		mounted(){
			this.getTypes();
		},
		methods: {
			save: function(){
				axios.post('/component-api/post-types', {
					_token: this.$root.token,
					name: this.name,
					slug: this.slug,
					in_menu: this.inNav,
					on_front_page: this.onFrontPage,
					active: this.active,
					layout: this.layout
				}).then(res => {
					window.location.reload()
				}).catch(err => {
					console.log(err)
					this.$root.alert = {showing: true, type: 'error', message: err.message};
				});
			},
			edit: function(id){
				var pickedType;
				this.types.forEach(function(type) {
					if(type.id == id){
						pickedType = type;
					}
				});
				axios.post('/component-api/post-types/'+id,{
					_method: 'put',
					_token: this.$root.token,
					name: pickedType.name,
					slug: Slug(pickedType.name),
					layout_style: pickedType.layout_style 
				}).then(window.location.reload());
			},
			destroy: function(id){
				axios.delete('/component-api/post-types/'+id,{
					_tokent: this.$root.token
				}).then(window.location.reload());
			},
			getTypes: function(){
				axios.get('/component-api/post-types').then(res=>{
					this.types = res.data;
				});
			}
		}
	}
	
</script>