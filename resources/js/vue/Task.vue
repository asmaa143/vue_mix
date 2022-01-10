<template>
    <div>
        <div v-for="(task,index) in tasks" :key="index">
            <Item :task="task" v-on:taskchanged="$emit('reloadtasks')" class="task"/>

        </div>
    </div>
</template>

<script>
import Item from "./Item";
export default {
    name: "Task",
    components: {Item},
    props:['tasks'],

}
</script>

<style scoped>
.task{
    background: #e6e6e6;
    padding: 5px;
    margin-top: 5px;
}
</style>
