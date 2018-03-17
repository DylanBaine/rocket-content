<template>
	<a :href="href" class="outline">
		<div class="preview">
			<slot/>
		</div>
		<div class="headline">
			<h2>{{headline}}</h2>
		</div>
		<div class="overlay" :style="'background-color:' + overlayColor">
		</div>
	</a>	
</template>

<script>
	export default{
		props: [
			'headline',
			'overlayColor',
			'href'
		]
	}
	
</script>

<style scoped>
	.outline *{
		transition: all .3s;
		transition: text-shadow .1s;
	}
	.outline{
		display: block;
		color: black;
		text-decoration: none;
		width: 100%;
		height: 300px;
		overflow: hidden;
		position: relative;
	}
	.headline{
		position: absolute;
		text-align: center;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		color: white;
		z-index: 10;
		text-shadow: 1px 1px 1px transparent;
		opacity: .8;
		padding: 7px;
	}
	.headline h2{
		line-height: 2.8rem;
	}
	.overlay{
		position: absolute;
		width: 100%;
		height: 100%;
		opacity: .7;
		z-index: 9;
	}

	.preview{
		top: 0;
		transition: all .5s;
		position: relative;
		width:100%;
	}
	.preview > div{
		max-width: 100%;
	}

	.outline:hover .overlay{
		opacity: .3;
	}
	.outline:hover .headline{
		opacity: 1;
		text-shadow: 2px 3px 10px black;
	}
	.outline:hover .preview{
		top: -20px;
	}
	
</style>