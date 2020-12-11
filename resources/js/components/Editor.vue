<template>
  <div>
    <!-- Include the fonts. -->
    <link
      href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic&subset=latin,vietnamese,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek'
      rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link
      href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,cyrillic,latin-ext'
      rel='stylesheet' type='text/css'>
    <froala id="edit" :tag="'textarea'" :config="config" v-model="model"></froala>

    {{model}}
  </div>
</template>

<script>
import VueFroala from 'vue-froala-wysiwyg';

export default {
  name: "Editor",
  data() {
    return {
      config: {
        events: {
          placeholder: "Crie aqui!",
          focus: function (e, editor) {
            console.log(editor.selection.get());
          },
          'froalaEditor.focus' : function (e, editor) {
            console. log (model);
          }
        },
        fontFamily: {
          "Roboto,sans-serif": 'Roboto',
          "Oswald,sans-serif": 'Oswald',
          "Montserrat,sans-serif": 'Montserrat',
          "'Open Sans Condensed',sans-serif": 'Open Sans Condensed',
          "'Arial, Arial Black'" : 'Arial',
          "'Comic Sans MS'" : 'Comic',
          "'Times New Roman'" : 'Times New Roman',
          "'Verdana'" : 'Verdana',
          "'Tahoma'" : 'Tahoma',
          "'Lucida Grande'" : 'Lucida Grande',
          "'Courier New'" : 'Courier New',
          'Arial,Helvetica,sans-serif': 'Arial',
          'Arial Black,Arial Bold,Gadget, sans-serif': 'Arial Black',
          'Arial Narrow,Arial,sans-serif': 'Arial Narrow',
          'Georgia,serif': 'Georgia',
          'Impact,Charcoal,sans-serif': 'Impact',
          'Tahoma,Geneva,sans-serif': 'Tahoma',
          'Times New Roman,Times,serif,-webkit-standard': 'Times New Roman',
          'Verdana,Geneva,sans-serif': 'Verdana',
          'Palatino Linotype,Book Antiqua,Palatino,serif': 'Palatino Linotype',
          'Lucida Sans Unicode,Lucida Grande,sans-serif': 'Lucida Sans Unicode',
          'Lucida Console,Monaco,monospace': 'Lucida Console',
          'Century Gothic,CenturyGothic,AppleGothic,sans-serif': 'Century Gothic',
          'Copperplate,Copperplate Gothic Light,fantasy': 'Copperplate',
          'Gill Sans,Gill Sans MT,Calibri,sans-serif': 'Gill Sans',
          'Trebuchet MS,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Tahoma,sans-serif': 'Trebuchet MS',
          'Courier New,Courier,Lucida Sans Typewriter,Lucida Typewriter,monospace': 'Courier New',
          'Garamond,Baskerville,Baskerville Old Face,Hoefler Text,Times New Roman,serif': 'Garamond',
          'Helvetica Neue,Helvetica,Arial,sans-serif': 'Helvetica Neue'
        },
        fontFamilySelection: true,
      },
      model: '',
    }
  },
}
</script>

<style lang="scss">
@import '~froala-editor/css/froala_editor.pkgd.min.css';


@import url(//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic&subset=latin,vietnamese,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek);

@import url(//fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext);

@import url(//fonts.googleapis.com/css?family=Montserrat:400,700);

@import url(//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,cyrillic,latin-ext);
</style>