<template>
	<v-card style="width: 900px; height: 80vh; overflow: auto;">
		<v-card-title>
			<h2>All Photos</h2>
		</v-card-title>
		<v-card-text>
			<v-layout row wrap>
				<v-flex md9>
					<v-layout row wrap>
						<template v-for="image in images">
							<v-flex md4 class="padded">
								<div class="hover-hand" @click="copy(image.slug)" :style="'width: 100%; height: 150px; background-repeat: no-repeat; background-size: contain; background-position: center; background-image: url('+image.slug+');'">									
								</div>
								<v-btn @click="destroy(image.id)" color="error" small>Delete</v-btn>
							</v-flex>
						</template>
					</v-layout>
				</v-flex>
				<v-flex md3 class="text-xs-center padded">
					<header>
						<h4>Add a new photo.</h4>
					</header>
					<section>
						<form ref="form">

							<v-text-field
								v-model="newImageName"
								label="Image Name"
								name="name"
							></v-text-field>

							<input type="hidden" role="uploadcare-uploader" ref="slug" name="slug"
						       data-crop=""
						       data-images-only="true" />

							<v-btn block @click="save" color="primary">Save</v-btn>
						</form>

					</section>
				</v-flex>
			</v-layout>
		</v-card-text>
		<v-card-actions>
		</v-card-actions>
	</v-card>
</template>

<script>
	export default {
		data(){
			return {
				images: '',
				newImageName: ''
			}
		},
		methods: {
			destroy: function(id){
				axios.delete('/component-api/photos/'+id).then(this.getPhotos);

			},
			save: function(){
				axios.post('/component-api/photos',{
					_token: this.$root.token,
					name: this.newImageName,
					slug: this.$refs.slug.value
				}).then(this.getPhotos());
			},
			getPhotos: function(){
				this.newImageName = '';
				this.$refs.slug.value = '';
				axios.get('/component-api/photos').then(res=>{
					this.images = res.data;
				});
			},
			copy: function(text){

				var textArea = document.createElement("textarea");

				  textArea.style.position = 'fixed';
				  textArea.style.top = 0;
				  textArea.style.left = 0;
				  textArea.style.opacity = 0;

				  textArea.value = text;

				  document.body.appendChild(textArea);

				  textArea.select();

				  try {
				    var successful = document.execCommand('copy');
				    var msg = successful ? 'successful' : 'unsuccessful';
				    console.log('Copying text command was ' + msg);
				  } catch (err) {
				    console.log('Oops, unable to copy');
				  }

				  document.body.removeChild(textArea);

				  this.$root.closeModal();	
			}

		},
		mounted(){
			this.getPhotos();
		}
	}
	
</script>

<style scoped>
	
</style>