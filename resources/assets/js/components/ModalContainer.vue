<template>
	<div class="modal-container">
		<v-btn @click="this.$root.closeModal" class="modal-close" flat icon color="error"><v-icon>cancel</v-icon></v-btn>
		<slot/>
	</div>
</template>