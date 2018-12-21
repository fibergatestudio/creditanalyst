<template>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item" v-for="(item,key) in dataList" :key="key">
            <a :href="item.url" class="nav-link" :class="{'active': (item.tag === active)}">{{ item.name }}</a>
        </li>
    </ul>
</template>

<script>
export default {
    name: "SideBar",
    props: {
        dataList: {
            type: Array,
            default:() => ([])
        },
        active: ''
    }
}
</script>

