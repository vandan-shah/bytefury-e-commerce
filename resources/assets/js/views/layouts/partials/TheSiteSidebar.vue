<template>
  <div
    class="hidden w-64 h-screen pt-2 pb-32 overflow-y-auto bg-white border-r border-gray-300 border-solid md:block sw-scroll"
  >
    <sw-list variant="collapse-sidebar">
      <div v-for="(menuGroups, groupIndex) in menu" :key="groupIndex">
        <sw-list-group
          v-if="menuGroups.items"
          :title="menuGroups.title"
          :active="menuGroups.active"
          @click="setActiveGroup(groupIndex)"
        >
          <span slot="titleIcon" v-html="menuGroups.icon" />
          <sw-list-item
            v-for="(item, index) in menuGroups.items"
            tag-name="router-link"
            :to="item.route"
            :title="item.title"
            :key="index"
            :active="item.active"
            @click.native="Toggle"
          />
        </sw-list-group>
        <sw-list-item
          v-else
          :title="menuGroups.title"
          tag-name="router-link"
          :to="menuGroups.route"
          :active="menuGroups.active"
          @click.native="Toggle"
        >
          <span slot="icon" v-html="menuGroups.icon" />
        </sw-list-item>
      </div>
    </sw-list>
  </div>
</template>
<script>
export default {
  data() {
    return {
      activeIndex: 0,
      groupActiveIndex: 0,
      menu: [
        {
          title: 'Categories',
          icon: `<svg class="w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                </svg>`,
          active: false,
          route: '/admin/category',
        },
        {
          title: 'Brands',
          icon: `<svg class="w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>`,
          active: false,
          route: '/admin/brand',
        },
        {
          title: 'Products',
          icon: `<svg class="w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>`,
          active: false,
          route: '/admin/product',
        },
        {
          title: 'Orders',
          icon: `<svg class="w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>`,
          active: false,
          route: '/admin/order',
        },
      ]
    }
  },
  watch: {
    '$route.path'(newValue, oldValue) {
      if (newValue !== oldValue) {
        this.setActiveItem()
      }
    },
  },
  mounted() {
    if(this.$route.path == '/') {
      this.$router.push( '/buttons' )
      return true
    }
    this.setActiveItem()
  },
  methods: {
    Toggle() {
      // this.$utils.toggleSidebar()
    },
    setActiveItem() {
      this.menu.forEach(item => {
        item.active = false
        if (item.items) {
          item.items.forEach(_item => {
            _item.active = false
            if (this.$route.path.indexOf(_item.route) > -1) {
              item.active = true
              _item.active = true
            }
          })
        } else {
          if (this.$route.path.indexOf(item.route) > -1) {
            item.active = true
          }
        }
      })
    },
    setActiveGroup(index) {
      if (index == null || index == undefined) {
        return false
      }
      this.menu.forEach(item => {
        item.active = false
      })
      this.menu[index].active = true
    }
  }
}
</script>
<style lang="scss">
.mobile-menu-overlay {
  background: rgba(48, 75, 88, 0.5);
  display: none;
}

@media (max-width: 768px) {
  .sidebar-open .sidebar-left {
    left: 0;
  }

  .sidebar-open .mobile-menu-overlay {
    display: block;
  }
}
</style>