require("./bootstrap");

import Vue from "vue";
import Vuetify from "vuetify";
import Picker from "vue-color";
import TurbolinksAdapter from 'vue-turbolinks';
Vue.use(TurbolinksAdapter)
Vue.use(Vuetify);

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component("manage-photos", require("./components/ManagePhotos.vue"));
Vue.component("manage-post-types", require("./components/ManagePostTypes.vue"));
Vue.component(
  "manage-subscribers",
  require("./components/ManageSubscribers.vue")
);
Vue.component("register-form", require("./components/RegisterForm.vue"));
Vue.component("modal-container", require("./components/ModalContainer.vue"));
Vue.component("front-end-menu", require("./components/FrontEndNav.vue"));
Vue.component("color-picker", Picker.Chrome);
Vue.component("post-preview", require("./components/SquareWithPreview.vue"));
if (!Turbolinks) {
  $('#front-end body').css('opacity', 1);
}
document.addEventListener('turbolinks:load', () => {
  setTimeout(() => {
    $('#front-end body').css('opacity', 1);
  }, 300);
  const app = new Vue({
    el: "#app",
    data: {
      token: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      showingPhotos: false,
      showingSubscribers: false,
      showingTypes: false,
      alert: {
        showing: false,
        type: "success",
        message: "No Alert Yet!"
      },
      postName: "",
      postType: "",
      postActive: true,
      typeOptions: "",
      selected: false,
      headerColor: "",
      user: ""
    },
    mounted() {
      this.getAuth();
      if (this.auth) {
        this.getTypeOptions();
      }
    },
    computed: {
      postSlug: function () {
        return Slug(this.postName);
      }
    },
    watch: {
      user: function () {
        if (this.user) {
          this.getTypeOptions();
        }
      }
    },
    methods: {
      getAuth() {
        axios.get("/authentication").then(res => (this.user = res.data));
      },
      showPhotos() {
        this.showingSubscribers = false;
        this.showingPhotos
          ? (this.showingPhotos = false)
          : (this.showingPhotos = true);
      },
      showSubscribers() {
        this.showingPhotos = false;
        this.showingSubscribers
          ? (this.showingSubscribers = false)
          : (this.showingSubscribers = true);
      },
      showTypes() {
        this.showingTypes
          ? (this.showingTypes = false)
          : (this.showingTypes = true);
      },
      pluckType(slug) {
        this.selected = true;
        var element = $("." + slug);

        element.hasClass("hidden")
          ? element.removeClass("hidden")
          : element.addClass("hidden");

        console.log(element);
      },
      closeModal() {
        this.showingPhotos = false;
        this.showingSubscribers = false;
        this.showingTypes = false;
        this.alert.showing = false;
      },
      getTypeOptions() {
        axios
          .get("/component-api/post-types")
          .then(res => (this.typeOptions = res.data));
      },
      patience() {
        this.alert.showing = true;
        this.alert.type = "success";
        this.alert.message = "Sending off the emails! (this may take a while)";
      },
      popup(type, message) {
        this.alert.showing = true;
        this.alert.type = type;
        this.alert.message = message;
      }
    }
  });
});

$(document).ready(function () {
  tinymce.init({
    selector: "#builder",
    content_css: ["/css/app.css"],
    content_style:
      "body{padding: 20px;} .container{border: dotted 1px blue;} .row{border: dotted 1px grey;}.md4, .x6{border: dotted 1px red;} .jumbotron{border: dotted 1px lightblue;}",
    theme: "modern",
    image_dimensions: false,
    paste_data_images: true,
    body_id: "app",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1:
      "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    file_picker_callback: function (callback, value, meta) {
      if (meta.filetype == "image") {
        $("#upload").trigger("click");
        $("#upload").on("change", function () {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function (e) {
            callback(e.target.result, {
              alt: ""
            });
          };
          reader.readAsDataURL(file);
        });
      }
    },

    templates: [
      {
        title: "Container",
        content: '<br><div class="container grid-list-md"><p></p></div>'
      },
      {
        title: "Two Columns",
        content:
          '<br><div class="layout row wrap"><div class="md6 xs12 flex display-flex align-center justify-center"><div><h2>Heading</h2><p>Text</p></div></div><div class="md6 xs12 flex display-flex align-center justify-center"><div><h2>Heading</h2><p>Text</p></div></div></div><br>'
      },
      {
        title: "Three Column",
        content:
          '<div class="layout row wrap"><div class="md4 flex display-flex align-center justify-center"><div><h2>Heading</h2><p>Text</p></div></div><div class="md4 flex display-flex align-center justify-center"><div><h2>Heading</h2><p>Text</p></div></div><div class="md4 flex display-flex align-center justify-center"><div><h2>Heading</h2><p>Text</p></div></div></div>'
      },
      {
        title: "Card",
        content:
          '<div class="card" style="min-height: 300px;"><div><img src="https://placeimg.com/300/190/arch"/></div><div class="padded"><h1>Card Title</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo accusamus ducimus temporibus aliquid nisi laborum necessitatibus, atque, numquam facilis ea autem maiores reprehenderit porro, magnam eligendi a, quae eaque voluptas.</p></div></div>'
      },
      {
        title: "Button",
        content: '<a href="#" class="btn btn--large padded">Button!</a>'
      },
      {
        title: "Header",
        content:
          '<div class="pos-relative header-from-builder"><div class="pos-absolute align-center justify-center display-flex" style="left: 0; top: 5%; height: 90%; z-index: 9; width: 100%; margin: auto;"><div style="width: 500px; padding: 20px;"><h2>Title</h2><p>Text</p></div></div><img class="pos-absolute" style="z-index: 1;" src="https://placeimg.com/1000/280/arch" /></div><p></p>'
      },
      {
        title: "Contact Form",
        content:
          '<form method="post" action="/contact">@csrf<div><label for="email">Email</label><input type="text" id="email" name="email" class="custom"></div><div><label for="message">Message</label><textarea class="custom" name="message" id="message" rows="20"></textarea></div><button class="btn block" type="submit">Send</button></form>'
      }
    ]
  });
});

$(document).ready(function () {
  tinymce.init({
    selector: "#emailContent",
    content_style:
      "body{width: 540px; margin: 20px auto; border: solid 1px grey; padding: 35px; box-sizing: border-box;}",
    theme: "modern",
    image_dimensions: false,
    paste_data_images: true,
    body_id: "app",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons paste textcolor colorpicker textpattern"
    ],
    toolbar1:
      "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    file_picker_callback: function (callback, value, meta) {
      if (meta.filetype == "image") {
        $("#upload").trigger("click");
        $("#upload").on("change", function () {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function (e) {
            callback(e.target.result, {
              alt: ""
            });
          };
          reader.readAsDataURL(file);
        });
      }
    }
  });
});
