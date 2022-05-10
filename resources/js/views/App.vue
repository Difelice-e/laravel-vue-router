<template>
  <div class="app bg-zinc-800 text-white">
    <header>
      <nav>
        <ul class="flex items-center gap-4 p-4">
          <li>Home</li>
          <li>
            <router-link to="/posts">Posts</router-link>
          </li>
          <li>Categories</li>
          <li>
            <router-link to="/contact">Contacts</router-link>
            <!-- <router-link :to="{ name: 'contact' }">Contacts</router-link> -->
          </li>
        </ul>
      </nav>
    </header>

    <router-view></router-view>

    <footer>
      &copy; Boolpress 2022
    </footer>
  </div>
</template>

<script>
import PostsGrid from '../pages/Posts.index.vue'

export default {
    components: {
      PostsGrid,
    }
}
</script>

<style lang="scss" scoped>
.app {
  min-height: 100vh;
}
</style>