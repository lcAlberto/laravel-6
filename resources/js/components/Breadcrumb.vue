<template>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li v-if="header" class="mr-1 text-white">
        <i v-if="icon" :class="icon"></i>
        {{ header }}
      </li>
      <li> 》</li>
      <li class="text-white"><slot></slot></li>
    </ol>
  </nav>
</template>

<script>
export default {
  name: "breadcrumb",

  props: {
    header: {
      type: String,
      required: false,
    },
    icon:{
      type: String,
      required: false,
    }
  },
}
</script>
<style>
.breadcrumb{
  background-color: rgba(0,0,0,0.0);
  /*background-image: linear-gradient(to right, rgba(0,0,0,1), transparent);*/
  opacity: 100%;
}
</style>
