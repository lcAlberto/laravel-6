<template>
  <div>
    <div class="card">
      <div class="card-header">
        Editor JQuery
      </div>
      <div class="card-body">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a class="btn btn-icon">
                <i class="fa fa-object-group"></i>
              </a>
              ssds
            </div>
            <div class="card-body">
              <div class="editor-area">
                <div id="draggable" class="ui-widget-content" v-on:click="markAsSelected()">
                </div>
                <!--              mark asselected-->
                <div v-if="isActiveElement" class="selected">
                  SELECIONADO
                  <!--              resizable handle-->
                  <div id="n" class="square n "></div>
                  <div id="e" class="square e"></div>
                  <div id="s" class="square s"></div>
                  <div id="w" class="square w"></div>
                  <div id="ne" class="square n e"></div>
                  <div id="se" class="square s e"></div>
                  <div id="sw" class="square s w"></div>
                  <div id="nw" class="square n w"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import $ from 'jquery';
import 'jquery-ui-dist/jquery-ui';

export default {
  name: "j-area-editor",

  data() {
    return {
      isActiveElement : false,
      }
  },

  mounted() {
    this.draggable()
  },

  methods: {

    markAsSelected() {
      if (!this.isActiveElement) {
        $('.selected').appendTo($('#draggable'))
        $('#se').addClass('ui-rotatable-handle');
        return this.isActiveElement = true
      }else{
       return this.isActiveElement = false
      }
    },

    draggable() {
      $("#draggable").draggable({
        containment: '.editor-area',
        // grid: [ 50, 20 ],
        opacity: 0.80,
        scroll: false,
        snap: true,
        snapMode: "inner",// "inner", "outer", "both".
        snapTolerance: 30,
      });
    },

    selectable() {
      $(".editor-area").selectable({
        appendTo: ".editor-area",
        filter: "#draggable",
        tolerance: "fit",// touch, fit, touch
        stop: function (event, ui) {
          $('#draggable').addClass('selected-multiple')
        },
        selecting: function (event, ui) {
          $('#draggable').addClass('selecting-multiple')
        },
        selected: function (event, ui) {
          $('#draggable').addClass('selected-multiple')
        },
        // stop: function( event, ui ) {}
      });
    },

    resizable() {
      $(".draggable").resizable({
        animate: true,
        animateDuration: "fast",
        aspectRatio: true,
        handles: "n, e, s, w",
        helper: "resizable-helper"
      });
    }


  }
}
</script>

<style scoped>
/*start*/
.editor-area {
  width: 100%;
  min-height: 50vh;
  max-height: 70vh;
  background-color: #cbd3da;
}

#draggable {
  width: 100px;
  height: 100px;
  background-color: #0a1520;
  position: absolute;
}

/*markAsSelected*/
.selected {
  border: #ff7300 dashed 1px;
  position: absolute;
}

.selected-multiple {
  border: #0c85d0 dashed 5px;
  position: absolute;
}

/*handles*/
.n {
  border-top: 2px solid orange;
}

.e {
  border-right: 2px solid orange;
}

.s {
  border-bottom: 2px solid orange;
  width: 20px;
  height: 20px;
}

.w {
  border-left: 2px solid orange;
}
</style>